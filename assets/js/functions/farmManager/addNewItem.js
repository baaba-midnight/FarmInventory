document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('addItemForm'); // The ID of your form

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission

        const item_name = document.getElementById('add-item_name').value.trim();
        const category = document.getElementById('add_category').value.trim();
        const quantity = document.getElementById('quantity').value.trim();
        const farm_name = document.getElementById('farm_name').value.trim();

        // Validate inputs (optional)
        if (!item_name || !category || !quantity || !farm_name) {
            alert("All fields are required.");
            console.log(item_name);
            console.log(category);
            console.log(quantity);
            console.log(farm_name);
            return;
        }

        let action;
        let currentURL = window.location.href;

        console.log(currentURL);

        if (currentURL.includes('inventory')) {
            action = 'inventory';
        } else {
            action = 'equipment';
        }

        console.log(JSON.stringify({ item_name, category, quantity, farm_name }));
        console.log(action);

        // Send POST request to the server
        fetch("../../../functions/addNewItem.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json', // Specify JSON content type
            },
            body: JSON.stringify({ item_name, category, quantity, farm_name })
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
                    fetchEquipment(action); // Optional: Refresh the equipment list
                    
                    // close the form

                    form.reset(); // Reset the form fields
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
