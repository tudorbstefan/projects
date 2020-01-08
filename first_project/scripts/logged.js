function verifyLogState() {
    if(sessionStorage.getItem('logged')){
        document.getElementById('login-text').innerHTML = sessionStorage.getItem('username');
        document.getElementById('login-text').removeAttribute('href');
    }
}