{
    // Создание переменных
    let buttons = document.getElementsByClassName('btn');
    let scoreDiv = document.getElementById('scoreSpan');
    let dws = document.getElementById('deathWrap').style;

    let gameProp = {
        score:0,
        time:14,
        timeToKill:800,
        line:0,
        inter:null,
        isDeadOn:true,
        isStarted:false,
        isDead:false,
        timerStarted:false,
        body:''
    }

    if(localStorage.getItem('mode')){
        let m = localStorage.getItem('mode');
        if(m == 'normal') gameProp.timeToKill = 800;
        if(m == 'harder') gameProp.timeToKill = 550;
        if(m == 'satanic') gameProp.timeToKill = 300;
    }

    fetch('/php/suoEngine.php')
    .then(function (response) {
        return response.text();
    })
    .then(function (body) {
        gameProp.body = body;
    });

    // создание функций
    

    let getRandomNumber = function(){
        return Math.floor(Math.random() * (buttons.length - 1));
    }

    let createNewElement = function(){
        let b = buttons[getRandomNumber()];
        if(b.onmousedown){
            mK(b, 1);
        }
        if(b.ready == false){
            b.ready = true;
            b.style.backgroundColor = '#B3A3C3';
            b.addEventListener('mousedown', makeNew);
        }else{
            createNewElement();
        }
    }

    let makeNew = function(){
        if(!gameProp.timerStarted && !gameProp.isDead){
            gameProp.isStarted = true;
            turn_buttons_OFF();
            startTimer();
            gameProp.timerStarted = true;
        }
        mK(this);
        this.removeEventListener('mousedown', makeNew);
        this.removeAttribute('style');
        updateScore();
        createNewElement();
        SULine();
        this.ready = false;
    }

    let mK = function(el, k){
        if(!k){
            el.onmousedown = stopGame;
        }else{
            el.onmousedown = null;
        }
    }

    // эта функция вызывает анимацию добавления очков во время игры.
    let updateScore = function(){
        gameProp.score += 15;
        scoreDiv.textContent = gameProp.score;
        scoreDiv.animate({color:'#A0FFA6', transform:'scale(1.06)'}, {duration:140});
    }

    // эта функция меняет вид красной линии
    let sul = function(){
        if(!gameProp.isDead){
            document.getElementById('line').style = null;
            gameProp.line = setTimeout(() => {
                stopGame('Killed!'); // убийство по не успеванию нажатия
            }, gameProp.timeToKill)
            setTimeout(() => document.getElementById('line').style.animation = 'lineKill ' + (gameProp.timeToKill/1000) + 's' + ' linear');
        }
    }
    // эта функция вызывает анимацию красной линии
    let SULine = function(){
        if(!gameProp.line){
            sul();
        }else{
            clearTimeout(gameProp.line);
            sul();
        }
    }

    // эта функция меняет время до смерти, когда ты меняешь сложность
    function changemode(name){
        if(!gameProp.isStarted){
            mode = name;
            localStorage.setItem('mode', mode);
            if(mode == 'normal') gameProp.timeToKill = 800;
            if(mode == 'harder') gameProp.timeToKill = 550;
            if(mode == 'satanic') gameProp.timeToKill = 300;
        }
    }

    if(g('accScore')){
        var accScore_change = function(p){
            accScore.children[0].textContent = p;
        }
    }else{
        var accScore_change = () => {};
    }

    // функция заканчивает игру и выводит информацию игроку
    if(g('accScore')){
        function callServer(throw_score){
            fetch('/php/suoScore.php', {method: 'POST', body: throw_score})
            .then(response => {
                return response.text();
            })
            .then(body => {
                if(body){
                    accScore_change(body);
                }
            });
        }
    }else function callServer(){};

    let stopGame = function(whats){
        if(whats == 'win'){
            document.getElementById('reason').textContent = 'Time is Left!';
            dMenu.style.borderColor = 'lime';
            tryBetter.style.display = 'none';
        }else{
            tryBetter.style.display = 'block';
            dMenu.removeAttribute('style');
            document.getElementById('reason').textContent = 'You killed!';
        }
        gameProp.time = 14;
        clearTimeout(gameProp.line);
        clearInterval(gameProp.inter);
        gameProp.inter = null;
        gameProp.isDead = true;
        dws.display = 'flex';
        setTimeout(function(){dws.opacity = '1'}, 12)
        document.getElementById('scoreEnd').children[1].textContent = gameProp.score;

        turn_buttons_ON();

        let throw_score = new FormData();
        throw_score.append('x', gameProp.body);
        throw_score.append('score', gameProp.score);

        if(mode == 'normal'){
            throw_score.append('mode', 'Normal');
        }else if(mode == 'harder'){
            throw_score.append('mode', 'Harder');
        }else if(mode == 'satanic') throw_score.append('mode', 'Satanic');

        callServer(throw_score);
    }

    // Фукнция приводит все свойства к изначальному виду для старта игры.
    let startGame = function(){
        gameProp.isDead = false;
        gameProp.score = 0;
        gameProp.timerStarted = false;
        gameProp.isStarted = false;
        
        scoreDiv.textContent = gameProp.score;
        dws.opacity = '0';
        setTimeout(function(){dws.display = 'none';}, 120)
        document.getElementById('timerText').textContent = 15;


        for(let i = 0; i <= (buttons.length-1); i++){
            buttons[i].removeEventListener('mousedown', makeNew);
            buttons[i].removeAttribute('style');
            buttons[i].ready = false;
            mK(buttons[i]);
        }

        createNewElement();
        createNewElement();
        createNewElement();
        createNewElement();
        
    }

    // функция стартует таймер, если он еще не начал идти.
    let startTimer = function(){
        gameProp.inter = setInterval(function(){
            document.getElementById('timerText').textContent = gameProp.time;
            if(gameProp.time > 0){
                gameProp.time -= 1;
            }else{
                stopGame('win');
                gameProp.timerStarted = false;
            }
        }, 1000)
    }    

    // Отдельные части для подготовки страницы
    document.getElementById('right').addEventListener('click', function(){
        if(gameProp.isDead){
            startGame();
        }
    })


    // добавляет эффект смерти всем кнопкам, кроме тех, на которые нужно нажать
    for(let i = 0; i <= (buttons.length-1); i++){
        buttons[i].ready = false;
        mK(buttons[i]);
    }

    // создает элементы для нажатия
    document.body.onload = () => {
        createNewElement();
        createNewElement();
        createNewElement();
        createNewElement();        
    }

}