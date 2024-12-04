import { isValidEmail } from './commonValidations.js';
import { isValidPassword } from './commonValidations.js';

export function validateRegistrationForm() {
    const email = document.getElementById('email').value.trim(); // Trim to avoid extra spaces
    const password = document.getElementById('password').value.trim();
    const confirmPassword = document.getElementById('confirmPassword').value.trim();

    let isValid = true;

    // Get error containers
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');
    const confirmPasswordError = document.getElementById('confirmPasswordError');

    // Clear existing error messages
    emailError.textContent = '';
    emailError.style.display = 'none';
    passwordError.innerHTML = '';
    passwordError.style.display = 'none';
    confirmPasswordError.textContent = '';
    confirmPasswordError.style.display = 'none';

    // Validate email
    if (!isValidEmail(email)) {
        emailError.textContent = 'Please enter a valid email address.';
        emailError.style.display = 'block';
        isValid = false;
    }

    // Validate passwords match
    if (password !== confirmPassword) {
        confirmPasswordError.textContent = 'Passwords do not match.';
        confirmPasswordError.style.display = 'block';
        isValid = false;
    }

    // Validate the password strength
    const passwordErrors = isValidPassword(password); // Assuming `isValidPassword` returns an array of error messages

    if (passwordErrors.length > 0) {
        // Display all password errors
        passwordErrors.forEach((error) => {
            const errorItem = document.createElement('div');
            errorItem.textContent = error;
            passwordError.appendChild(errorItem);
        });
        passwordError.style.display = 'block';
        isValid = false;
    }

    return isValid;
}

// Attach the validation to the form's submit event
document.getElementById('registrationForm').addEventListener('submit', (e) => {
    if (!validateRegistrationForm()) {
        e.preventDefault(); // Prevent form submission if validation fails
    }
});