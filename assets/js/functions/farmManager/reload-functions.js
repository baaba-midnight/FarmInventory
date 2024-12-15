// this function is to get the equipment data for the manager side only
function fetchEquipment() {
    fetch('../../../functions/farmManager/fetchManagerEquipment.php')
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const tableBody = document.getElementById('equipmentTable').querySelector('tbody');
            tableBody.innerHTML = '';

            data.data.forEach(item => {
                const row = document.createElement('tr');

                row.innerHTML = `
                <tr>
                    <td>${item.equipment_name}</td>
                    <td>${item.category}</td>
                    <td>${item.status}</td>
                    <td>${item.farm_name}</td>
                    <td>
                        <!-- Example actions -->
                        <button class="btn btn-view" onclick="editEquipment(${item.id})">Edit</button>
                        <button class="btn btn-remove" onclick="deleteEquipment(${item.id})">Delete</button>
                        <a href="#" class="btn btn-sm" style="color: #0A9A05">Generate Report</a>
                    </td>
                </tr>`;

                tableBody.appendChild(row);
            });
        } else {
            console.error("No Equipment Data Found");
        }
    })
}

function fetchInventory() {
    fetch('../../../functions/farmManager/fetchManagerInventory.php')
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const tableBody = document.getElementById('inventoryTable').querySelector('tbody');
            tableBody.innerHTML = '';

            data.data.forEach(item => {
                const row = document.createElement('tr');

                row.setAttribute('data-id', item['id']);
                row.innerHTML = `
                <tr>
                    <td>${item.equipment_name}</td>
                    <td>${item.category}</td>
                    <td>${item.quantity}</td>
                    <td>${item.farm_name}</td>
                    <td>
                        <!-- Example actions -->
                        <button class="btn btn-view" onclick="editEquipmentItem(${item.equipment_id})">Edit</button>
                        <button class="btn btn-remove" onclick="deleteInventory(${item.equipment_id})">Delete</button>
                        <a href="#" class="btn btn-sm" style="color: #0A9A05">Generate Report</a>
                    </td>
                </tr>`;
                

                tableBody.appendChild(row);
            });
        } else {
            console.error("No Equipment Data Found");
        }
    })
}

function fetchFarms(userID) {
    fetch(`../../../functions/farmManager/fetchManagerFarms.php?id=${userID}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const content = document.getElementById('farmData');

                data.data.forEach(farm => {
                    const card = `
                    <div class="row justify-content-center">
                        <div class="col-md-10 mb-4">
                            <div class="card p-4">
                                <div class="farm-header">
                                    <h3 class="info farm-title">${farm['farm_name']}</h3>
                                    <a class="btn generate-report">Generate Report</a>
                                </div>
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
        });
}