fetch("../../../functions/admin/fetchEquipment.php")
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const tableBody = document.getElementById('equipmentTable').querySelector('tbody');

            data.data.forEach(item => {
                const row = document.createElement('tr');

                row.setAttribute('data-id', item['id']);

                row.innerHTML = `
                <td>${item['name']}</td>
                <td>${item['category']}</td>
                <td>${item['condition']}</td>
                <td>${item['farm_name']}</td>
                <td>${item['approval_status']}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-view" onclick="approve(${item['id']}, 'equipment')">Approve</a>
                    <a href="#" class="btn btn-sm btn-remove" onclick="reject(${item['id']}, 'equipment')">Reject</a>
                    
                </td>
                `;
                tableBody.appendChild(row);
            });
        } else {
            console.error("No Equipment Data Found");
        }
    })