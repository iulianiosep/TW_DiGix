<?php
namespace DigixBundle\Controller;
use Facebook\GraphUser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GooglePlusController extends Controller{

    function indexAction(){
        session_start();

        $client_id = '805819329649-1ekup47o7h7qgp56l40njtqo7v3rlgq3.apps.googleusercontent.com';
        $client_secret = 'a7IREXaNu5Oujy-GSHpPSXMn';
        $redirect_uri = 'http://localhost/proiect/digix/web/app_dev.php/wall';

        $client = new \Google_Client();
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->addScope("https://www.googleapis.com/auth/urlshortener");

        $service = new \Google_Service_Urlshortener($client);

        if (isset($_REQUEST['logout']))
          unset($_SESSION['access_token']);


        if (isset($_GET['code'])) {
          $client->authenticate($_GET['code']);
          $_SESSION['access_token'] = $client->getAccessToken();
          $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
          header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
        }

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $client->setAccessToken($_SESSION['access_token']);
        } else {
            $authUrl = $client->createAuthUrl();
        }

        if ($client->getAccessToken() && isset($_GET['url'])) {
          $url = new Google_Service_Urlshortener_Url();
          $url->longUrl = $_GET['url'];
          $short = $service->url->insert($url);
          $_SESSION['access_token'] = $client->getAccessToken();
        }

        if (
          $client_id == '805819329649-1ekup47o7h7qgp56l40njtqo7v3rlgq3.apps.googleusercontent.com'
          || $client_secret == 'a7IREXaNu5Oujy-GSHpPSXMn'
          || $redirect_uri == 'http://localhost/proiect/digix/web/app_dev.php/wall') {
        echo 'eroare';//missingClientSecretsWarning();
        }


        if (isset($authUrl))
          return $this->redirect($authUrl);
          //echo "<a class='login' href=$authUrl>Connect Me!</a>";

        return new Response();
    }
}
?>
