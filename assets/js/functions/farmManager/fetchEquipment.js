function getEquipment(user_id) {
    fetch(`../../../functions/farmManager/fetchManagerEquipment.php?user_id=${user_id}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const tableBody = document.getElementById('equipmentTable').querySelector('tbody');

                data.data.forEach(equipment => {
                    const row = document.createElement('tr');

                    row.setAttribute('data-id', equipment['id']);

                    row.innerHTML = `
                    <td>${equipment['name']}</td>
                    <td>${equipment['category']}</td>
                    <td>${equipment['condition']}</td>
                    <td>${equipment['farm_name']}</td>
                    <td>${equipment['approval_status']}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-view" onclick="editEquipment(${equipment['id']})">Edit</a>
                        <a href="#" class="btn btn-sm btn-remove" onclick="deleteEquipment(${equipment['id']})">Delete</a>
                    </td>
                    `;
                    tableBody.appendChild(row);
                });
            } else {
                console.error("No Equipment Data Found");
            }
        })
}