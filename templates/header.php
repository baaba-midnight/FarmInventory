<div class="dashboard-header">
	<h4><?php echo $headerTitle ?></h4>

	<div class="ms-auto d-flex align-items-center gap-3">
		<?php switch ($headerTitle):
			case "Dashboard": ?>
				<button href="#" class="btn btn-custom" style="color: #0A9A05">Generate Report</button>
				<?php break;
			case "Inventory Management": ?>
				<div class="input-group" style="width: 300px">
					<?php if ($role === "farm_manager"): ?>
						<input type="text" id="search-input" onkeyup="searchInventory(<?php echo $userId ?>)" class="form-control" placeholder="Search Inventory...">
					<?php else: ?>
						<input type="text" id="search-input" onkeyup="searchInventory()" class="form-control" placeholder="Search Inventory...">
					<?php endif; ?>
				</div>
				<?php break;
			case "Equipment Management": ?>
				<div class="input-group" style="width: 300px">
					<?php if ($role === "farm_manager"): ?>
						<input type="text" id="search-input" onkeyup="searchEquipment(<?php echo $userId ?>)" class="form-control" placeholder="Search Equipment...">
					<?php else: ?>
						<input type="text" id="search-input" onkeyup="searchEquipment()" class="form-control" placeholder="Search Equipment...">
					<?php endif; ?>
				</div>
				<?php break;
			case "Farm Management": ?>
				<div class="input-group" style="width: 300px">
					<?php if ($role === "farm_manager"): ?>
						<input type="text" id="search-input" onkeyup="searchFarms(<?php echo $userId ?>)" class="form-control" placeholder="Search Farms...">
					<?php else: ?>
						<input type="text" id="search-input" onkeyup="searchFarms()" class="form-control" placeholder="Search Farms...">
					<?php endif; ?>
				</div>
				<?php break;
			case "User Management": ?>
				<div class="input-group" style="width: 300px">
					<input type="text" id="search-input" onkeyup="searchUsers()" class="form-control" placeholder="Search User...">
				</div>
				<?php break;
			default: ?>
				<?php break; ?>
		<?php endswitch; ?>

		<!-- New Button -->
		<?php if (!empty($buttonContent)): ?>
			<?php switch ($buttonContent):
				case 'Add New Item': ?>
					<button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#addItemModal">
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