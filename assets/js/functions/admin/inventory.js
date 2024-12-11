fetch("../../../functions/fetchInventoryItems.php")
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const tableBody = document.getElementById('inventoryTable').querySelector('tbody');

            data.data.forEach(item => {
                const row = document.createElement('tr');

                row.setAttribute('data-id', item['id']);

                row.innerHTML = `
                <td>${item['item_name']}</td>
                <td>${item['category']}</td>
                <td>${item['quantity']}</td>
                <td>${item['farm_name']}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-view">Edit</a>
                    <a href="#" class="btn btn-sm btn-remove" onclick="deleteInventoryItem(${item['id']})">Delete</a>
                </td>
                `;
                tableBody.appendChild(row);
            });
        } else {
            console.error("No Inventory Data Found");
        }
    })