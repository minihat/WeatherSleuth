<html>
<head>
<title>Weathersleuth Recent</title>
<link rel="icon" href="favicon.ico" type="image/ico">
<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Sigmar+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Passion+One:700,400' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lora:400,400italics' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="kenstyle.css">
<meta property="og:url" content="http://weathersleuth.com/home.html" />
<meta property="og:type" content="website" />
<meta property="og:title" content="WeatherSleuth" />
<meta property="og:description" content="Meteorological Intelligence for the Rest of Us" />
<meta property="og:image" content="http://weathersleuth.com/weathersleuth_logo.png" />


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--
<h1 id="blog_name">Weathersleuth</h1>
-->
<div class="rectangle">

<div class="nav_container">
<ul id="navigation">
<li id="wslogo"><a href="http://weathersleuth.com/home.html"><img src="images/weathersleuth_logo.png" height="50"></a></li>
<li><a href="home.html">&#9830; Home</a></li>
<li><a href="recent.php">&#9830; Recent Posts</a></li>
<li><a href="about.html">&#9830; About</a></li>
<li><a href="contact.html">&#9830; Contact</a></li>
<li id="soc_med_icons">
<div>
  <a href="https://www.linkedin.com/in/halltim/"><img class="soc_med" src="images/icon_linkedin.png" alt="LinkedIn Button"></a>
	<a href="https://twitter.com/wxsleuth"><img class="soc_med_2" src="images/icon_twitter.png" alt="Twitter Button"></a>
</div>
</li>
<!--
<li><div class="fb-like" data-href="http://weathersleuth.com/home.html" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div></li>
-->

</ul>
</div>
</div>

<div id="flex">
<div id="ad_wrapper">

  <div id="subscribe">
  <h3 id="side_header">Subscribe</h3>
  <img src="images/tim.jpg" alt="Tim Hall" style="width:100%;display:block;margin:0">
  <form method="post" action="//weathersleuth.us13.list-manage.com/subscribe/post?u=b27440dadb3166b9b12cda2ee&amp;id=4645eac027" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
  <p id="sub_para">Enter your email below to begin recieving Tim Hall's WeatherSleuth newsletter</p>
  <input id="email_input" type="email" name="EMAIL" value="">
  <br><br>
  <div id="mce-responses" class="clear">
  	<div class="response" id="mce-error-response" style="display:none"></div>
  	<div class="response" id="mce-success-response" style="display:none"></div>
  </div>
  <input id="submit_button" name="subscribe" type="submit" value="Subscribe!" class="button">
  </form>
  </div>

</div>

<div id="article_content">

<?php
if($_GET){
	$post_num = htmlspecialchars($_GET["post_number"]);
}else{
	$post_num = 1;
}
if($post_num < 1){$post_num = 1;}

// Retrieve the article teasers here
$xml = simplexml_load_file('post_data_recent.xml');
$length = count($xml->post);

if($post_num >= $length){
	$post_num = $length -7;
}


if($post_num + 8 <= $length){

	 for($i=$post_num-1; $i<=$post_num + 6; $i++)
  {
		// Display case if odd
		if(($i + 1) % 2 != 0){
			echo '<div class="description">';
			echo '<h2 id="feature"><a id="feature" href="' . $xml->post[$i]->link . '">' . $xml->post[$i]->post_title . '</a></h2>';
			echo '<p id="blurb">' . $xml->post[$i]->blurb . '</p>';
			echo '<p id="stats">' . $xml->post[$i]->date . '</p>';
			echo '</div>';
			echo '<a href="' . $xml->post[$i]->link . '"><img id="feature_image" src="images/' . $xml->post[$i]->picture . '" alt="Blog Featured Picture" height=350 width=35%></a>';
			echo '<br>';
		}else{
				// Display case if even
			echo '<div class="description_left">';
			echo '<h2 id="feature"><a id="feature" href="' . $xml->post[$i]->link . '">' . $xml->post[$i]->post_title . '</a></h2>';
			echo '<p id="blurb">' . $xml->post[$i]->blurb . '</p>';
			echo '<p id="stats">' . $xml->post[$i]->date . '</p>';
			echo '</div>';
			echo '<a href="' . $xml->post[$i]->link . '"><img id="feature_image_right" src="images/' . $xml->post[$i]->picture . '" alt="Blog Featured Picture" height=350 width=35%></a>';
		}
  }
}


if(($post_num + 8) > $length && $post_num < $length){
	for($i=$post_num-1; $i<=$length-1; $i++)
	{
		// Display case if odd
		if(($i + 1) % 2 != 0){
			echo '<div class="description">';
			echo '<h2 id="feature"><a id="feature" href="' . $xml->post[$i]->link . '">' . $xml->post[$i]->post_title . '</a></h2>';
			echo '<p id="blurb">' . $xml->post[$i]->blurb . '</p>';
			echo '<p id="stats">' . $xml->post[$i]->date . '</p>';
			echo '</div>';
			echo '<a href="' . $xml->post[$i]->link . '"><img id="feature_image" src="images/' . $xml->post[$i]->picture . '" alt="Blog Featured Picture" height=350 width=35%></a>';
			echo '<br>';
		}else{
			// Display case if even
		echo '<div class="description_left">';
		echo '<h2 id="feature"><a id="feature" href="' . $xml->post[$i]->link . '">' . $xml->post[$i]->post_title . '</a></h2>';
		echo '<p id="blurb">' . $xml->post[$i]->blurb . '</p>';
		echo '<p id="stats">' . $xml->post[$i]->date . '</p>';
		echo '</div>';
		echo '<a href="' . $xml->post[$i]->link . '"><img id="feature_image_right" src="images/' . $xml->post[$i]->picture . '" alt="Blog Featured Picture" height=350 width=35%></a>';
		}
	}
$imax = 7-($length - $post_num);
for($i=$length; $i<$imax+$length; $i++){
			if(($i + 1) % 2 != 0){
				echo '<div class="description">';
				echo '</div>';
				echo '<img id="feature_image" src="images/weathersleuth_logo.png" alt="Logo" height=350 width=35%>';
			}else{
				echo '<div class="description_left">';
				echo '</div>';
				echo '<img id="feature_image_right" src="images/weathersleuth_logo.png" alt="Logo" height=350 width=35%>';
			}
}

}

echo '<div id="page_navs">'
echo '<input type=button value="Prev Page" id="prev" nClick="self.location=\'recent.php?post_number=';
if($post_num -8 >= 1){
	echo $post_num - 8;
}else{
	echo '1';
}
echo  '\'">';
echo '<input type=button value="Next Page" id="next" onClick="self.location=\'recent.php?post_number=';
echo $post_num + 8;
echo '\'">';
echo '</div>'
?>

</div>

</div>


<div id="footer_wrapper">
<ul id="bot_list">
<li id="copy">&copy2018</li>
<li id="foot_title">Weathersleuth</li>
<li id="foot_link"><a href="home.html">&#9830; Home</a></li>
<li id="foot_link"><a href="recent.php">&#9830; Recent Posts</a></li>
<li id="foot_link"><a href="about.html">&#9830; About</a></li>
<li id="foot_link"><a href="contact.html">&#9830; Contact</a></li>
<ul>
</div>


</body>


</html>
