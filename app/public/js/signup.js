document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("register").addEventListener("submit", function (e) {
    // Get form elements' data using getElementById
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const confpassword = document.getElementById("confpassword").value;
    const emailError = document.getElementById("email-error");
    const passwordError = document.getElementById("password-error");
    const confpasswordError = document.getElementById("confpassword-error");
    const nameError = document.getElementById("name-error");

    let valid = true;

    // Name validation
    if (name.trim() === "") {
      nameError.textContent = "Name is required";
      valid = false;
    } else {
      nameError.textContent = "";
    }

    // Email validation check
    if (!validateEmail(email)) {
      emailError.textContent = "Please enter a valid email";
      valid = false;
    } else {
      emailError.textContent = "";
    }

    // Check for password validation
    if (!validatePassword(password)) {
      passwordError.textContent =
        "Password must be at least 8 characters long and contain at least one capital letter, one special character, and one number.";
      valid = false;
    } else {
      passwordError.textContent = "";
    }

    // Check both passwords are the same
    if (password !== confpassword) {
      confpasswordError.textContent = "Passwords do not match";
      valid = false;
    } else {
      confpasswordError.textContent = "";
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
    return re.test(password); // Test password value
  }
});
