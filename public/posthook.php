<?php
// Verify the webhook secret (replace 'your-secret-key' with your actual secret)
$secret = 'McMorrow!984';
$payload = file_get_contents('php://input');
$signature = hash_hmac('sha256', $payload, $secret);

if ($signature === $_SERVER['HTTP_X_HUB_SIGNATURE_256']) {
    // Pull the latest changes from the Git repository
    shell_exec('cd /home/amcmorrow/sub.amcmorrow.com && git pull origin main');

    // Perform any additional update tasks (e.g., update database, clear caches, etc.)
    // ...

    // Log the update process
    error_log('Website updated successfully');

    http_response_code(200);
} else {
    error_log('Invalid webhook signature');
    http_response_code(401);
}
?>
