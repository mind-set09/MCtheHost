<?php
require_once 'google-php-client/autoload.php'; // Include Google PHP Client Library
require_once 'db_connection.php'; // Include the database connection

// Google API Client configuration
$client = new Google_Client();
$client->setAuthConfig('client_secret.json');
$client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);
?>
