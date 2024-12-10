// Example function to show a new notification
function showNotification() {
    const notificationBadge = document.getElementById('badge-notification');
    const childElement = document.getElementById('notificationIndicator');
    
    // Check if the child element exists before attempting to remove it
    if (childElement) {
        notificationBadge.removeChild(childElement);
    }

    const newTag = document.createElement('i');
    newTag.id = "notificationIndicator";
    newTag.classList.add('fi', 'fi-ss-bell-notification-social-media');
    
    // You can add a notification icon or content inside the newTag
    newTag.innerHTML = '';  // You may want to add something here, like an icon or text
    
    notificationBadge.appendChild(newTag);
}

// Example function to hide the notification
function hideNotification() {
    const notificationBadge = document.getElementById('badge-notification');
    const childElement = document.getElementById('notificationIndicator');
    
    // Check if the child element exists before attempting to remove it
    if (childElement) {
        notificationBadge.removeChild(childElement);
    }

    const newTag = document.createElement('i');
    newTag.id = "notificationIndicator";
    newTag.classList.add('fi', 'fi-ss-bell');
    
    // You can add a different icon or content inside the newTag
    newTag.innerHTML = '';  // You may want to add something here, like an icon or text
    
    notificationBadge.appendChild(newTag);
}

// fetch notification data from notification.php
function sendNotification(user_id, message, type) {
    // send the data in the POST request
    const data = new FormData();
    data.append('user_id', user_id);
    data.append('message', message);
    data.append('type', type);

    // make the fetch request to the send the notification
    fetch("../../../includes/functions.php", {
        method: 'POST',
        body: data
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Notification sent:', data.message);
        } else {
            console.error('Error sending notification:', data.message)
        }
    })
    .catch(error => console.error('Error:', error));
}

// sendNotification(1, 'You have a new message!', 'info')