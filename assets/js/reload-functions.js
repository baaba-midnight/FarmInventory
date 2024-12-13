function fetchFarms() {
    fetch("../../../functions/fetchFarms.php")
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const content = document.getElementById('farmData');

            content.innerHTML = '';

            data.data.forEach(farm => {
                const card = `
                <div class="row justify-content-center">
                    <div class="col-md-10 mb-4">
                        <div class="card p-4">
                            <h3 class="info farm-title">${farm['farm_name']}</h3>
                            <h6 class="info"><b>Location: </b>${farm['location']}</h6>
                            <h6 class="info"><b>Primary Crop:</b> ${farm['primary_crop']}</h6>
                            <h6 class="info"><b>Size:</b> ${farm['size_acres']} acres</h6>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-view" onclick="openFarmDetailsModal(${farm['id']})">View Details</a>
                                <a class="btn btn-remove" onclick="deleteFarm(${farm['id']})">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                `
                content.innerHTML += card;
            })
        } else {
            console.error("No Farm Data Found")
        }
    })
}

function fetchInventory() {
    fetch("../../../functions/fetchInventoryItems.php")
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const tableBody = document.getElementById('inventoryTable').querySelector('tbody');
            tableBody.innerHTML = '';

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
}

function fetchUsers() {
    fetch("../../../functions/fetchUsers.php")
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const tableBody = document.getElementById('userTable').querySelector('tbody');
            tableBody.innerHTML = '';

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
                </td>
                `;
                tableBody.appendChild(row);
            });
        } else {
            console.error("No User Data Found");
        }
    })
}