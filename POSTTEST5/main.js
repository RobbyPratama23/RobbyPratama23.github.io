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

// Menambahkan event listener untuk toggle dark mode
toggle.addEventListener('click', function() {
    // Toggle ikon antara 'bi-moon' dan 'bi-brightness-high'
    this.classList.toggle('bi-moon');
    this.classList.toggle('bi-brightness-high');

    // Cek apakah ikon saat ini adalah brightness-high
    if (this.classList.contains('bi-brightness-high')) {
        // Jika ikon brightness-high, atur tema terang
        body.style.background = '#fff';
        body.style.color = '#000';
    } else {
        // Jika ikon moon, atur tema gelap
        body.style.background = '#010101';
        body.style.color = '#fff';
    }
    
    // Tambahkan efek transisi untuk smooth
    body.style.transition = 'background 1.5s, color 1.5s';
});


