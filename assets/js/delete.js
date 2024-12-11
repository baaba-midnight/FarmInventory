// Open Delete Modal
function openDeleteModal(onConfirm) {
    const modal = document.getElementById('confirmDeleteModal');
    const input = document.getElementById('deleteConfirmationInput');
    const confirmButton = document.getElementById('confirmDeleteButton');
    const cancelButton = document.getElementById('cancelDeleteButton');

    // Reset input and button state
    input.value = '';
    confirmButton.disabled = true;

    // Show the modal
    modal.style.display = 'flex';

    // Enable button if the user types "DELETE"
    input.addEventListener('input', () => {
        confirmButton.disabled = input.value.trim().toUpperCase() !== 'DELETE';
    });

    // Handle Confirm Button Click
    confirmButton.onclick = () => {
        modal.style.display = 'none';
        onConfirm(); // Execute the delete callback
    };

    // Handle Cancel Button Click
    cancelButton.onclick = () => {
        modal.style.display = 'none';
    };
}

function deleteInventoryItem(itemId) {
    openDeleteModal(() => {
        // Perform the delete operation here
        console.log('Deleting item with ID:', itemId);

        fetch('../../../functions/deleteInventory.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `id=${itemId}`
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    fetchInventory(); // Refresh inventory list
                } else {
                    alert('Failed to delete inventory: ' + data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    });
}

function deleteFarm(farmId) {
    openDeleteModal(() => {
        console.log("Deleting farm with ID:", farmId);

        fetch('../../../functions/deleteFarm.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `id=${farmId}`
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    fetchFarms(); // Refresh inventory list
                } else {
                    alert('Failed to delete farm: ' + data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    })
}

function deleteUser(userId) {
    openDeleteModal(() => {
        console.log("Deleting farm with ID:", userId);

        fetch('../../../functions/deleteUser.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `id=${userId}`
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    fetchUsers(); // Refresh inventory list
                } else {
                    alert('Failed to delete farm: ' + data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    })
}