<div class="sidebar bg-light vh-100 p-3">
    <h3 class="mb-4">FarmSync</h3>
    <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="dashboard.php" class="nav-link"><i class="fi fi-ts-farm"></i>Dashboard</a></li>
        <li class="nav-item mb-2"><a href="inventory.php" class="nav-link"><i class="fi fi-ts-truck-moving"></i>Inventory</a></li>
        <li class="nav-item mb-2"><a href="farms.php" class="nav-link"><i class="fi fi-ts-tractor"></i>Farms</a></li>

        <?php if ($role === 'admin'): ?>
            <li class="nav-item mb-2"><a href="userManagement.php" class="nav-link"><i class="fi fi-ts-users-alt"></i>User Management</a></li>
        <?php endif; ?>
        <li class="nav-item"><a href="settings.php" class="nav-link"><i class="fi fi-ts-customize"></i>Settings</a></li>
    </ul>

    
    <div class="logout-btn">
        <a href="../../../auth/logout.php"><button class="btn btn-custom mt-auto"><i class="bi bi-box-arrow-right"></i>Logout</button></a>
    </div>
</div>

<script>
    // Get the current page url
    const currentPage = window.location.pathname.split("/").pop();
    console.log(currentPage);

    // Get all sidebar links
    const sidebarLinks = document.querySelectorAll(".nav-item a");

    // add the active class to the current page link
    sidebarLinks.forEach(link => {
        console.log(link.getAttribute('href'))
        if (link.getAttribute('href') === currentPage) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    })
</script>