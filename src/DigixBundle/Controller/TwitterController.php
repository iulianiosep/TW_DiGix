<?php 
	
	namespace DigixBundle\Controller;
	//require_once('TwitterAPIExchange.php');
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Response;

	class TwitterController extends Controller{

		function indexAction(){
			/*$settings = array('oauth_access_token' => "3246021028-R1o8zn5jFHHiipRbETuqP8TaztJEYBC1kX1f4xC",
					  'oauth_access_token_secret' => "oEFsw8HhKYfp2E6iaweqhMjl01bX8M4zQ3qdQpgTW4iDb",
					  'consumer_key' => "1ixgqaZKjUvgx12H6ghoRCrXS",
					  'consumer_secret' => "IvAYD1vBT9tQYtIIdvZYaiPTQHlRBb2VtBMcHvg3hAtfRTYKJj");*/

			$twitter = new TwitterOAuth("1ixgqaZKjUvgx12H6ghoRCrXS", "IvAYD1vBT9tQYtIIdvZYaiPTQHlRBb2VtBMcHvg3hAtfRTYKJj", "3246021028-R1o8zn5jFHHiipRbETuqP8TaztJEYBC1kX1f4xC", "oEFsw8HhKYfp2E6iaweqhMjl01bX8M4zQ3qdQpgTW4iDb");

# Migrate over to SSL/TLS
$twitter->ssl_verifypeer = true;

# Load the Tweets
$tweets = $twitter->get('statuses/user_timeline', array('screen_name' => "TestAccount", 'exclude_replies' => 'true', 'include_rts' => 'false', 'count' => 20));

# Example output
if(!empty($tweets)) {
    foreach($tweets as $tweet) {

        # Access as an object
        /*$tweetText = $tweet["text"];

        # Make links active
        $tweetText = preg_replace("#(http://|(www.))(([^s<]{4,68})[^s<]*)#", '<a href="http://$2$3" target="_blank">$1$2$4</a>', $tweetText);

        # Linkify user mentions
        $tweetText = preg_replace("/@(w+)/", '<a href="http://www.twitter.com/$1" target="_blank">@$1</a>', $tweetText);

        # Linkify tags
        $tweetText = preg_replace("/#(w+)/", '<a href="http://search.twitter.com/search?q=$1" target="_blank">#$1</a>', $tweetText);

        # Output
        echo $tweetText;*/

    }
    var_dump($tweets);
}

    		return new Response();
		}	
	}
	
?>