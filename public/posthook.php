<?php
// Verify the webhook secret (replace 'your-secret-key' with your actual secret)
$secret = '${HOOK_PASS}';
$payload = file_get_contents('php://input');
$signature = hash_hmac('sha256', $payload, $secret);

// Log the incoming webhook payload and signature
error_log('Received webhook payload: ' . $payload);
error_log('Received signature: ' . $_SERVER['HTTP_X_HUB_SIGNATURE_256']);
error_log('Generated signature: sha256=' . $signature);

if (hash_equals('sha256=' . $signature, $_SERVER['HTTP_X_HUB_SIGNATURE_256'])) {
    // Pull the latest changes from the Git repository
    $output = shell_exec('cd /home/amcmorrow/sub.amcmorrow.com && git pull origin main 2>&1');
    error_log('Git pull output: ' . $output);

    // Perform any additional update tasks (e.g., update database, clear caches, etc.)
    // ...

    error_log('Website updated successfully');
    http_response_code(200);
} else {
    error_log('Invalid webhook signature');
    http_response_code(401);
}
?>
