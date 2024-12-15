function fetchManagerStats($userID) {
    fetch(`../../../functions/farmManager/fetchManagerStats.php?id=${$userID}&action=dashbaordStats`)
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            stats = data.data;
            document.getElementById('totalInventory').textContent = stats.total_inventory_items;
            document.getElementById('lowStock').textContent = stats.low_stock_items;
            document.getElementById('totalEquipment').textContent = stats.total_equipment;
            document.getElementById('functionalEquipment').textContent = stats.functional_equipment;
            document.getElementById('nonFunctionalEquipment').textContent = stats.non_functional_equipment;
            document.getElementById('pendingApprovals').textContent = stats.pending_approvals;
        } else {
            console.error("No items found");
        }
    })
}
