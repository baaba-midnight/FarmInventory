async function openEditModal(itemID) {
    const modal = new bootstrap.Modal(document.getElementById('editItemModal')); // Initialize the Bootstrap modal
    const id = document.getElementById('edit_id');
    const name = document.getElementById('edit_itemName');
    const category = document.getElementById('edit_category');
    const quantity = document.getElementById('edit_quantity');
    const farmName = document.getElementById('edit_farmName');
    

    // Reset the form values
    id.value = '';
    name.value = '';
    category.value = '';
    quantity.value = '';
    farmName.value = '';

    try {
        // Fetch user data
        const data = await fetchItem(itemID);
        id.value = itemID;
        console.log(data);
        name.value = data.equipment_name;
        category.value = data.category;
        quantity.value = data.quantity;
        farmName.value = data.farm_id;

        // Show the modal using Bootstrap's modal methods
        modal.show();

        document.getElementById('editItemForm').addEventListener('submit', async function (event) {
            event.preventDefault(); // Prevent form from submitting normally
        
            const itemID = document.getElementById('edit_id').value;
            const name = document.getElementById('edit_itemName').value;
            const category = document.getElementById('edit_category').value;
            const quantity = document.getElementById('edit_quantity').value;
            const farmName = document.getElementById('edit_farmName').value;
        
            try {
                const response = await fetch(`../../../functions/updateInventory.php`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ itemID, name, category, quantity, farmName }),
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
        const response = await fetch(`../../../functions/farmManager/getInventoryDetails.php?id=${itemID}`);
        const data = await response.json();

        if (data.success) {
            return data.data; // Correctly returns resolved data
        } else {
            return []; // Return empty array in case of failure
        }
    } catch (error) {
        console.error('Error:', data);
        return []; // Handle errors gracefully
    }
}
