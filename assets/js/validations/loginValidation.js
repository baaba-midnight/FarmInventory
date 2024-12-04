import { isValidEmail } from "./commonValidations.js";
import { validateLoginPassword } from "./commonValidations.js";

export function validateLoginForm() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Get error spans
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');

    // Clear previous error messages
    emailError.textContent = '';
    passwordError.innerHTML = '';

    let isValid = true; 

    // Validate email
    if (!isValidEmail(email)) {
        emailError.textContent = 'Please enter a valid email address.';
        emailError.style.display = 'block';
        isValid = false;
    }

    // Validate password
    const errors = validateLoginPassword(password);
    if (errors.length > 0) {
        // Display errors in the passwordError container
        errors.forEach((error) => {
            const errorItem = document.createElement('div');
            errorItem.textContent = error;
            passwordError.appendChild(errorItem); 
        });
        passwordError.style.display = 'block';
        isValid = false; 
    }

    return isValid; 
}

// Attach event listener to the form
document.getElementById('loginForm').addEventListener('submit', (e) => {
    const isFormValid = validateLoginForm(); // Only call once
    console.log(isFormValid); // Debugging

    if (!isFormValid) {
        e.preventDefault(); // Prevent form submission if invalid
    }
});