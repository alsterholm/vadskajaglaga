<?php 
						/**

						/* library files */
						require_once( 'fblogin/lib/Facebook/Facebooksession.php');
						require_once( 'fblogin/lib/Facebook/FacebookRequest.php');
						require_once( 'fblogin/lib/Facebook/FacebookResponse.php');
						require_once( 'fblogin/lib/Facebook/FacebookSDKException.php');
						require_once( 'fblogin/lib/Facebook/FacebookRequestException.php');
						require_once( 'fblogin/lib/Facebook/FacebookRedirectLoginHelper.php');
						require_once( 'fblogin/lib/Facebook/FacebookAuthorizationException.php');
						require_once( 'fblogin/lib/Facebook/GraphObject.php');
						require_once( 'fblogin/lib/Facebook/GraphUser.php');
						require_once( 'fblogin/lib/Facebook/GraphSessionInfo.php');
						require_once( 'fblogin/lib/Facebook/Entities/AccessToken.php');
						require_once( 'fblogin/lib/Facebook/HttpClients/FacebookCurl.php');
						require_once( 'fblogin/lib/Facebook/HttpClients/FacebookHttpable.php');
						require_once( 'fblogin/lib/Facebook/HttpClients/FacebookCurlHttpClient.php');

					/*use namespace */

					use Facebook\Facebooksession;
					use Facebook\FacebookRedirectLoginHelper;
					use Facebook\FacebookRequest;
					use Facebook\FacebookResponse;
					use Facebook\FacebookSDKException;
					use Facebook\FacebookRequestException;
					use Facebook\FacebookAuthorizationException;
					use Facebook\GraphUser;
					use Facebook\GraphObject;
					use Facebook\GraphSessionInfo;
					use Facebook\FacebookHttpable;
					use Facebook\FacebookCurlHttpClient;
					use Facebook\FacebookCurl;

					/*process*/

						//1. Start session
						//session_start();
						//2. Använd app id, secret, och redirect url
						$app_id = '459737927508270';
						$app_secret = 'fcba762f4c944512f552a67324088f62';
						$redirect_url = 'http://10.1.13.22/vadskajaglaga/';

						//3. initatiera app och hämta fb session
						Facebooksession::setDefaultApplication($app_id,$app_secret);
						$helper = new FacebookRedirectLoginHelper($redirect_url);

						// för säkerhets skull
						try{
							$session = $helper->getSessionFromRedirect();
						}catch(FacebookRequestException $ex){
							echo 'Facebook gjorde nåt fel....';
						}catch (Exception $e){
							echo 'nåt har gått fel';
						}
						$loginUrl = $helper->getLoginUrl();

						//4. om fb sess finns echo namn
						if(isset($session)){
							//skapa request objekt, kör och fånga svaret
							$request = new FacebookRequest($session,'GET', '/me');
							$response = $request->execute();
							$graphObject = $response->getGraphObject(GrapthUser::classname());
							//använd graph objektet för att hämta användarinfo
							$name = $graphObject->getName();
							$id = $graphObject->getId();
							$profileimg = 'https://graph.facebook.com/' . $id . '/picture?width=100';

						}
						else{
							echo '<a href="' . $loginUrl . '" class="btn btn-block btn-social btn-lg btn-facebook"><i class="fa fa-facebook"></i> Logga in med Facebook</a>';
						}

?> 