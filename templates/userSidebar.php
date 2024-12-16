<div class="sidebar bg-light vh-100 p-3">
    <h1>FarmSync</h1>

    <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="dashboard.php" class="nav-link"><i class="bi bi-house-fill"></i>Dashboard</a></li>
        <li class="nav-item mb-2"><a href="inventory.php" class="nav-link"><i class="bi bi-truck"></i>Inventory</a></li>
        <li class="nav-item mb-2"><a href="equipment.php" class="nav-link"><i class="bi bi-truck"></i>Equipment</a></li>
        <li class="nav-item mb-2"><a href="farms.php" class="nav-link"><i class="bi bi-signpost-split-fill"></i>Farms</a></li>

        <?php if ($role === 'admin'): ?>
            <li class="nav-item mb-2"><a href="userManagement.php" class="nav-link"><i class="bi bi-people-fill"></i>User Management</a></li>
        <?php endif; ?>
        <li class="nav-item mb-2"><a href="settings.php" class="nav-link"><i class="bi bi-gear-fill"></i>Settings</a></li>

        <a href="../../../auth/logout.php" class="btn btn-custom logout-btn">
          <i class="bi bi-box-arrow-right"></i> Log out
        </a>
    </ul>
</div>

<script>
    // Get the current page url
    const currentPage = window.location.pathname.split("/").pop();

    // Get all sidebar links
    const sidebarLinks = document.querySelectorAll(".nav-item a");

    // add the active class to the current page link
    sidebarLinks.forEach(link => {
        if (link.getAttribute('href') === currentPage) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    })
</script>