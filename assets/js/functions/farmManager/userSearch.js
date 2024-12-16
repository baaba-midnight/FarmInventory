// This section is for Farm Manager Functions
function searchEquipment(userID) {
    const query = document.getElementById("search-input").value;
    const currentURL = window.location.href;

    const tableBody = document.querySelector("#equipmentTable tbody");
    tableBody.innerHTML = ''; // Clear previous data

    if (query.trim() === '') {
        // If search is cleared, reload original inventory items
        fetchEquipment();
        return;
    }

    // Fetch filtered inventory data
    fetch(`../../../functions/farmManager/userSearch.php?context=equipment&query=${encodeURIComponent(query)}&id=${userID}`)
        .then(response => response.json())
        .then(data => {
            if (data.length === 0) {
                tableBody.innerHTML = '<tr><td colspan="5">No results found.</td></tr>';
                return;
            }

            // Dynamically insert rows based on search results
            data.forEach(item => {
                const row = document.createElement('tr');
                row.setAttribute('data-id', item.id);

                row.innerHTML = `
                    <tr>
                        <td>${item.name}</td>
                        <td>${item.category}</td>
                        <td>${item.condition}</td>
                        <td>${item.farm_name}</td>
                        <td>${item.approval_status}</td>
                        <td>
                            <!-- Example actions -->
                            <button class="btn btn-view" onclick="editEquipment(${item.id})">Edit</button>
                            <button class="btn btn-remove" onclick="deleteEquipment(${item.equipment_id})">Delete</button>
                            
                        </td>
                    </tr>`;
                
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching search results:', error));
}

// This section is for Farm Manager Functions
function searchInventory(userID) {
    const query = document.getElementById("search-input").value;

    const tableBody = document.querySelector("#inventoryTable tbody");
    tableBody.innerHTML = ''; // Clear previous data

    if (query.trim() === '') {
        // If search is cleared, reload original inventory items
        fetchInventory();
        return;
    }

    // Fetch filtered inventory data
    fetch(`../../../functions/farmManager/userSearch.php?context=inventory&query=${encodeURIComponent(query)}&id=${userID}`)
        .then(response => response.json())
        .then(data => {
            if (data.length === 0) {
                tableBody.innerHTML = '<tr><td colspan="5">No results found.</td></tr>';
                return;
            }

            // Dynamically insert rows based on search results
            data.forEach(item => {
                const row = document.createElement('tr');
                row.setAttribute('data-id', item.id);

                row.innerHTML = `
                    <tr>
                        <td>${item.name}</td>
                        <td>${item.category}</td>
                        <td>${item.status}</td>
                        <td>${item.farm_name}</td>
                        <td>${item.approval_status}</td>
                        <td>
                            <!-- Example actions -->
                            <button class="btn btn-view" onclick="editInventory(${item.id})">Edit</button>
                            <button class="btn btn-remove" onclick="deleteInventory(${item.id})">Delete</button>
                            
                        </td>
                    </tr>`;
                
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching search results:', error));
}

function searchFarms(userID) {
    const query = document.getElementById("search-input").value;

    const farmContainer = document.getElementById("farmData");
    farmContainer.innerHTML = ''; // Clear previous farms

    if (query.trim() === '') {
        // Reload all farms
        fetchFarms(userID);
        return;
    }

    // Fetch filtered farm data
    fetch(`../../../functions/farmManager/userSearch.php?context=farm_management&query=${encodeURIComponent(query)}&id=${userID}`)
        .then(response => response.json())
        .then(data => {
            if (data.length === 0) {
                farmContainer.innerHTML = '<p>No farms found.</p>';
                return;
            }

            // Dynamically insert farm cards
            data.forEach(farm => {
                const card = `
                    <div class="row justify-content-center">
                        <div class="col-md-10 mb-4">
                            <div class="card p-4">
                                <h3 class="info farm-title">${farm['farm_name']}</h3>
                                <h6 class="info"><b>Location: </b>${farm.location}</h6>
                                <h6 class="info"><b>Primary Crop:</b> ${farm.primary_crop}</h6>
                                <h6 class="info"><b>Size:</b> ${farm.size_acres} acres</h6>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-view" onclick="openFarmDetailsModal(${farm.id})">View Details</a>
                                    <a class="btn btn-remove" onclick="deleteFarm(${farm.id})">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>`;
                farmContainer.innerHTML += card;
            });
        })
        .catch(error => console.error('Error fetching farm search results:', error));
}