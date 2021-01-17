function log_out(){
    //e.preventDefault();
    sessionStorage.clear();
    sessionStorage.setItem('status', 'Logged_out');
    alert(sessionStorage.getItem('status'));
    alert('Logging you out...');
    window.location="login.html";
}
