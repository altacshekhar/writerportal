<?php
require_once __DIR__ . '/vendor/autoload.php'; // change path as needed

//$default_access_token = 'EAAEWQ1K8ZBLcBAJBSBW9Xa47Tr4DjLyBDxMLOtYYL5jZAT4ISPTZCbDXEh9FMKxdHRNy20ADstfojjYcSpkwumMwApWznKEAaKY9uXzhDF20sbQAoJ3xG81OwqDlZAoHPkhM3bznjZCAsQs9bbJxUYUucRYtywYO9LqudRWjN7Rsbjnk8Uh2jGkdAsQg0ZA6lstex0idmJzf3IXvvAgALNZBhL4wTdN1GuaXgtZBNTYDjQZDZD';
//$default_access_token = 'EAAEWQ1K8ZBLcBAB7lShUGJV7X2TxzwsJG03bSM1F9btI2ZCXBDm89B3XvVSwkFJgn72X32RMVJanZCetoqzOeudYoDoY9ZC1WBKCWIwccT7ywhlF0bgG45QZAR9h8jk2v4fDgL03SGUSiTVptwkLXJ5pZCbYoefUFcglZBdBUvIXUzcsZAjxgjmZAZCnwQZAhZAUwZBleDpZB3N9xOQgZDZD';

$default_access_token = 'EAAEWQ1K8ZBLcBAO5e4jANyoo2UNp8bhzlZBy4SZCWGnOhZBhjk2kNJXJByF5PFtPO6bBvveII0GfC7awVKcvOZAbogo5ryNnitmroLjK37GUrfZC8RlqfaGAZCUhTXJli5BXuNohW337HHVSJk2afioJBErbTLQEOpczBKqSsQzMppsBDQZCS2AQ';

$fb = new \Facebook\Facebook([
  'app_id' => '305953383446711',
  'app_secret' => '429be1c6b6b75e091eb59bdfd1d53058',
  //'default_graph_version' => 'v2.10',
 //'default_access_token' => $default_access_token
]);

$helper = $fb->getPageTabHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  echo 'No OAuth data could be obtained from the signed request. User has not authorized your app yet.';
  exit;
}

// Logged in
echo '<h3>Page ID</h3>';
var_dump($helper->getPageId());

echo '<h3>User is admin of page</h3>';
var_dump($helper->isAdmin());

echo '<h3>Signed Request</h3>';
var_dump($helper->getSignedRequest());

echo '<h3>Access Token</h3>';
var_dump($accessToken->getValue());


$default_access_token = $accessToken->getValue();
try {
  // Returns a `FacebookFacebookResponse` object
  $response = $fb->post(
    '/762998144082598/feed?published=true&message=An unpublished post',  $default_access_token
  );
} catch(\Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo '<br>'.'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo '<br>'.'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$graphNode = $response->getGraphEdge();
echo '<pre>';
print_r($graphNode);



die;


try {
  // Get the \Facebook\GraphNodes\GraphUser object for the current user.
  // If you provided a 'default_access_token', the '{access-token}' is optional.
  $response = $fb->get('/me');
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
echo 'Logged in as ' . $me->getName();


try {
  // Returns a `FacebookFacebookResponse` object
  $response = $fb->post(
    '/762998144082598/feed?published=true&message=An unpublished post'
  );
} catch(\Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo '<br>'.'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo '<br>'.'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$graphNode = $response->getGraphEdge();
echo '<pre>';
print_r($graphNode);