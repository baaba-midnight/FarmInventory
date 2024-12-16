document.addEventListener('DOMContentLoaded', () => {
    // Navigation Handling
    const navButtons = document.querySelectorAll('[data-section]');
    const sections = {
        'profile': document.getElementById('profile-section'),
        'data': document.getElementById('data-section')
    };

    navButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons and sections
            navButtons.forEach(btn => btn.classList.remove('active'));
            Object.values(sections).forEach(section => section.classList.add('d-none'));

            // Add active class to clicked button and show corresponding section
            button.classList.add('active');
            sections[button.dataset.section].classList.remove('d-none');
        });
    });

    // Profile Form Submission
    const profileForm = document.getElementById('profile-form');
    profileForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const id = document.getElementById('id').value;
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const currentPassword = document.getElementById('current-password').value;
        const newPassword = document.getElementById('new-password').value;
        const confirmPassword = document.getElementById('confirm-password').value;

        console.log(JSON.stringify({ id, name, email, currentPassword, newPassword, confirmPassword }));
        
        fetch('../../../functions/updateProfile.php', {
            method: 'POST',
            body: JSON.stringify({ id, name, email, currentPassword, newPassword, confirmPassword })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Profile updated successfully!');

                const currentPassword = document.getElementById('current-password');
                const newPassword = document.getElementById('new-password');
                const confirmPassword = document.getElementById('confirm-password');

                currentPassword.value = '';
                newPassword.value = '';
                confirmPassword.value = '';
            } else {
                alert('Error updating profile: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while updating profile.');
        });
    });

    // Data Export
    const exportDataButton = document.getElementById('export-data');
    exportDataButton.addEventListener('click', () => {
        fetch('../../../functions/export_data.php', {
            method: 'POST'
        })
        .then(response => response.blob())
        .then(blob => {
            // Create a link to download the exported data
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            a.download = 'farm_data_export_' + new Date().toISOString().split('T')[0] + '.csv';
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while exporting data.');
        });
    });
});
