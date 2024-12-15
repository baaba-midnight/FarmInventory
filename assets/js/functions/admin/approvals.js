function approveItem(itemID) {
    fetch(`../../../functions/updateApprovalStatus.php?id=${itemID}&action=approve`)
    .then(response => response.json())
    .then(data => {
        try {
            if (data.success) {
                alert("Item Approved Successfully");
            } else {
                alert("Failed to approve item");
            }
        } catch (error) {
            console.log("Error:", error);
            alert('An error occured while approving the item')
        }
    });
}

function rejectItem(itemID) {
    fetch(`../../../functions/updateApprovalStatus.php?id=${itemID}&action=reject`)
    .then(response => response.json())
    .then(data => {
        try {
            if (data.success) {
                alert("Item Approved Successfully");
            } else {
                alert("Failed to approve item");
            }
        } catch (error) {
            console.log("Error:", error);
            alert('An error occured while approving the item')
        }
    });
}