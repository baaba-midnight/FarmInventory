fetch("../../../functions/fetchUsers.php")
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const tableBody = document.getElementById('userTable').querySelector('tbody');

            data.data.forEach(item => {
                const row = document.createElement('tr');

                row.setAttribute('data-id', item['id']);

                row.innerHTML = `
                <td>${item['username']}</td>
                <td>${item['email']}</td>
                <td>${item['role']}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-view" onclick="editUser(${item['id']})">Edit</a>
                    <a href="#" class="btn btn-sm btn-remove" onclick="deleteUser(${item['id']})">Delete</a>
                    <a href="#" class="btn btn-sm" style="color: #0A9A05">Generate Report</a>
                </td>
                `;
                tableBody.appendChild(row);
            });
        } else {
            console.error("No User Data Found");
        }
    })