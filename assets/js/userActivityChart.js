document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('userActivityChart').getContext('2d');
    let userActivityChart;

    function fetchUserActivity() {
        fetch('../../../functions/fetchUserActivity.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const labels = data.labels;
                    const loginCounts = data.loginCounts;

                    // update chart data dynamically
                    if (userActivityChart) {
                        userActivityChart.data.labels = labels;
                        userActivityChart.data.datasets[0].data = loginCounts;
                        userActivityChart.update();
                    } else {
                        // create chart if it doesn't exist
                        userActivityChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Logins',
                                    data: loginCounts,
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderWidth: 2,
                                    fill: true,
                                    tension: 0.4
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        display: true,
                                        position: 'top'
                                    }
                                }
                            }
                        });
                    }
                } else {
                    console.error('Failed to fetch user activity', data.message);
                }
            })
        .catch(error => console.error('Error:', error));
    }

    // fetch activity initially and set interval for periodic updates 
    fetchUserActivity();
    setInterval(fetchUserActivity, 30000); // update every 30 seconds
})