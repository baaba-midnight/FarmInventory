document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('addItemForm'); // The ID of your form

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission

        const item_name = document.getElementById('add-item_name').value.trim();
        const quantity = document.getElementById('add_quantity').value.trim();
        const category = document.getElementById('add_category').value.trim();
        const farm_name = document.getElementById('farm_name').value.trim();

        console.log(JSON.stringify({ item_name, quantity, category, farm_name }));

        // Validate inputs (optional)
        if (!item_name || !quantity || !category || !farm_name) {
            alert("All fields are required.");
            return;
        }

        console.log(JSON.stringify({ item_name, quantity, category, farm_name }));
        // Send POST request to the server
        fetch("../../../functions/farmManager/addInventoryItem.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json', // Specify JSON content type
            },
            body: JSON.stringify({ item_name, quantity, category, farm_name })
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    fetchInventory(); // Optional: Refresh the equipment list
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while adding the item.');
            });
    });
});
