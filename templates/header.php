<div class="dashboard-header">
  <h4><?php echo $headerTitle ?></h4>

  <div class="ms-auto d-flex align-items-center gap-3">

    <!-- Search Box -->
    <div class="input-group" style="width: 300px">
      <input type="text" class="form-control" placeholder="Search...">
      <button class="btn btn-custom" type="button" style="justify-content: space-between;">
        <i class="bi bi-search"></i>
      </button>
    </div>

    <!-- New Button -->
    <?php if (!empty($buttonContent)): ?> 
        <?php switch ($buttonContent): 
            case 'Add New Item': ?>
                <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#addPatientModal"> 
                    <?php echo htmlspecialchars($buttonContent); ?>
                </button>
                <?php break; 
            case 'Add New User': ?>
                <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#addNewUserModal"> 
                    <?php echo htmlspecialchars($buttonContent); ?>
                </button>
                <?php break;
            case 'Add New Farm': ?>
              <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#addNewFarmModal"> 
                  <?php echo htmlspecialchars($buttonContent); ?>
              </button>
              <?php break; 
            default: ?>
                <?php break; ?>
        <?php endswitch; ?>
    <?php endif; ?>

    <!-- Notification Bell -->
	<button id="badge-notification" class="btn" style="color: #0A9A05; font-size: 1.5rem">
		<i id="notificationIndicator" class="fi fi-ss-bell"></i>
	</button>
  </div>
</div>