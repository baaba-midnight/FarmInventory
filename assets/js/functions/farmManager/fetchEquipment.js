fetch("../../../functions/farmManager/fetchManagerEquipment.php")
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const tableBody = document.getElementById('equipmentTable').querySelector('tbody');

            data.data.forEach(equipment => {
                const row = document.createElement('tr');

                row.setAttribute('data-id', equipment['id']);

                row.innerHTML = `
                <td>${equipment['equipment_name']}</td>
                <td>${equipment['category']}</td>
                <td>${equipment['status']}</td>
                <td>${equipment['farm_name']}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-view" onclick="editEquipment(${equipment['id']})">Edit</a>
                    <a href="#" class="btn btn-sm btn-remove" onclick="deleteEquipment(${equipment['id']})">Delete</a>
                    <a href="#" class="btn btn-sm" style="color: #0A9A05">Generate Report</a>
                </td>
                `;
                tableBody.appendChild(row);
            });
        } else {
            console.error("No Equipment Data Found");
        }
    })