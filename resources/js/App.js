import "./bootstrap";
import "@fortawesome/fontawesome-free/css/all.css";
import "flowbite";
import "../css/App.css";

window.transfer_data = (id) => {
    let button = document.getElementById("package-dropdown-button" + id);

    let thename = button.getAttribute("data-name");
    let cat_nane = button.getAttribute("data-category");
    let thedesc = button.getAttribute("data-desc");
    let pic = button.getAttribute("data-picture");
    let theprice = button.getAttribute("data-price");
    let cat_id = button.getAttribute("data-cat_id");

    let prepic = document.getElementById("pre-pic");
    let predesc = document.getElementById("pre-desc");
    let prename = document.getElementById("pre-name");
    let preprice = document.getElementById("pre-price");
    let precat = document.getElementById("pre-category");

    prename.innerHTML = thename;
    precat.innerHTML = cat_nane;
    predesc.innerHTML = thedesc;
    preprice.innerHTML = theprice;
    prepic.src = pic;

    let uname = document.getElementById("update_name");
    let umodal = document.getElementById("update_modal");
    let dform = document.getElementById("delete_form");

    let udesc = document.getElementById("update_desc");
    let uprice = document.getElementById("update_price");
    let uupdate_category = document.getElementById("update_category");

    dform.action = "/dashboard/packages/" + id;
    umodal.action = "/dashboard/packages/" + id;
    uname.value = thename;
    udesc.InnerHTML = thedesc;
    uprice.value = theprice;
    uupdate_category.selectedIndex = cat_id;
    udesc.value = thedesc;
    return;
};

if (
    window.location.pathname.includes("outbound") ||
    window.location.pathname.includes("mice")
) {
    window.ViewModal = (id) => {
        let img_modal = document.getElementById("img_modal");
        let name_modal = document.getElementById("name_modal");
        let category_modal = document.getElementById("category_modal");
        // let unit_modal = document.getElementById('unit_modal');
        let price_modal = document.getElementById("price_modal");
        let desc_modal = document.getElementById("desc_modal");
        let seedetail = document.getElementById("btnSeeDetail" + id);
        let nama = seedetail.getAttribute("data-name");
        let picture = seedetail.getAttribute("data-picture");
        let category = seedetail.getAttribute("data-category");
        // let unit = seedetail.getAttribute('data-unit')
        let price = seedetail.getAttribute("data-price");
        let desc = seedetail.getAttribute("data-desc");
        img_modal.src = picture ?? "";
        name_modal.innerHTML = nama ?? "Nama Produk";
        category_modal.innerHTML = category ?? "Kategori";
        // unit_modal.innerHTML = unit ?? 'Satuan';
        price_modal.innerHTML = price ?? "Harga Produk";
        desc_modal.innerHTML = desc ?? "Deskripsi Produk";
        return;
    };
}

const dropdownButtonOutbound = document.getElementById(
    "dropdown-button-outbound"
);

if (dropdownButtonOutbound) {
    dropdownButtonOutbound.addEventListener("click", function () {
        toggleIcon(this);
    });
}

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
    if (typewriter) {
        typeNextLetter();
    }
});

// Slick
$(".logo-slider").slick({
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
            },
        },
        {
            breakpoint: 426, // Breakpoint for mobile devices
            settings: {
                slidesToShow: 3,
            },
        },
    ],
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
let alertElement = document.getElementById("alert-3");
let timeBarElement = document.getElementById("time-bar");
let closeButton = document.querySelector('[data-dismiss-target="#alert-3"]');

// Fungsi untuk menghilangkan alert
function hideAlert() {
    alertElement.style.display = "none";
}

// Fungsi untuk mengatur bar waktu tersisa
function updateBar() {
    let duration = 10000; // Waktu dalam milidetik (5 detik dalam contoh ini)
    let interval = 100; // Interval untuk mengupdate bar

    let increment = (interval / duration) * 100;
    let currentValue = 100;

    let intervalId = setInterval(function () {
        currentValue -= increment;
        timeBarElement.style.width = currentValue + "%";

        if (currentValue <= 0) {
            clearInterval(intervalId);
            hideAlert();
        }
    }, interval);
}

// Tambahkan event listener untuk tombol close
if (closeButton) {
    closeButton.addEventListener("click", function () {
        hideAlert();
    });
}

// Panggil fungsi untuk mengatur bar waktu tersisa
if (alertElement) {
    updateBar();
}

// togglePassword (eye) Login
function togglePasswordField() {
    const passwordField = document.getElementById("password");
    const eyeIcon = document.getElementById("eyeIcon");
    if (passwordField || eyeIcon) {
        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        } else {
            passwordField.type = "password";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        }
    }
}
