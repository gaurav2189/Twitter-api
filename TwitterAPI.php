<?php
require_once('backfunc.php');

$settings = array(
'oauth_access_token' => "",
'oauth_access_token_secret' => "",
'consumer_key' => "",
'consumer_secret' => ""
);

session_start();


switch ($_SESSION['action1']) {
    case "Action1":
	
		$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$requestMethod = "GET";
if (isset($_GET['user'])) {$user = $_GET['user'];} else {$user = "anvit_saxena";}
if (isset($_GET['count'])) {$count = $_GET['count'];} else {$count = 1;}
$getfield = "?screen_name=$user&count=$count";
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);
//if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
foreach($string as $items)
    {
        echo "Time and Date of Tweet: ".$items['created_at']."<br />";
        echo "Tweet: ". $items['text']."<br />";
        echo "Tweeted by: ". $items['user']['name']."<br />";
        echo "Screen name: ". $items['user']['screen_name']."<br />";
        echo "Followers: ". $items['user']['followers_count']."<br />";
        echo "Friends: ". $items['user']['friends_count']."<br />";
        echo "Listed: ". $items['user']['listed_count']."<br /><hr />";
    }

	
	   break;
    case "Action2":
	
	
$url = 'https://api.twitter.com/1.1/friendships/create.json';
$requestMethod = 'POST';

$postfields = array(
    'screen_name' => $_SESSION['input1'],
    'follow' => 'true',
);

$twitter = new TwitterAPIExchange($settings);
 $twitter->buildOauth($url, $requestMethod)
             ->setPostfields($postfields)
             ->performRequest();
       	  
	 
	 break;
	  
    case "Action3":
      echo  $_SESSION['input1'];
	  echo $_SESSION['action1'];

	   $url = 'https://api.twitter.com/1.1/users/lookup.json';
$getfield = '?screen_name='.$_SESSION['input1'];
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);

foreach($string as $items)
    {
 echo "User @". $items['screen_name']. " has ". $items['followers_count']." Followers and ". $items['friends_count']. " Friends. This is not bad.  <br />";
     }


	 
	   break;
    case "Action4":
     echo $_SESSION['input1'];
$url = 'https://api.twitter.com/1.1/direct_messages/new.json';
$requestMethod = 'POST';

$postfields = array(
    'screen_name' => $_SESSION['input1'],
    'text' => $_SESSION['input1'],
);

$twitter = new TwitterAPIExchange($settings);
 $twitter->buildOauth($url, $requestMethod)
             ->setPostfields($postfields)
             ->performRequest();

	 
	   break;
    case "Action5":
	
	
	
	$url = "https://api.twitter.com/1.1/friends/list.json";
$requestMethod = "GET";
if (isset($_GET['user_id'])) {$user_id= $_GET['user_id'];} else {$user_id = "108961015";}
$getfield = "?user_id=" . $user_id;
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
          ->buildOauth($url, $requestMethod)
          ->performRequest(),$assoc = TRUE);	
		  echo "<b><u>" . "Get Friend List of user ID " . $user_id . "</u></b>";
	echo "<br>";
$i = 0;
	foreach($string["users"] as $items)
        {
	$i++;
	    echo "Friend: " . $i . "<br>";
	    echo "Profile Picture : " . "<img src=" . $items['profile_image_url_https'] . "/>" . "<br />";
	    echo "Name : " . $items["name"] . "<br />";
        echo "Screen name: ". $items["screen_name"]."<br />";
	    echo "<br><br>";
	}
	echo "<hr>";
	

       
	   break;
    case "Action6":
       
	   	
	$url = "https://api.twitter.com/1.1/users/lookup.json";
$requestMethod = "GET";
if (isset($_GET['user_id'])) {$user_id= $_GET['user_id'];} else {$user_id = "780997716012855296";}
$getfield = "?user_id=" . $user_id;	
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);
foreach($string as $items)
    {
       echo "Profile Picture: " . "<img src=" . $items['profile_image_url_https'] . "/>" . "<br />";
	    echo "Screen name: ". $items['screen_name']."<br />";
	    echo "Name: ". $items['name']."<br />";
            echo "Followers: ". $items['followers_count']."<br />";
            echo "Friends: ". $items['friends_count']."<br />";
            echo "Listed: ". $items['listed_count']."<br />";
	    echo "<br><hr>";
    }
	

	   
	   break;
    case "Action7":
	
		$url = "https://api.twitter.com/1.1/statuses/retweeters/ids.json";
$requestMethod = "GET";
if (isset($_GET['id'])) {$id = $_GET['id'];} else {$id = "781621333440471040";}
if (isset($_GET['count'])) {$count = $_GET['count'];} else {$count = 5;}
$getfield = "?id=" . $id . "&count=" . $count;
   
    $twitter = new TwitterAPIExchange($settings);
    $string = json_decode($twitter->setGetfield($getfield)
                 ->buildOauth($url, $requestMethod)
                 ->performRequest(),$assoc = TRUE);   
        //if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
	echo "<b><u>ReTweet IDS for the Tweet ID: " . $id . "</u></b>";
	echo "<br><br>";
	$i = 0;
	foreach($string["ids"] as $items)
        {
	
	$i++;
	    echo "ReTweet ID : " . $i. " = " . $items . "<br>";
	}
	echo "<hr>";

       
	   break;
    case "Action8":
	
	
	        $url = "https://api.twitter.com/1.1/followers/ids.json";
        $requestMethod = "GET";
        $getfield = "?user_id=" . $user_id;

        $twitter = new TwitterAPIExchange($settings);
        $string = json_decode($twitter->setGetfield($getfield)
                 ->buildOauth($url, $requestMethod)
                 ->performRequest(),$assoc = TRUE);
        if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
	echo "<h1><u>ReTweet IDS for the Tweet ID " . $id . "</u></h1>";
	echo "<br>";
	$i = 0;
	foreach($string["ids"] as $items)
        {

        $i++;

            echo "ID: ". $items. "<br />";
            echo "<br>";

        }


       
	   break;
    case "Action9":
       
	      $url = "https://api.twitter.com/1.1/search/tweets.json";
        $requestMethod = "GET";
        $getfield = "?q=" . $_SESSION['input1'];
        $twitter = new TwitterAPIExchange($settings);
        $string = json_decode($twitter->setGetfield($getfield)
                 ->buildOauth($url, $requestMethod)
                 ->performRequest(),$assoc = TRUE);
if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit(); }

        echo "<h1><u>" . "Search tweets of " . $q . "</u></h1>";
        echo "<br>";
        $i = 0;
        foreach($string["statuses"] as $items)
        {

        $i++;
            echo "<u>Number : " . $i . "</u><br>";
            echo "Profile Picture: " . "<img src=" . $items['user']['profile_image_url_https'] . "/>" . "<br />";
            echo "Screen name: ". $items['user']['screen_name']."<br />";
            echo "Name: ". $items['user']['name']."<br />";
            echo "Time and Date of Tweet: ".$items['created_at']."<br />";
            echo "Tweet: ". $items['text']."<br />";
            echo "<br>";

        }

	   
	   break;
    case "Action10":
      echo $_SESSION['input1'];
	  echo $_SESSION['action1'];
 
	   
   $url = "https://api.twitter.com/1.1/statuses/show.json";
    $requestMethod = "GET";
    $getfield = "?id=" . $_SESSION['input1'];

    $twitter = new TwitterAPIExchange($settings);
    $string = json_decode($twitter->setGetfield($getfield)
                 ->buildOauth($url, $requestMethod)
                 ->performRequest(),$assoc = TRUE);
       if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
	   echo "<h1><u>" . "Text and related details of the Tweet ID " . $string["id"] . "</u></h1> <br />";
    echo "Text : " . $string["text"] . "<br />";
    echo "Profile Picture" . "<img src=" . $string["user"]["profile_image_url_https"] . "/>" ."<br />";
    echo "Name of Tweeter : " . $string["user"]["screen_name"] . "<br />";
    echo "Screen name of Tweeter : " . $string["user"]["screen_name"] . "<br />";
    echo "Location : " . $string["user"]["location"] . "<br />";
    echo "Created At : " . $string["user"]["created_at"] . "<br />";


	   
	   break;
    case "Action11":
       
	   
$url = 'https://api.twitter.com/1.1/direct_messages/sent.json';
$getfield = '?count=20';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);

foreach($string as $items)
    {
        echo "Recipient ".$items['recipient_screen_name']."<br />";
        echo "Message". $items['text']."<br /><hr />";
   }


	   
	   break;
    
	default:
        echo "Environment problem!";
}



?>
