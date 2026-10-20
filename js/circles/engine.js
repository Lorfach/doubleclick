{
    let props = {
        game_Started:false,
        circle_Cycle_Interval:1,
        speed_remove:1100,
        speed_spawn:400,
        set_opacity:760,
        score:0,
        key_pressed:[0,0,0],
        mode:'circleAnimationNormal',
        game_Start(){
            props.game_Started = true;
            startTitle.style.opacity = 0;
            setTimeout(() => {
                startTitle.style.display = 'none';
            }, 150)
            props.circle_Cycle(true);
        },
        game_End(){
            startTitle.style.display = 'flex';
            startTitle.style.opacity = 1;
            props.circle_Cycle(false);
        },
        circle_Cycle(param){
            if(param){
                props.circle_Cycle_Interval = setInterval(function(){

                    let this_circle = circle.cloneNode(true);

                    this_circle.classList.add(props.mode);

                    setTimeout(function(){
                        this_circle.style.opacity = '1';
                    }, 1);

                    setTimeout(function(){
                        this_circle.style.opacity = '0';
                    }, props.set_opacity);

                    setTimeout(function(){
                        this_circle.remove();
                    }, props.speed_remove);
                    

                    line[random_number(3)].append(this_circle);
                }, props.speed_spawn);
            }else{

            }
        },
        match(line_number){

            let last_line_circle = line[line_number].children[line[line_number].children.length-1];
                
            if(last_line_circle.classList.contains('circle')){

                let circle_offset = last_line_circle.offsetTop;
                let keypad_offset = keypadOut[0].offsetTop;

                if(((circle_offset / line[line_number].offsetHeight) * 100) >= 70){
                    this.addScore();
                    last_line_circle.remove();
                }
            }
        },
        addScore(){
            this.score += 15;
            scoreDiv.textContent = this.score;
            scoreDiv.animate({color:'#8CFF91', transform:'scale(1.06)'}, {duration:140});
        }
    }

    let change_mode_body = function(r, s, m, o){
        props.speed_remove = r
        props.speed_spawn = s;
        props.mode = m;
        props.set_opacity = o;
    }

    function change_mode(m){

        if(m == 'Normal'){
            change_mode_body((1000), 370, 'circleAnimationNormal', 780);

        }else if(m == 'Harder'){
            change_mode_body((900), 300, 'circleAnimationHarder', 700);

        }else if(m == 'Satanic'){
            change_mode_body((800), 250, 'circleAnimationSatanic', 600);
        }
    }

    let random_number = i => {
        return Math.floor(Math.random() * i);
    }

    document.addEventListener('keydown', function(e){
        if(props.game_Started){

            if(e.code == 'KeyQ'){

                if(!props.key_pressed[0]){
                    props.key_pressed[0] = 1;
                    props.match(0);
                }

            }else if(e.code == 'KeyW'){

                if(!props.key_pressed[1]){
                    props.key_pressed[1] = 1;
                    props.match(1);
                }

            }else if(e.code == 'KeyE'){

                if(!props.key_pressed[2]){
                    props.key_pressed[2] = 1;
                    props.match(2);
                }

            }

        }else if(e.code == 'KeyQ' || e.code == 'KeyW' || e.code == 'KeyE') props.game_Start();
    });

    document.addEventListener('keyup', function(e){
        if(props.game_Started){

            if(e.code == 'KeyQ'){

                props.key_pressed[0] = 0;

            }else if(e.code == 'KeyW'){

                props.key_pressed[1] = 0;

            }else if(e.code == 'KeyE'){

                props.key_pressed[2] = 0;

            }

        }
    });
}