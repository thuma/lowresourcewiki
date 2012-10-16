<?php 

/*
$_POST["wikiform"]
$_POST["page"]
$_POST["version"]
*/
if (is_file("wikidata".$_POST["page"].".js"){
file_get_contents("wikidata".$_POST["page"].".js", $oldpage);
}
if (is_file("wikidata".$_POST["page"].".js.".$_POST["version"])){
echo "Incorrect version no.";
} else {
file_put_contents("wikidata".$_POST["page"].".js.".$_POST["version"], $oldpage);
$newpage = 'var wikibody = "'. $_POST["wikiform"]. '";\n';
$newpage = $newpage . 'var version = "'.strval(intval($_POST["version"])+1).'";'
file_put_contents("wikidata".$_POST["page"].".js", $newpage);
echo "Stored.";
}




?>