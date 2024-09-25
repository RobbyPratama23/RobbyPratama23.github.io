// Toggle Class Active
const navbarNav = document.querySelector('.navbar-nav');
document.querySelector('#hamburger-menu').onclick = () => {
    navbarNav.classList.toggle('active');
};

// Klik di Luar Side Bar untuk hilangkan navbarnav
const hamburger = document.querySelector('#hamburger-menu');
document.addEventListener('click', function(e) {
    if(!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
        navbarNav.classList.remove('active');
    }
});


// PopUp
let popup = document.getElementById("popup");


function openPopup() {
    popup.classList.add('open-popup');
}

function closePopup() {
    popup.classList.remove('open-popup');
    setTimeout(() => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }, 300);
}


// Light Mode & Dark Mode
const toggle = document.getElementById('dark-mode');
const body = document.body;

toggle.addEventListener('click', function(){
    this.classList.toggle('bi-moon');
    if(this.classList.toggle('bi-brightness-high')){
        body.style.background = '#fff';
        body.style.color = '#000';
        body.style.transition ='1.5s';
    } else {
        body.style.background = '#010101';
        body.style.color = '#fff';
        body.style.transition = '1.5s';
    }
});

