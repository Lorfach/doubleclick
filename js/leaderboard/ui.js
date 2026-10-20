var whiteLine = document.getElementById('changeLine'),
    suoBlock = document.getElementById('suo'),
    circlesBlock = document.getElementById('circles'),
    line = document.getElementById('copy').cloneNode(true),
    removelines = document.getElementsByClassName('line'),
    lines = [],
    wrapper = document.getElementById('wrapper'),
    moreBtn = document.getElementById('more'),
    isBoardFull = 0,
    localmodes = document.getElementsByClassName('diff-button'),
    local_mode = 'normal',
    last_local_mode,
    last_block_top;

for(let i = 0; i < removelines.length; i++){
    lines.push(document.getElementsByClassName('line')[i].cloneNode(true));
    lines[i].removeAttribute('style');
}

for(let i = 0; i < removelines.length; i++){
    removelines[i].remove();
}

line.removeAttribute('style');
line.removeAttribute('id');
document.getElementById('copy').remove();

if(localStorage.getItem('leaderboardMode')){
    if(localStorage.getItem('leaderboardMode') == 'suo'){
        var mode = 'suo';
    }else{
        var mode = 'circles';
    }
}else{
    var mode = 'suo';
}
    
moreBtn.addEventListener('click', function(){
    if(last_block_top.children.length > 10){
        if(wrapper.style.height == 'auto'){
            wrapper.removeAttribute('style');
            moreBtn.textContent = 'More...';
            wrapper.style.height = '655px';
        }else{
            wrapper.style.height = 'auto';
            moreBtn.textContent = 'Less...';
        }
    }
});

suoBlock.onclick = function(){
    if(whiteLine.style.top != '25px'){
        this.style.transform = 'scale(1.1)';
        this.style.filter = 'contrast(110%)';
        circlesBlock.removeAttribute('style');
        whiteLine.style.top = '25px';
        localStorage.setItem('leaderboardMode', 'suo');
    }
}

circlesBlock.onclick = function(){
    if(whiteLine.style.top != '90px'){
        this.style.transform = 'scale(1.1)';
        this.style.filter = 'contrast(140%)';
        suoBlock.removeAttribute('style');
        whiteLine.style.top = '90px';
        localStorage.setItem('leaderboardMode', 'circles');
    }
}

function change_local_mode(modelocal){
    if(last_block_top && last_block_top != document.getElementById(mode + '_' + modelocal)){
        let lbt = last_block_top;
        lbt.style.opacity = '0';
        setTimeout(function(){
            lbt.style.display = 'none';
        }, 70)
    }
    if(!document.getElementById(mode + '_' + modelocal)){
        var block = document.createElement('div');
        block.setAttribute('id', (mode + '_' + modelocal));
        wrapper.append(block);
    }else if(last_block_top != document.getElementById(mode + '_' + modelocal)){
        setTimeout(function(){
          document.getElementById(mode + '_' + modelocal).style.display = 'block';
        },100)
        setTimeout(function(){
            document.getElementById(mode + '_' + modelocal).style.opacity = '1';
        },135)
    }
    last_block_top = document.getElementById(mode + '_' + modelocal);
}

if(mode == 'suo'){
    suoBlock.click();
}else circlesBlock.click();

var alltop = ['asd', 'dsa', 'ppp'];

fetch('/php/leaderboardEngine.php')
.then(response => {
    return response.json();
})
.then(body => {
    alltop = body;
    fill_leaderboard(alltop);
});

for(let i = 0; i < localmodes.length; i++){
    localmodes[i].addEventListener('click', function(){
        this.style.filter = 'contrast(120%)';
        this.style.transform = 'scale(1.1)';
        if(last_local_mode && localmodes[i] != last_local_mode){
            last_local_mode.removeAttribute('style');
        }
        last_local_mode = localmodes[i];
        local_mode = last_local_mode.id;

        if(i == 0){
            change_local_mode('normal');
            if(!fill_leaderboard.normal){
                fill_leaderboard.normal = true;
            }
        }else if(i == 1){
          change_local_mode('harder');
          if(!fill_leaderboard.harder){
              fill_leaderboard.harder = true;
              fill_leaderboard(alltop);
          }
        }else if(i == 2){
            change_local_mode('satanic');
            if(!fill_leaderboard.satanic){
                fill_leaderboard.satanic = true;
                fill_leaderboard(alltop);
            }
        };
    });
}

localmodes[0].click();

function fill_leaderboard(at){
    if(local_mode == 'normal'){
        var these_top = at[0];
    }else if(local_mode == 'harder'){
        var these_top = at[1];
    }else if(local_mode == 'satanic'){
        var these_top = at[2];
    }

    if(these_top.length > 10){
        setTimeout(() => {
            for(let i = 0; i <= 10; i++){
                if(i < 3){
                    if(these_top[i]){
                        let nb = lines[i].cloneNode(true);
                        nb.children[0].textContent = these_top[i][0];
                        nb.children[1].textContent = these_top[i][1];
                        last_block_top.append(nb);
                    }
                }else{
                    for(let i = 3; i < 100; i++){
                        if(these_top[i]){
                            let div = line.cloneNode(true);
                            div.children[0].textContent = these_top[i][0];
                            div.children[1].textContent = these_top[i][1];
                            div.getElementsByClassName('place-value')[0].textContent = i+1;
                         last_block_top.append(div);
                        }else break;
                    }
                    break;
                }
            }
        }, 160)
    }else{
        setTimeout(() => {
            for(let i = 0; i < these_top.length; i++){
                if(i < 3){
                    if(these_top[i]){
                        let nb = lines[i].cloneNode(true);
                        nb.children[0].textContent = these_top[i][0];
                        nb.children[1].textContent = these_top[i][1];
                        last_block_top.append(nb);
                    }
                }else{
                    for(let i = 3; i <= 10; i++){
                        if(these_top[i]){
                            let div = line.cloneNode(true);
                            div.children[0].textContent = these_top[i][0];
                            div.children[1].textContent = these_top[i][1];
                            div.getElementsByClassName('place-value')[0].textContent = i+1;
                         last_block_top.append(div);
                        }else break;
                    }
                    break;
                }
            }
        }, 160);
    }

}