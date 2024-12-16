function farms(userID) {
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
        });
}