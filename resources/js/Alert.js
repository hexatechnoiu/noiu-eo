// Popup Alert

// Tambahkan kode JavaScript untuk mengatur bar waktu tersisa
let alertElement = document.getElementById("alert-3");
let timeBarElement = document.getElementById("time-bar");
let closeButton = document.querySelector('[data-dismiss-target="#alert-3"]');

if (alertElement && timeBarElement && closeButton) {

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
}
