async function openEditModal(userID) {
    const modal = new bootstrap.Modal(document.getElementById('editUserModal')); // Initialize the Bootstrap modal
    const id = document.getElementById('edit-id');
    const username = document.getElementById('username-update');
    const email = document.getElementById('email-update');
    const role = document.getElementById('role-update');
    const cancelButton = document.getElementById('cancelUpdateButton')

    // Reset the form values
    id.value = '';
    username.value = '';
    email.value = '';
    role.value = '';

    try {
        // Fetch user data
        const data = await fetchUser(userID);
        id.value = userID;
        username.value = data.username;
        email.value = data.email;
        role.value = data.role;

        // Show the modal using Bootstrap's modal methods
        modal.show();

        document.getElementById('editUserForm').addEventListener('submit', async function (event) {
            event.preventDefault(); // Prevent form from submitting normally
        
            const userID = document.getElementById('edit-id').value;
            const username = document.getElementById('username-update').value;
            const email = document.getElementById('email-update').value;
            const role = document.getElementById('role-update').value;

            console.log(JSON.stringify({ userID, username, email, role }))
        
            try {
                const response = await fetch(`../../../functions/updateUser.php`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ userID, username, email, role }),
                });
        
                const result = await response.json();
        
                if (result.success) {
                    alert('User updated successfully!');
                    const modal = bootstrap.Modal.getInstance(document.getElementById('editUserModal'));
                    modal.hide(); // Close the modal
                    fetchUsers();
                } else {
                    alert('Failed to update user: ' + result.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while updating the user.');
            }
        });
        

        // close modal is cancelButton is clicked
        document.getElementById('cancelUpdateButton').addEventListener('click', function () {
            const modal = bootstrap.Modal.getInstance(document.getElementById('editUserModal'));
            modal.hide(); // Close the modal
        });        


    } catch (error) {
        console.error('Error fetching user data:', error);
        alert('Unable to fetch user details.');
    }
}

function editUser(userID) {
    openEditModal(userID);
}

async function fetchUser(userID) {
    try {
        const response = await fetch(`../../../functions/getUserDetails.php?id=${userID}`);
        const data = await response.json();

        if (data.success) {
            return data.data; // Correctly returns resolved data
        } else {
            alert("Failed to get user data");
            return []; // Return empty array in case of failure
        }
    } catch (error) {
        console.error('Error:', error);
        return []; // Handle errors gracefully
    }
}
