<?php
function loginWithFacebook()
{
    $email = "";
    echo '<a href="#" class="btn btn-primary btn-block"><i class="fa fa-facebook"></i> '.$GLOBALS['lang']['Login'].' <b>Facebook</b></a>';
    return $email;
}
function loginWithTwitter()
{
    $email = "";
    echo '<a href="#" class="btn btn-info btn-block"><i class="fa fa-twitter"></i>'.$GLOBALS['lang']['Login'].' <b>Twitter</b></a>';
    return $email;
}
function  loginWithGoogle()
{
    $email = "";
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
            echo '<a href="' . $client->createAuthUrl() . '" class="btn btn-danger btn-block"><i class="fa fa-google"></i> '.$GLOBALS['lang']['Login'].' <b>Google</b></a>';
        }
    } else {
        echo '<a href="#" class="btn btn-danger btn-block"><i class="fa fa-google"></i> '.$GLOBALS['lang']['Login'].' <b>Google</b></a>';
    }
    return $email;
}

function loginWithSocialMedia()
{
    $email = "";
    $emailFacebook = '';//loginWithFacebook();
    $emailTwitter = '';//loginWithTwitter();
    $emailGoogle = loginWithGoogle();
    if ($emailFacebook != "") {
        $email = $emailTwitter;
    } elseif ($emailTwitter != "") {
        $email = $emailTwitter;
    } elseif ($emailGoogle != "") {
        $email = $emailGoogle;
    }
    return $email;
}
