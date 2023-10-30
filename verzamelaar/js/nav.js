let nav = document.getElementById('nav');
    
window.addEventListener('scroll', function() {
    let scrollPosition = window.scrollY;
    
    if (scrollPosition > 10) {
        nav.classList.add('nav-scroll');
    } else {
        nav.classList.remove('nav-scroll');
    }
});