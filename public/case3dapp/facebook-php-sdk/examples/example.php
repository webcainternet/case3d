<?php
/**
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require '../src/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '576622305778855',
  'secret' => 'd5fa3ee39357eb566807b7b742b7323e',
));

// Get User ID
$user = $facebook->getUser();

/*
$access_token = $facebook->getAccessToken();
echo "::".$access_token;
$new_access_token = 'CAAHljWUjuTUBALAmmmIf38MUK5ZA5JRyKl8CgKXwOdLEaJlaOmXX6sZBVUTBUqErVZC7pVgARCy5de4JTZARsvUjaOjxtbdfpojFnMgiyUWH0q9j9Deib4Fy9pmShbVFRWGjPYi1vukGZA7iWVw9aNLofDxVJDwXbAkd8oOWJF7I2zDbioPF0aDMis4dieFK5I7t6jZCKZAHwZDZD';
$facebook->setAccessToken($new_access_token);
*/

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}


// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $permlogin = array('scope' => 'user_about_me, user_hometown, user_photos, friends_photos, read_stream, friends_likes, photo_upload, publish_stream, status_update, video_upload');
  $loginUrl = $facebook->getLoginUrl($permlogin);
}


// This call will always work since we are fetching public data.
$naitik = $facebook->api('/me');

$albums = $facebook->api('/me/albums');

?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>php-sdk</title>
    <style>
      body {
        font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
      }
      h1 a {
        text-decoration: none;
        color: #3b5998;
      }
      h1 a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <h1>php-sdk</h1>

    <?php if ($user): ?>
      <a href="<?php echo $logoutUrl; ?>">Logout</a>
    <?php else: ?>
      <div>
        Login using OAuth 2.0 handled by the PHP SDK:
        <a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
      </div>
    <?php endif ?>

    <h3>PHP Session</h3>
    <pre><?php print_r($_SESSION); ?></pre>

    <?php if ($user): ?>
      <h3>You</h3>
      <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">

      <h3>Your User Object (/me)</h3>
      <pre><?php print_r($user_profile); ?></pre>
    <?php else: ?>
      <strong><em>You are not Connected.</em></strong>
    <?php endif ?>


	<?php
echo '<p class="hd">My Albums</p>';
    foreach($albums['data'] as $album)
    {
        if($album_id == $album['id']){
            $name = '<b><u>'.$album['name'].'</u></b>';
        }else{
            $name = $album['name'];
        }
        echo '<p>'."<a href=".$pageURL.$and."action=viewalbum&album_id=".$album['id'].">".$name.'</a></p>';
    }
?>

  </body>
</html>
