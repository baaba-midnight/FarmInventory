fetch("../../../functions/admin/fetchInventory.php")
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const tableBody = document.getElementById('inventoryTable').querySelector('tbody');

            data.data.forEach(item => {
                const row = document.createElement('tr');

                row.setAttribute('data-id', item['id']);

                row.innerHTML = `
                <td>${item['name']}</td>
                <td>${item['category']}</td>
                <td>${item['quantity']}</td>
                <td>${item['farm_name']}</td>
                <td>${item['approval_status']}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-view" onclick="approve(${item['id']}, 'inventory')">Approve</a>
                    <a href="#" class="btn btn-sm btn-remove" onclick="reject(${item['id']}, 'inventory')">Reject</a>
                </td>
                `;
                tableBody.appendChild(row);
            });
        } else {
            console.error("No Inventory Data Found");
        }
    })