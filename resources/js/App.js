"use strict"
// Laravel built-in
import "./bootstrap";

// External
import "flowbite";
import "./Alert";
import "./ModalDataCopier";

// CSS
import "@fortawesome/fontawesome-free/css/all.css";
import "../css/App.css";


if (document.querySelector(".logo-slider")) {
  import("../css/slick.css");
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
}
if (
  window.location.pathname.includes("outbound") ||
  window.location.pathname.includes("mice")
) {

  window.ViewModal = (id) => {
    let trigger_button = document.getElementById("btnSeeDetail" + id);
    let data = trigger_button.dataset;


    let package_name = data["name"]
    let package_picture = data["picture"]
    let package_category = data["category"]
    // let unit = seedetail.getAttribute('data-unit')
    let package_price = data["price"]
    let desc = data["desc"]

    document.getElementById("name_modal").innerHTML = package_name ?? "Nama Produk";
    document.getElementById("img_modal").src = package_picture ?? "";
    document.getElementById("category_detail").innerHTML = package_category
    document.getElementById("price_modal").innerHTML = package_price ?? "Harga Produk";
    document.getElementById("desc_modal").innerHTML = desc ?? "Deskripsi Produk";

    document.getElementById("package_id").value = id;
    document.getElementById('packageName').value = package_name;
    document.getElementById('booking_category').value = package_category;
    document.getElementById('booking_price').value = package_price.replace(/[\.\,]/g, "");
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
