function g(i){
    return document.getElementById(i);
}

var menuButton = g('menuButton'),
    menuBody = g('menuBody'),
    normalMode = g('normalMode'),
    harderMode = g('harderMode'),
    satanicMode = g('satanicMode'),
    ab = g('accountBody'),
    aText = g('aText'),
    menuWrap = g('menuWrap'),
    dMenu = g('dMenu'),
    tryBetter = g('tryBetter'),
    turnoff = document.getElementsByClassName('turnoff'),
    mode = 'normal',
    isNO = false,
    timeout;

    menuWrap.style.height = getComputedStyle(menuButton).height;

if(g('accScore')) accScore = g('accScore');

if(localStorage.getItem('mode')){
    mode = localStorage.getItem('mode');
}

if(mode == 'normal'){

}

if(mode == 'normal'){
    normalMode.children[1].firstChild.checked = true;
}else if(mode == 'harder'){
    harderMode.children[1].firstChild.checked = true;
}else if(mode == 'satanic') satanicMode.children[1].firstChild.checked = true;

const mbH = menuBody.style.height,
      aB = ab.clientHeight,
      mwHeight = menuWrap.offsetHeight;
      ab.style.display = 'none';

aText.opened = false;
aText.onmouseenter = function(){
    if(!this.opened){
        this.style.background = '#5E5E5E';
    }
}

aText.onmouseleave = function(){
    if(!this.opened){
        this.style.background = '#4C4C4C';
    }
}

aText.onclick = function(){
    if(this.opened){
        this.style.background = '#4C4C4C';
        this.opened = false;
    }else{
        this.style.background = '#627362';
        this.opened = true;
    }
}

menuButton.addEventListener('click', function(){
    if(menuBody.style.opacity == 0){
        clearTimeout(timeout);
        timeout = null;
        menuWrap.style.height = mwHeight;
        menuBody.style.display = 'block';
        setTimeout(() => {
            menuBody.style.height = mbH;
            menuBody.style.opacity = 1;
        }, 1)
    }else{
        menuBody.style.height = '0px';
        menuBody.style.opacity = 0;
        menuWrap.style.height = getComputedStyle(menuButton).height;
        if(!timeout){
            timeout = setTimeout(() => menuBody.style.display = 'none', 200);
        }
    }
})

g('accountButton').onclick = function(){
    let as = ab.style;

    if(as.opacity == '0' || !as.opacity){
        clearTimeout(timeoutA);
        as.display = 'block';
        setTimeout(() => {
            as.opacity = '1';
            as.height = aB;
        }, 1)
    }else{
        as.opacity = '0';
        as.height = '0px';
        var timeoutA = setTimeout(() => as.display = 'none', 200);
    }
}

function an(){
    if(!isNO){
        anime({
            targets: '.btn',
            scale: [
              {value: .1, easing: 'easeOutSine', duration: 200},
              {value: 1, easing: 'easeInOutQuad', duration: 600}
            ],
            delay: anime.stagger(80, {grid: [5, 0], from: 'center'})
          });
          isNO = true;
          setTimeout(() => isNO = false, 800)
    }
}

var normal_cb =  normalMode.children[1].firstChild;
var harder_cb = harderMode.children[1].firstChild;
var satanic_cb = satanicMode.children[1].firstChild;

normalMode.onclick = function(){
    if(!this.children[1].firstChild.checked){
        if(!this.children[1].firstChild.checked){
            an();
            changemode('normal');
        }
        this.children[1].firstChild.click();
        this.style.transform = 'scale(1.12)';

        if(harder_cb.checked){
            harder_cb.checked = false;
            harderMode.style.transform = null;
        }
    
        if(satanic_cb.checked){
            satanic_cb.checked = false;
            satanicMode.style.transform = null;
        }
    }
}
harderMode.onclick = function(){
    if(!this.children[1].firstChild.checked){
        if(!this.children[1].firstChild.checked){
            an();
            changemode('harder');
        }
        this.children[1].firstChild.click();
        this.style.transform = 'scale(1.12)';

        if(normal_cb.checked){
            normal_cb.checked = false;
            normalMode.style.transform = null;
        }
    
        if(satanic_cb.checked){
            satanic_cb.checked = false;
            satanicMode.style.transform = null;
        }
    }
}
satanicMode.onclick = function(){
    if(!this.children[1].firstChild.checked){
        if(!this.children[1].firstChild.checked){
            an();
            changemode('satanic');
        }
        this.children[1].firstChild.click();
        this.style.transform = 'scale(1.12)';

        if(normal_cb.checked){
            normal_cb.checked = false;
            normalMode.style.transform = null;
        }
    
        if(harder_cb.checked){
            harder_cb.checked = false;
            harderMode.style.transform = null;
        }
    }
}


function turn_buttons_ON(){

    for(i = 0; i < turnoff.length; i++){
        let b = turnoff[i]
        b.style.opacity = 0;
        b.classList.remove('block');
        setTimeout(() => b.style.opacity = 0, 250);
    }
}

function turn_buttons_OFF(){
    for(i = 0; i < turnoff.length; i++){
        let b = turnoff[i];
        b.classList.add('block');
        setTimeout(() => b.style.opacity = 1, 1);
    }
}