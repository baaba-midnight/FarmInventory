async function openEditModal(itemID) {
    const modal = new bootstrap.Modal(document.getElementById('editItemModal')); // Initialize the Bootstrap modal
    const id = document.getElementById('edit-id');
    const name = document.getElementById('edit-item_name');
    const category = document.getElementById('edit_category');
    const status = document.getElementById('edit-status');
    const farmName = document.getElementById('edit_farmName');

    // Reset the form values
    id.value = '';
    name.value = '';
    category.value = '';
    status.value = '';
    farmName.value = '';

    try {
        // Fetch user data
        const data = await fetchItem(itemID);
        id.value = itemID;
        name.value = data.equipment_name;
        category.value = data.category;
        status.value = data.status;
        farmName.value = data.farm_id;

        // Show the modal using Bootstrap's modal methods
        modal.show();

        document.getElementById('editItemForm').addEventListener('submit', async function (event) {
            event.preventDefault(); // Prevent form from submitting normally
        
            const itemID = document.getElementById('edit-id').value;
            const name = document.getElementById('edit-item_name').value;
            const category = document.getElementById('edit_category').value;
            const status = document.getElementById('edit-status').value;
            const farmName = document.getElementById('edit_farmName').value;
        
            console.log(JSON.stringify({ itemID, name, category, status, farmName }));
            
            try {
                const response = await fetch(`../../../functions/updateEquipment.php`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ itemID, name, category, status, farmName }),
                });
        
                const result = await response.json();
        
                if (result.success) {
                    alert('Item updated successfully!');
                    const modal = bootstrap.Modal.getInstance(document.getElementById('editItemModal'));
                    modal.hide(); // Close the modal
                    fetchEquipment();
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

function editEquipment(itemID) {
    openEditModal(itemID);
}

async function fetchItem(itemID) {
    try {
        const response = await fetch(`../../../functions/farmManager/getEquipmentDetails.php?id=${itemID}`);
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
