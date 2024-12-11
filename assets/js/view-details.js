// Open the farm details modal and load data
function openFarmDetailsModal(farmId) {
    const modal = new bootstrap.Modal(document.getElementById("farmDetailsModal"));
    const farmDetailsContainer = document.getElementById("farmDetails");

    // Fetch farm details using the farm ID
    fetch(`../../../functions/getFarmDetails.php?id=${farmId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const farm = data.data;
                farmDetailsContainer.innerHTML = `
                    <h3>${farm.farm_name}</h3>
                    <p><strong>Location:</strong> ${farm.location}</p>
                    <p><strong>Primary Crop:</strong> ${farm.primary_crop}</p>
                    <p><strong>Size:</strong> ${farm.size_acres} acres</p>
                    <p><strong>Farm Manager:</strong> ${farm.manager_name}</p>
                    <p><strong>Created At:</strong> ${farm.created_at}</p>
                `;
                // Show the modal
                modal.show();
            } else {
                alert('Failed to load farm details');
            }
        })
        .catch(error => console.error('Error:', error));
}
