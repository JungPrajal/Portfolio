document.addEventListener('DOMContentLoaded', function() {
    // Function to update phone number input with selected country code
    function updatePhoneNumber() {
        const countryCode = document.getElementById('country-code').value;
        const phoneNumberField = document.getElementById('basic-default-phone');
        phoneNumberField.value = countryCode; // Set phone number input with country code
    }

    // Event listener for country code selection change
    document.getElementById('country-code').addEventListener('change', updatePhoneNumber);

    // Event listener for phone number input validation
    document.getElementById('basic-default-phone').addEventListener('input', function() {
        const phoneInput = this.value;
        const phonePattern = /^\d{10}$/;

        if (!phonePattern.test(phoneInput)) {
            this.setCustomValidity('Phone number must have exactly 10 digits.');
        } else {
            this.setCustomValidity('');
        }
    });

    // Event listener for form submission
    document.querySelector('form').addEventListener('submit', function(event) {
        const phoneInput = document.getElementById('basic-default-phone');

        // Perform final validation before submission
        if (!phoneInput.validity.valid) {
            event.preventDefault(); // Prevent form submission if phone number is invalid
            alert(phoneInput.validationMessage);
        }
    });

    // Initialize phone number field with default country code
    updatePhoneNumber();
});
