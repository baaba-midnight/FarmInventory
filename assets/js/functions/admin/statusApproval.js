// Approve function
function approve(id, type) {
    handleAction(id, 'approve', type);
}

// Reject function
function reject(id, type) {
    handleAction(id, 'reject', type);
}


// Generic function to handle approve/reject actions
function handleAction(id, action, type) {
    console.log(JSON.stringify({
        item_id: id,
        action: action,
        type: type
    }))
    if (confirm(`Are you sure you want to ${action} this ${type} item?`)) {
        fetch('../../../functions/admin/approve_reject.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                item_id: id,
                action: action,
                type: type
            }),
        })
        .then(response => response.json())
        .then(data => {
            // Handle server response
            if (data.status === 'success') {
                alert(data.message); // Display success message
                location.reload();   // Reload page to reflect changes
            } else {
                alert(`Error: ${data.message}`); // Display error message
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    }
}
