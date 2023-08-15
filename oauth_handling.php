<?php
require_once 'initialize_google_api.php'; // Include the Google API initialization

// Redirect to Google's OAuth consent screen
if (!isset($_GET['code'])) {
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    exit();
}

// Handle the OAuth process after user grants permission
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!$token) {
        echo 'Failed to get access token.';
        exit();
    }

    $client->setAccessToken($token);
    $oauth_service = new Google_Service_Oauth2($client);
    $userinfo = $oauth_service->userinfo->get();

    // Use $userinfo to authenticate or register the user

    // Redirect to the dashboard after successful login
    header('Location: dashboard.php');
    exit();
}
?>
