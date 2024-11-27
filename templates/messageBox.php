<?php
// Function to set flash message
function set_flash_message($message, $type) {
    $_SESSION['flash_message'] = $message;
    $_SESSION['flash_type'] = $type;
}

function display_message_box() {
    if (isset($_SESSION['flash_message']) && isset($_SESSION['flash_type'])) {
        $message = $_SESSION['flash_message'];
        $type = $_SESSION['flash_type'];
        $icon_class = ($type === 'error') ? 'fi-ss-exclamation' : 'fi-ss-check-circle';
        ?>
        <div id="flash-message" class="prompt-box <?php echo $type; ?>">
            <i class="fi <?php echo $icon_class; ?>"></i>
            <p><?php echo htmlspecialchars($message); ?></p>
        </div>
        <?php

        unset($_SESSION['flash_message']);
        unset($_SESSION['flash_type']);
    }
}
?>