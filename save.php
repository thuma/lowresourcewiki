<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sv" lang="sv">
 <head>
 <script src="wiky.js" type="text/javascript"></script>
  <title>Save Page</title>
  <link rel="stylesheet" href="wiky.css" type="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
</head>
 <body>
<?php 
if (is_file("wikidata".$_POST["page"].".js")){
file_get_contents("wikidata".$_POST["page"].".js", $oldpage);
}
if (is_file("wikidata".$_POST["page"].".js.".$_POST["version"])){
echo "Page is changed after you started to edit it.<br /> Go back to uppdate and add your changed again.<br />";
} else {
file_put_contents("wikidata".$_POST["page"].".js.".$_POST["version"], $oldpage);
$newpage = 'var wikibody = "'.str_replace("\"","\\\"",str_replace(array("\r\n", "\n", "\r"), "\\n", str_replace("\\","\\\\",$_POST["wikiform"])).'";'."\n";
$newpage = $newpage . 'var version = "'.strval(intval($_POST["version"])+1).'";';
file_put_contents("wikidata".$_POST["page"].".js", $newpage);
echo "Stored OK <br />";
}
echo "<a href=\"index.html?page=".$_POST["page"]."\">Back</a>";
?>
 </body>
</html>