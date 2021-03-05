<?php

// $string = file_get_contents('../client_secret_900551381277-vo2uu5g24qlirghhqoafnmud9visbep4.apps.googleusercontent.com.json');

if (file_exists('/home/hah3lga4knls/ht-google-api.json')) {
    require_once '/home/hah3lga4knls/google-api-php-client--PHP7.0/vendor/google/auth/autoload.php';
    $config = file_get_contents('/home/hah3lga4knls/ht-google-api.json');
    $config_array = json_decode($config);

    // init configuration
    $clientID = $config_array->web->client_id;
    $clientSecret = $config_array->web->client_secret;
    $redirectUri = $config_array->web->redirect_uris[1];

    // create Client Request to access Google API
    $client = new Google_Client();
    $client->setClientId($clientID);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectUri);
    $client->addScope("email");
    $client->addScope("profile");

    // authenticate code from Google OAuth Flow
    if (isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token['access_token']);

        // get profile info
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        $email =  $google_account_info->email;
        $name =  $google_account_info->name;

        // now you can use this profile info to create account in your website and make user logged in.
    } else {
        echo "<a href='" . $client->createAuthUrl() . "'>Google Login</a>";
    }
} else {
    header('Location: ../index.php');
}
