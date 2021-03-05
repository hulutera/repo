<?php

// $string = file_get_contents('../client_secret_900551381277-vo2uu5g24qlirghhqoafnmud9visbep4.apps.googleusercontent.com.json');
function  loginWithGoogle(){
    if (file_exists('/home/hah3lga4knls/ht-google-api.json')) {
        require_once '/home/hah3lga4knls/google-api-php-client--PHP7.0/vendor/autoload.php';
        $config = file_get_contents('/home/hah3lga4knls/ht-google-api.json');
        $config_array = json_decode($config);

        // init configuration
        $clientID = $config_array->web->client_id;
        $clientSecret = $config_array->web->client_secret;
        $redirectUri = $config_array->web->redirect_uris[2];

        // create Client Request to access Google API
        $client = new Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope("email");
        $client->addScope("profile");
        $client->addScope("phone");

        // authenticate code from Google OAuth Flow
        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token['access_token']);

            // get profile info
            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();
            $email =  $google_account_info->email;
            $name =  $google_account_info->name;
            $name =  $google_account_info->phone;
        } else {
            echo '<div class="text-center social-btn">
			<a href="' . $client->createAuthUrl() . '" class="btn btn-danger btn-block" style="
            width: 33%;
            margin-left: 33%;
            margin-top: 20px;
            margin-bottom: -30px;
        "><i class="fa fa-google" ></i> Sign in with <b>Google</b></a>
        </div>';
        }
    }
    return $email;
}