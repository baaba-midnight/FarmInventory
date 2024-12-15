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
                <td>${item['approval_status']}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-view" onclick="editInventoryItem(${item['id']})">Edit</a>
                    <a href="#" class="btn btn-sm btn-remove" onclick="deleteEquipment(${item['equipment_id']})">Delete</a>
                    <a href="#" class="btn btn-sm" style="color: #0A9A05">Generate Report</a>
                </td>
                `;
                tableBody.appendChild(row);
            });
        } else {
            console.error("No Inventory Data Found");
        }
    })