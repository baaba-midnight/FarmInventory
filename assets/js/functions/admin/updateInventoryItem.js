async function openEditModal(itemID) {
    const modal = new bootstrap.Modal(document.getElementById('editItemModal')); // Initialize the Bootstrap modal
    const id = document.getElementById('edit-id');
    const name = document.getElementById('item_name');
    const category = document.getElementById('category');
    const quantity = document.getElementById('quantity');
    const approval_status = document.getElementById('status');

    // Reset the form values
    id.value = '';
    name.value = '';
    category.value = '';
    quantity.value = '';
    approval_status.value = '';

    try {
        // Fetch user data
        const data = await fetchItem(itemID);
        id.value = itemID;
        name.value = data.item_name;
        category.value = data.category;
        quantity.value = data.quantity;
        approval_status.value = data.approval_status;

        // Show the modal using Bootstrap's modal methods
        modal.show();

        document.getElementById('editItemForm').addEventListener('submit', async function (event) {
            event.preventDefault(); // Prevent form from submitting normally
        
            const itemID = document.getElementById('edit-id').value;
            const name = document.getElementById('item_name').value;
            const category = document.getElementById('category').value;
            const quantity = document.getElementById('quantity').value;
            const status = document.getElementById('status').value;
        
            try {
                const response = await fetch(`../../../functions/updateItem.php`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ itemID, name, category, quantity, status }),
                });
        
                const result = await response.json();
        
                if (result.success) {
                    alert('Item updated successfully!');
                    const modal = bootstrap.Modal.getInstance(document.getElementById('editItemModal'));
                    modal.hide(); // Close the modal
                    fetchInventory();
                } else {
                    alert('Failed to update item: ' + result.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while updating the item.');
            }
        });
        

        // close modal is cancelButton is clicked
        document.getElementById('cancelItemButton').addEventListener('click', function () {
            const modal = bootstrap.Modal.getInstance(document.getElementById('editItemModal'));
            modal.hide(); // Close the modal
        });        


    } catch (error) {
        console.error('Error fetching item data:', error);
        alert('Unable to fetch item details.');
    }
}

function editInventoryItem(itemID) {
    openEditModal(itemID);
}

async function fetchItem(itemID) {
    try {
        const response = await fetch(`../../../functions/getItemDetails.php?id=${itemID}`);
        const data = await response.json();

        if (data.success) {
            return data.data; // Correctly returns resolved data
        } else {
            alert("Failed to get item data");
            return []; // Return empty array in case of failure
        }
    } catch (error) {
        console.error('Error:', error);
        return []; // Handle errors gracefully
    }
}
