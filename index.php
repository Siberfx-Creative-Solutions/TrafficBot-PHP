<?php

$proxy = getRandomProxy();
$url = urlDecode($_GET['url']);
if (strlen($url) < 12 )

$viewer = "https://trabott.herokuapp.com/viewer.php?url=";

if (hasParam('loads'))
{
$loads = $_GET['loads'];
}
else
{
$loads = 10;
}

if(hasParam('submit'))
{

$result = proxy($proxy, $viewer.urlEncode($url));

echo ($loads+10).' Total <br>10 New View From '.$proxy.'<br>'.$url."<br>".$result.'<br>
<script type="text/JavaScript">
setTimeout(function(){
window.location.href="index.php?url='.urlEncode($url).'&submit=true&loads='.($loads+10).'";
}, 2000);
</script>';
exit;
}

function getRandomProxy()
{
  $proxies = file('https://ytviewshack.herokuapp.com/proxies.txt');
 return trim($proxies[array_rand($proxies,10)]);
}
function getRandomAgent()
{
  $bits = file('useragents.txt');
 return trim($bits[array_rand($bits,10)]);
}

function proxy($proxy, $url){
$url = ($url);
$agent = getRandomAgent();
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_REFERER, "https://www.youtube.com");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT_MS, 50);
curl_setopt($ch, CURLOPT_USERAGENT,  $agent);
curl_setopt($ch, CURLOPT_HEADER, 0);
$page = curl_exec($ch);
curl_close($ch);
if (strlen($page) > 50)
{
   $hit = true;
}
return $page;
}


function hasParam($param) 
{
   return array_key_exists($param, $_REQUEST);
}

?>

<html>
  <head>
    <title>Trabott</title>
  </head>
  <body>
  </body>

      • Enter a valid URL<br>
      • Close the Tab to Stop Getting Traffic<br>
      • Leave Tab Open to Keep Getting Traffic<br><br>

      <form action="" method="GET">
      URL: <input type="text" name="url">
      <br>
      <button type="submit" name="submit" value="true">START</button>
      </form>
</body>
</html>
