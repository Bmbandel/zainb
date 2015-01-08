<?php

	function retrieve_friends($cursor=null){

		$user=Session::get('user');

		$params=[
			'screen_name'=>$user['user_screen_name'],
			'stringify_ids'=>'1',
			'count'=>'5000',
			'cursor'=>isset($cursor)?$cursor:'-1',
			'format'=>'array'
		];

		return Twitter::getFriendsIds($params);
	}


	function get_filtered_users(){

		$filtered=[];

		check_cache();

		while(count($filtered)<101){

			$cached=Session::get('cached_friend_ids');

			$max=count($cached)>100;100:count($cached);
			$ids_arr=array_slice($cached,$max);

			Session::set('cached_friend_ids',$cached);

			$users=Twitter::getUsersLookup(['user_id'=>implode(",", $ids_arr),'format'=>'array']);
			
			foreach ($users as $user) {
			 	if(!isset($user['url'])){
			 		$url=$user['url'];
			 		$b=valid_linkedIn_url($url);
			 		
			 		if($b){

			 			$new_user=[

			 				'screen_name'=>$user['screen_name'],
			 				'id'=>$user['id_str'],
			 				'profile_img'=>$user['profile_img'],
			 				'description'=>$user['description'],
			 				'url'=>$user['url']
			 			];

			 			array_push($filtered, $user);
			 		}
			 	}
			 } 
		
			check_cache();
		}
		 
		 return $filtered;
	}

	function check_cache(){

		$cached=Session::get('cached_friend_ids');

		if(count($cached)<1){

			can_request();

			$cursor=Session::get('cached_cursor');
			$response=retrieve_friends($cursor);
			Session::set('cached_cursor',$response['next_cursor_str']);
			Session::set('cached_friend_ids',$response['ids']);
		}
	}

	function can_request(){

		$limits=Twitter::getAppRateLimit(['resources'=>'friends','format'=>'array']);
		$friends_ids_limit=$limits['friends']['friends/ids'];
		if($friends_ids_limit['remaining']>0){
			$diff=intval($friends_ids_limit['remaining'])-time();

			Session::flash('message','Please wait '.date('',$diff).' mins. You have reached the limit.');
			Redirect::to('/unfollow');
		}
	}


	function can_unfollow(){

		$limits=Twitter::getAppRateLimit(['resources'=>'friendships','format'=>'array']);
		$friends_ids_limit=$limits['friends']['friendships/destroy'];
		if($friends_ids_limit['remaining']>0){
			$diff=date('MM/DD/YYYY hh:mm:ss',intval($friends_ids_limit['remaining']));
			return $diff;
		}

		return '';
	}

	function valid_linkedIn_url($url){

		return (strpos($url, ".linkedin")>-1)?true:false;
	}

?>