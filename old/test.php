<head>

  <title>Weathersleuth Popular PHP Test</title>
</head>

<body>
  <script>

  window.onscroll = function(ev) {
      if ((window.innerHeight + window.scrollY) >= document.body.scrollHeight) {
        // you're at the bottom of the page
        location.reload();
      }
  };

  </script>

<?php
for($i=1; $i<=50; $i++){
  echo '<br><hr>';
}
?>


  <?php
//$xml = simplexml_load_file('post_data.xml');
$xml = simplexml_load_file('post_data.xml');

$maxlisted = 0;
if(count($xml->post)<8)
{
  for($i=0; $i<count($xml->post); $i++){
    echo $xml->post[$i]->post_title;
    $maxlisted++;
  }
}else{
  for($i=0; $i<8; $i++)
  {
    echo $xml->post[$i]->post_title;
    $maxlisted++;
  }
}
   ?>

   <p>Blah Blah Random Text</p>


   <?php
   if($_GET){
   $post_num = htmlspecialchars($_GET["post_number"]);
   $xml = simplexml_load_file('post_data.xml');

   for($i=8; $i<$post_num; $i++)
  {
         echo '<p>' . $xml->post[$i]->post_title . '</p>';
  }
   }

    ?>



 </body>
 </html>
