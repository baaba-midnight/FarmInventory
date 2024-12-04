//  Contains reusable validation functions like email validation, password strength checks, etc.

export function isValidEmail(email) {
    const emailPattern = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
    return emailPattern.test(email);
}

export function validateLoginPassword(password) {
    const errors = [];

    if (!password) {
        errors.push("Password cannot be empty.");
    }

    if (password.length < 8) {
        errors.push("Password must be at least 8 characters long.");
    }

    return errors;
}

export function isValidPassword(password) {
    const errors = [];

    if (password.length < 8) {
        errors.push("Password must be at least 8 characters long.");
    }
    if (!/[A-Z]/.test(password)) {
        errors.push("Password must contain at least one uppercase letter.");
    }
    if (!/[a-z]/.test(password)) {
        errors.push("Password must contain at least one lowercase letter.");
    }
    if (!/[0-9]/.test(password)) {
        errors.push("Password must contain at least one number.");
    }
    if (!/[!@#$%^&*]/.test(password)) {
        errors.push("Password must contain at least one special character (!@#$%^&*).");
    }

    return errors;
}