document.getElementById('hamburger').addEventListener('click', function() {
    var navMobile = document.getElementById('nav-mobile');
    navMobile.classList.toggle('open');  
});
document.addEventListener('contextmenu', function (e) {
    e.preventDefault();
});
document.addEventListener('keydown', function (e) {
    // Ctrl+Shift+I or Ctrl+Shift+J or Ctrl+U or F12
    if (
        (e.ctrlKey && (e.key === 'i' || e.key === 'j' || e.key === 'u')) || 
        e.key === 'F12'
    ) {
        e.preventDefault();
    }
});