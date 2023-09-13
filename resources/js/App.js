import "./bootstrap";
import '@fortawesome/fontawesome-free/css/all.css'
import 'flowbite';
import '../css/App.css'


// Mendapatkan elemen tombol outbound
const dropdownButtonOutbound = document.getElementById(
    "dropdown-button-outbound"
);

// Tambahkan event listener pada tombol dropdown outbound
dropdownButtonOutbound.addEventListener("click", function () {
    toggleIcon(this);
});

// Fungsi untuk toggle ikon tombol
function toggleIcon(button) {
    const icon = button.querySelector("i.fas");

    if (icon.classList.contains("fa-chevron-up")) {
        icon.classList.remove("fa-chevron-up");
        icon.classList.add("fa-chevron-down");
    } else {
        icon.classList.remove("fa-chevron-down");
        icon.classList.add("fa-chevron-up");
    }
}

// Typewriter
document.addEventListener("DOMContentLoaded", function () {
    const typewriter = document.getElementById("typewriter");
    const words = ["Happy", "Innovative", "Distruptive", "Magic"];
    let wordIndex = 0;
    let letterIndex = 0;
    let deleting = false;

    function typeNextLetter() {
        const word = words[wordIndex];

        if (!deleting) {
            typewriter.textContent = word.substring(0, letterIndex + 1);
            letterIndex++;
        } else {
            typewriter.textContent = word.substring(0, letterIndex);
            letterIndex--;
        }

        if (!deleting && letterIndex <= word.length) {
            setTimeout(typeNextLetter, 200); // Delay before typing next letter
        } else {
            if (!deleting) {
                deleting = true;
                setTimeout(typeNextLetter, 2000); // Delay before starting to delete
            } else {
                if (letterIndex >= 0) {
                    setTimeout(typeNextLetter, 200); // Delay before deleting next letter
                } else {
                    wordIndex = (wordIndex + 1) % words.length;
                    letterIndex = 0;
                    deleting = false;
                    setTimeout(typeNextLetter, 500); // Delay before typing next word
                }
            }
        }
    }

    typeNextLetter();
});

// Slick
$('.logo-slider').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 1500,
    infinite: true,
    responsive: [
        {
            breakpoint: 641, // Breakpoint for mobile devices
            settings: {
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 426, // Breakpoint for mobile devices
            settings: {
                slidesToShow: 3,
            }
        }
    ]
});

// Scroll To Top
let calcScrollValue = () => {
    let scrollProgress = document.getElementById("progress");
    let progressValue = document.getElementById("progress-value");
    let pos = document.documentElement.scrollTop;
    let calcHeight =
        document.documentElement.scrollHeight -
        document.documentElement.clientHeight;
    let scrollValue = Math.round((pos * 100) / calcHeight);
    if (pos > 100) {
        scrollProgress.style.display = "grid";
    } else {
        scrollProgress.style.display = "none";
    }
    scrollProgress.addEventListener("click", () => {
        document.documentElement.scrollTop = 0;
    });
    scrollProgress.style.background = `conic-gradient(#4D3EFF ${scrollValue}%, #D7D7D7 ${scrollValue}%)`;
};

window.onscroll = calcScrollValue;
window.onload = calcScrollValue;

// Popup Alert

// Tambahkan kode JavaScript untuk mengatur bar waktu tersisa
var alertElement = document.getElementById('alert-3');
var timeBarElement = document.getElementById('time-bar');
var closeButton = document.querySelector('[data-dismiss-target="#alert-3"]');

// Fungsi untuk menghilangkan alert
function hideAlert() {
    alertElement.style.display = 'none';
}

// Fungsi untuk mengatur bar waktu tersisa
function updateBar() {
    var duration = 10000; // Waktu dalam milidetik (5 detik dalam contoh ini)
    var interval = 100; // Interval untuk mengupdate bar

    var increment = (interval / duration) * 100;
    var currentValue = 100;

    var intervalId = setInterval(function () {
        currentValue -= increment;
        timeBarElement.style.width = currentValue + '%';

        if (currentValue <= 0) {
            clearInterval(intervalId);
            hideAlert();
        }
    }, interval);
}

// Tambahkan event listener untuk tombol close
closeButton.addEventListener('click', function() {
    hideAlert();
});

// Panggil fungsi untuk mengatur bar waktu tersisa
updateBar();

// const eyeIcon = document.querySelector("i.eyeIcon");

// eyeIcon.addEventListener('click', ()=>{
//     window.alert("yesy")
//     // togglePasswordField()
// })

function togglePasswordField() {
    const passwordField = document.getElementById("password");
    const eyeIcon = document.getElementById("eyeIcon");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    }
}

