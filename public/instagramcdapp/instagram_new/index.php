<?php

session_start();
if (!empty($_SESSION['userdetails'])) 
{
        header('Location: home.php');
}

require '../src/Instagram.php';
use MetzWeb\Instagram\Instagram;

// initialize class
$instagram = new Instagram(array(
'apiKey'      => 'a108c7b6b05a44c39655cde2861564f6',
'apiSecret'   => '209ab0bfc2054994ab65f4ab40af9ce8',
'apiCallback' => 'https://case3d.com.br/instagramcdapp/instagram/success.php' // must point to success.php
));

// create login URL
$loginUrl = $instagram->getLoginUrl();

?>
            <a class="button" target="_blank" href="<?php echo $loginUrl ?>">Entrar com Instagram</a>
