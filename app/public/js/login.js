document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("login").addEventListener("submit", function (e) {
    //get form data using getelementbyid
    const email = document.getElementById("email").value;
    const password = document.getElementById("login-password").value;
    const emailError = document.getElementById("email-error");
    const passwordError = document.getElementById("password-error");

    let valid = true;

    //checks for valid email and password
    if (!validateEmail(email)) {
      emailError.textContent = "Please enter a valid email";
      valid = false;
    } else {
      emailError.textContent = "";
    }

    if (!validatePassword(password)) {
      passwordError.textContent =
        "Password must be at least 8 characters long and contain at least one capital letter, one special character, and one number.";
      valid = false;
    } else {
      passwordError.textContent = "";
    }

    if (!valid) {
      e.preventDefault();
    }
  });

  // Function to validate email format using regular expression
  function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
  }

  // Function to validate password format using regular expression
  function validatePassword(password) {
    const re =
      /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+{}:;<>,.?~\\/-])[A-Za-z\d!@#$%^&*()_+{}:;<>,.?~\\/-]{8,}$/;
    return re.test(password);
  }
});
