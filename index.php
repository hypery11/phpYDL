<pre>
<?php
@set_time_limit(0);

$orig=file_get_contents("http://www.youtube.com/get_video_info?video_id=" . $_GET["id"]);
$cut=explode("&",$orig);

foreach($cut as $value)
{
  $tmp=urldecode($value);
  $pos=strpos($tmp,"=");
  $data1[substr($tmp,0,$pos)]=substr($tmp,$pos+1);
}
print_r($data1);

?>
</pre>
<?php
//print_r($data1["dashmpd"])."<br><br><br>";

echo 
'<form action="index.php" method="GET" name="id">
<input type="text" name="id">
<input type="submit" value="Get this Video">
</form>';

echo "<img src=".$data1["iurlhq"]."><br>";

$xml_url=$data1["dashmpd"];
$xml_file=file_get_contents($xml_url);

$xml_cut=explode("http://",$xml_file);

foreach($xml_cut as $value)
{
echo $value."<br><br>";
}
/*
$xml = simplexml_load_string($xml_url);
print_r($xml);
*/
?>
