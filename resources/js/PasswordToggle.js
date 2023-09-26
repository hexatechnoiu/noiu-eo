

if (window.location.pathname.includes("/register") || window.location.pathname.includes("/login")) {

  window.togglePasswordField = (fieldId, iconId) => {
    const passwordField = document.getElementById(fieldId);
    const eyeIcon = document.getElementById(iconId);
    if (eyeIcon && passwordField) {
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
}
