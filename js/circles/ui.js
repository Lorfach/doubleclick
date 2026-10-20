// if(window.history.replaceState){
//     window.history.replaceState(null, null, window.location.href);
// }

function g(i){
    return document.getElementById(i);
}

var cmItem = $('.cm-item'),
    cmItemStylesOn = {"opacity":"0", "display":"flex"},
    cmItemStylesOff = {"opacity":"0", "display":"none"},
    cmif = document.getElementsByClassName('cm-item-first')[0],
    mChangeModeMenu = g('m-changeMode-menu'),
    mChangeModeTitle = g('m-changeMode-title'),
    shown = 0,
    shown2 = 0,
    keyPadsIn = keyPadsIn = document.getElementsByClassName('keypadIn'),
    accountMobile = g('account-mobile'),
    mAccountMenu = g('m-account-menu'),
    startTitle = g('startTitle'),
    circle = document.getElementsByClassName('circle')[0].cloneNode(true),
    lastCircle = document.getElementsByClassName('lasts-circle')[0].cloneNode(true),
    line = document.getElementsByClassName('line'),
    mode,
    keypadOut = document.getElementsByClassName('keypadOut'),
    scoreDiv = g('score').children[0];

circle.removeAttribute('style');
lastCircle.removeAttribute('style');

document.getElementsByClassName('circle')[0].remove();
document.getElementsByClassName('circle')[0].remove();


cmItem.on('click', function(){
    if(!$(this).hasClass('cm-item-first')){
        cmItem.removeClass('cm-item-first');
        $(this).addClass('cm-item-first');
        change_mode(this.textContent);
    }
})

mChangeModeTitle.addEventListener('click', function(){
    if(shown){
        setTimeout(function(){
            mChangeModeMenu.classList.remove('display-flex');
        }, 150)
        mChangeModeMenu.classList.remove('show');
        shown = 0;
    }else{
        mChangeModeMenu.classList.add('display-flex');

        setTimeout(() => {
            mChangeModeMenu.classList.add('show');
        }, 1)
        mChangeModeTitle.style.zIndex = '33';
        shown = 1;
    }
})

accountMobile.addEventListener('click', function(){
    if(shown2){
        setTimeout(function(){
            mAccountMenu.classList.remove('display-flex');
        }, 150)
        mAccountMenu.classList.remove('show');
        shown2 = 0;
    }else{
        mAccountMenu.classList.add('display-flex');

        setTimeout(() => {
            mAccountMenu.classList.add('show')
        }, 1)
        mChangeModeTitle.style.zIndex = '27';
        shown2 = 1;
    }
})

document.addEventListener('keydown', function(e){
    if(e.code == 'KeyQ'){
        keyPadsIn[0].classList.add('pressed');
    }else if(e.code == 'KeyW'){
        keyPadsIn[1].classList.add('pressed');
    }else if(e.code == 'KeyE'){
        keyPadsIn[2].classList.add('pressed');
    }
});

document.addEventListener('keyup', function(e){
    if(e.code == 'KeyQ'){
        keyPadsIn[0].classList.remove('pressed');
    }else if(e.code == 'KeyW'){
        keyPadsIn[1].classList.remove('pressed');
    }else if(e.code == 'KeyE'){
        keyPadsIn[2].classList.remove('pressed');

    }
});