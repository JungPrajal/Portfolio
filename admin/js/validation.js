document.getElementById('basic-default-password').addEventListener('input', function() {
    const password = this.value;
    const passwordRequirements = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
  
    if (!passwordRequirements.test(password)) {
      this.setCustomValidity('Password must be at least 8 characters long and contain uppercase letters, lowercase letters, numbers, and symbols.');
    } else {
      this.setCustomValidity('');
    }
  });
  
  document.querySelector('form').addEventListener('submit', function(event) {
    const passwordInput = document.getElementById('basic-default-password');
  
    // Perform final validation before submission
    if (!passwordInput.validity.valid) {
      event.preventDefault(); // Prevent form submission if password is invalid
      alert(passwordInput.validationMessage);
    }
  });
  
  document.getElementById('toggle-password').addEventListener('click', function() {
    const passwordInput = document.getElementById('basic-default-password');
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    this.classList.toggle('fa-eye');
    this.classList.toggle('fa-eye-slash');
  });
  