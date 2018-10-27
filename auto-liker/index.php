<?php

require_once __DIR__ . '/vendor/autoload.php'; // change path as needed

$fb = new \Facebook\Facebook([
  'app_id' => '793817467494143',
  'app_secret' => 'fd6c049eb36206b4151637bb6330eb2b',
  'default_graph_version' => 'v2.9',
  //'default_access_token' => '{access-token}', // optional
]);

$access_token = "EAALRZBQgqnv8BADwKR0T81ufgJgxubjZCZBeRC3tkBDsmmcYKlBi0bqFUWd3rNPsw76LLCn4IMI8oUlhcnOaL32Dk1IRITw2gQ0BTUfb9AJIhwjzbk4Bshnl0UI8cRo4ZAE8ZBZCMRixWRtHwhanGZCIGEmCbcTZAz7z7LK3qZBARLVZCSLQjKHBLO5Mi4jGkC1KlbxiT07hXszQZDZD";

// Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
//   $helper = $fb->getRedirectLoginHelper();
//   $helper = $fb->getJavaScriptHelper();
//   $helper = $fb->getCanvasHelper();
//   $helper = $fb->getPageTabHelper();

try {
  // Get the \Facebook\GraphNodes\GraphUser object for the current user.
  // If you provided a 'default_access_token', the '{access-token}' is optional.
  $response = $fb->get('/me', $access_token);
} catch(\Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$me = $response->getGraphUser();
echo 'Logged in as ' . $me->getName() . ' with an id of ' . $me->getID() . "<br><br>";



try {
	// lists the permissions - WORKING
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get(
    '/me/permissions',
    $access_token
  );
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$graphNode = $response->getGraphEdge();

echo "App permissions from the user: " . $graphNode . "<br><br>";


try {
	// reads the user's feed - WORKING
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get(
    '/2033923540164069/feed',
    $access_token
  );
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$graphNode = $response->getGraphEdge();
echo "Feed: " . $graphNode . "<br><br>";

/*
// read news feed - NOT WORKING
try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get(
    '/2033923540164069/home',
    $access_token
  );
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$graphNode = $response->getGraphEdge();

echo "Posts: " . $graphNode . "<br><br>";
*/
/*
// post a message - WORKING
try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->post(
    '/me/feed',
    array (
      'message' => 'This is a test message by a bot =)',
    ),
    $access_token
  );
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$graphNode = $response->getGraphNode();
echo "Test message: " . $graphNode . "<br><br>";
*/

// post a comment - NOT WORKING
try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->post(
    '/2033923540164069_2033958226827267/comments',
    array (
      'message' => 'This is a test comment created by a bot',
    ),
    $access_token
  );
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$graphNode = $response->getGraphNode();
echo "Test comment: " . $graphNode . "<br><br>";

// post a like - NOT WORKING
try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->post(
    '/2033923540164069_2033958226827267/likes',
    array (),
    $access_token		// access token
  );
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$graphNode = $response->getGraphNode();
/* handle the result */
echo "Test like: " . $graphNode . "<br><br>";

?>