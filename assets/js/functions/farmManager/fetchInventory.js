fetch("../../../functions/farmManager/fetchManagerInventory.php")
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const tableBody = document.getElementById('inventoryTable').querySelector('tbody');

            data.data.forEach(equipment => {
                const row = document.createElement('tr');

                row.setAttribute('data-id', equipment['id']);

                row.innerHTML = `
                <td>${equipment['name']}</td>
                <td>${equipment['category']}</td>
                <td>${equipment['quantity']}</td>
                <td>${equipment['farm_name']}</td>
                <td>${equipment['approval_status']}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-view" onclick="editInventory(${equipment['id']})">Edit</a>
                    <a href="#" class="btn btn-sm btn-remove" onclick="deleteInventory(${equipment['id']})">Delete</a>
                </td>
                `;
                tableBody.appendChild(row);
            });
        } else {
            console.error("No Inventory Data Found");
        }
    })