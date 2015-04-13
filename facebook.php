<?php

	require_once 'Facebook/FacebookSession.php';
	require_once 'Facebook/FacebookRequest.php';
	require_once 'Facebook/FacebookResponse.php';
	require_once 'Facebook/FacebookSDKException.php';
	require_once 'Facebook/FacebookRequestException.php';
	require_once 'Facebook/FacebookRedirectLoginHelper.php';
	require_once 'Facebook/FacebookAuthorizationException.php';
	require_once 'Facebook/GraphObject.php';
	require_once 'Facebook/GraphUser.php';
	require_once 'Facebook/GraphSessionInfo.php';
	require_once 'Facebook/Entities/AccessToken.php';
	require_once 'Facebook/HttpClients/FacebookCurl.php';
	require_once 'Facebook/HttpClients/FacebookHttpable.php';
	require_once 'Facebook/HttpClients/FacebookCurlHttpClient.php';

	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\FacebookResponse;
	use Facebook\FacebookSDKException;
	use Facebook\FacebookRequestException;
	use Facebook\FacebookAuthorizationException;
	use Facebook\GraphObject;
	use Facebook\GraphUser;
	use Facebook\GraphSessionInfo;
	use Facebook\FacebookCurl;
	use Facebook\FacebookHttpable;
	use Facebook\FacebookCurlHttpClient;

	session_start();

	$app_id = '459737927508270';
	$app_secret = 'fcba762f4c944512f552a67324088f62';

	FacebookSession::setDefaultApplication($app_id, $app_secret);

	$helper = new FacebookRedirectLoginHelper('http://www.vadskajaglaga.se/facebook.php');

	try {
	  $session = $helper->getSessionFromRedirect();
	} catch(FacebookRequestException $ex) {
	  echo 'Facebook-error';
	} catch(\Exception $ex) {
	 echo ' // When validation fails or other local issues';
	}

	if ($session) {
	 	$request = new FacebookRequest($session, 'GET', '/me');
		$response = $request->execute();
		$graphObject = $response->getGraphObject(GraphUser::className());

		echo $graphObject->getName() . '<br>';
		echo $graphObject->getId();
	} else {
		echo '<a href="' . $helper->getLoginUrl() . '">Logga in</a>';
	}
?>