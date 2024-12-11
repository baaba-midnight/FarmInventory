document.addEventListener('DOMContentLoaded', () => {
    const statInventory = document.getElementById('stat-inventory');
    const statUsers = document.getElementById('stat-users');
    const statFarms = document.getElementById('stat-farms');

    function fetchData() {
        fetch('../../../functions/adminDashboardAnalytics.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log(data);
                    statInventory.textContent = data.data[0].totalInventoryItems;
                    statUsers.textContent = data.data[0].totalUsers;
                    statFarms.textContent = data.data[0].totalFarms
                } else {
                    console.error('Failed to fetch dahboard statistics', data.message);
                }
            })
        .catch(error => console.error('Error:', error))
    }

    fetchData();
    setInterval(fetchData, 30000); // update every 30 seconds
})