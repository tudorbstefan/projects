var username = 'tbodenlosz';
var password = '123456';
var userCredential = false;
var passwordCredential = false;
// var iconUsername = document.querySelector('.icon-username');

function verifyCredentials(event, userInput) {
    if (event.target.id === 'username') {
        if(userInput !== username) {
            document.getElementById('icon-username-right').style.visibility = 'hidden';
            document.getElementById('icon-username-wrong').style.visibility = 'visible';
            userCredential = false;
        } else {
            document.getElementById('icon-username-wrong').style.visibility = 'hidden';
            document.getElementById('icon-username-right').style.visibility = 'visible';
            userCredential = true;
        }
        
        if(userInput === '') {
            document.getElementById('icon-username-wrong').style.visibility = 'hidden';
            document.getElementById('icon-username-right').style.visibility = 'hidden';
        }
    } else if (event.target.id === 'password') {
        if(userInput !== password) {
            document.getElementById('icon-password-right').style.visibility = 'hidden';
            document.getElementById('icon-password-wrong').style.visibility = 'visible';
            passwordCredential = false;
        } else {
            document.getElementById('icon-password-wrong').style.visibility = 'hidden';
            document.getElementById('icon-password-right').style.visibility = 'visible';
            passwordCredential = true;
        }
        
        if(userInput === '') {
            document.getElementById('icon-password-wrong').style.visibility = 'hidden';
            document.getElementById('icon-password-right').style.visibility = 'hidden';
        }
    }
}

// change the bg of input

// function verifyCredentials(event, userInput) {
//     if (event.target.id == 'username') {
//         if(userInput !== username) {
//             document.getElementById('username').style.background = 'red';
//         } else {
//             document.getElementById('username').style.background = 'green';
//         }
        
//         if(userInput == '') {
//             document.getElementById('username').style.background = 'inherit';
//         }
//     } else if (event.target.id == 'password') {
//         if(userInput !== password) {
//             document.getElementById('password').style.background = 'red';
//         } else {
//             document.getElementById('password').style.background = 'green';
//         }
        
//         if(userInput == '') {
//             document.getElementById('password').style.background = 'inherit';
//         }
//     }
// }

function sendCredentials() {
    if (userCredential && passwordCredential) {
        alert('You have been logged in successful!\n\n\nHave a great time on our website.');
        window.location.replace('./index.html');
        sessionStorage.setItem('logged','true');
        sessionStorage.setItem('username', username);
    } else {
        confirm ('Your credentials are wrong or misspelled!');
    }
}