// Function to handle search
function searchInventory() {
    const query = document.getElementById("search-input").value;

    const tableBody = document.querySelector("#inventoryTable tbody");
    tableBody.innerHTML = ''; // Clear previous data

    if (query.trim() === '') {
        // If search is cleared, reload original inventory items
        fetchInventory();
        return;
    }

    // Fetch filtered inventory data
    fetch(`../../../functions/search.php?context=inventory&query=${encodeURIComponent(query)}`)
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
                        <td>${item.item_name}</td>
                        <td>${item.category}</td>
                        <td>${item.quantity}</td>
                        <td>${item.farm_name}</td>
                        <td>
                            <!-- Example actions -->
                            <button class="btn btn-view">Edit</button>
                            <button class="btn btn-remove" onclick="deleteInventoryItem(${item.id})">Delete</button>
                            <a href="#" class="btn btn-sm" style="color: #0A9A05">Generate Report</a>
                        </td>
                    </tr>`;
                
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching search results:', error));
}

function searchFarms() {
    const query = document.getElementById("search-input").value;

    const farmContainer = document.getElementById("farmData");
    farmContainer.innerHTML = ''; // Clear previous farms

    if (query.trim() === '') {
        // Reload all farms
        fetchFarms();
        return;
    }

    // Fetch filtered farm data
    fetch(`../../../functions/search.php?context=farm_management&query=${encodeURIComponent(query)}`)
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
                                <div class="farm-header">
                                    <h3 class="info farm-title">${farm['farm_name']}</h3>
                                    <a class="btn generate-report">Generate Report</a>
                                </div>
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


function searchUsers() {
    const query = document.getElementById("search-input").value;

    const tableBody = document.querySelector("#userTable tbody");
    tableBody.innerHTML = ''; // Clear previous data

    if (query.trim() === '') {
        // If search is cleared, reload original inventory items
        fetchUsers();
        return;
    }

    // Fetch filtered inventory data
    fetch(`../../../functions/search.php?context=user_management&query=${encodeURIComponent(query)}`)
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
                    <td>${item.username}</td>
                    <td>${item.email}</td>
                    <td>${item.role}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-view" onclick="editUser(${item.id})">Edit</a>
                        <a href="#" class="btn btn-sm btn-remove" onclick="deleteUser(${item.id})">Delete</a>
                        <a href="#" class="btn btn-sm" style="color: #0A9A05">Generate Report</a>
                    </td>`;
                
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching user search results:', error));
}
