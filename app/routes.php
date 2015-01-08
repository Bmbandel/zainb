<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',function(){

    if(Session::has('user')){ return Reidrect::to('/unfollow');}
	return View::make('index');
});

Route::get('/unfollow',function(){

    if(!Session::has('user')){ return Reidrect::to('/');}
    
    Session::set('friends_count',0);
    Session::set('cached_friend_ids',[]);
    Session::set('cached_cursor','-1');

    $filtered_friends=json_encode(get_filtered_users("-1"));
	return View::make('unfollow')->with(['friends'=>$filtered_friends]);

});


Route::get('get_friends',function(){

    echo json_encode(get_filtered_users($cursor));
    exit;
});

Route::get('do_unfollow',function(){

    $uid=Input::get('id');

    $c=can_unfollow();
    $result=['wait'=>''];

    if(empty($c)){
        $response=Twitter::postUnfollow(['user_id'=>$uid]);   
        $result=$response['id_str']==$id?true:false; 
    }   
    else{
        $result['wait']=$c;
        $result['success']=false;
    }
    
    return json_encode($result);
});


Route::get('/twitter/login', function()
{
    // your SIGN IN WITH TWITTER  button should point to this route
    $sign_in_twitter = TRUE;
    $force_login = FALSE;
    $callback_url = 'http://' . $_SERVER['HTTP_HOST'] . '/public/twitter/callback';
    // Make sure we make this request w/o tokens, overwrite the default values in case of login.
    Twitter::set_new_config(array('token' => '', 'secret' => ''));
    $token = Twitter::getRequestToken($callback_url);
    if( isset( $token['oauth_token_secret'] ) ) {
        $url = Twitter::getAuthorizeURL($token, $sign_in_twitter, $force_login);

        Session::put('oauth_state', 'start');
        Session::put('oauth_request_token', $token['oauth_token']);
        Session::put('oauth_request_token_secret', $token['oauth_token_secret']);

        return Redirect::to($url);
    }
    return Redirect::to('twitter/error');
});

Route::get('/twitter/callback', function() {
    // You should set this route on your Twitter Application settings as the callback
    // https://apps.twitter.com/app/YOUR-APP-ID/settings
    if(Session::has('oauth_request_token')) {
        $request_token = array(
            'token' => Session::get('oauth_request_token'),
            'secret' => Session::get('oauth_request_token_secret'),
        );

        Twitter::set_new_config($request_token);

        $oauth_verifier = FALSE;
        if(Input::has('oauth_verifier')) {
            $oauth_verifier = Input::get('oauth_verifier');
        }

        // getAccessToken() will reset the token for you
        $token = Twitter::getAccessToken( $oauth_verifier );
        if( !isset( $token['oauth_token_secret'] ) ) {
            return Redirect::to('/')->with('flash_error', 'We could not log you in on Twitter.');
        }

        $credentials = Twitter::query('account/verify_credentials');
        if( is_object( $credentials ) && !isset( $credentials->error ) ) {
            // $credentials contains the Twitter user object with all the info about the user.
            // Add here your own user logic, store profiles, create new users on your tables...you name it!
            // Typically you'll want to store at least, user id, name and access tokens
            // if you want to be able to call the API on behalf of your users.

            // This is also the moment to log in your users if you're using Laravel's Auth class
            // Auth::login($user) should do the trick.
            $user=[
                    'token'=> $token,
                    'user_screen_name'=>$credentials->screen_name,
                    'user_id'=>$credentials->id,
                    'user_profile_img'=>$credentials->profile_image_url,
                    'user_friends_count'=>$credentials->friends_count,
                    'user_description'=>$credentials->description,
            ];

            Session::put('user', $user);

            return Redirect::to('/unfollow');
        }
        return Redirect::to('/')->with('flash_error', 'Crab! Something went wrong while signing you up!');
    }
});

Route::get('twitter/error', function(){
     
});