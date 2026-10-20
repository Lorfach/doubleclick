var taken = document.getElementById('username-taken');
var username_char = document.getElementById('username-char');
var pass_char = document.getElementById('pass-char');
var dont_match = document.getElementById('dont-match');

var username = document.querySelector('input[name=username]');
var password = document.querySelector('input[name=password]');
var repeat_password = document.querySelector('input[name=repeat-password]');

username.addEventListener('input', () => {
    if(username.value.length < 3){
        username_char.textContent = 'Username must have more than 2 characters';
        username_char.style.opacity = 1;
    }else if(username.value.length > 16){
        username_char.textContent = 'Username must be no more than 16 characters long';
    }else username_char.style.opacity = 0;
})

password.addEventListener('input', () => {

    if(password.value.length < 6){
        pass_char.style.opacity = 1;
        pass_char.textContent = 'Password must be at least 6 characters';
    }else if(password.value.length > 24){
        pass_char.style.opacity = 1;
        pass_char.textContent = 'Password length must be no more than 24 characters';
    }else pass_char.style.opacity = 0;

})

repeat_password.addEventListener('input', () => {
    if(repeat_password.value != password.value){
        dont_match.style.opacity = 1;
    }else dont_match.style.opacity = 0;
})
