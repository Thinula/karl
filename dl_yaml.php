<?
require './internal/common.php';
header("Content-Type: text/plain");

$query = "SELECT * FROM Problems WHERE cid=$CID ORDER BY zindex";
$res = mysql_query($query);
$contest_name = $OK_CONTESTS[$CID]['name'];

function addSpaces($text) {
	return str_replace("\t", "  ", str_replace("\n","\n\t", $text));
}

$appetizers = array('author', 'answer', 'title', 'difficulty', 'votes');
$courses = array('statement', 'solution', 'comments');
$n = 0;
while ($prob_row = mysql_fetch_array($res)) {
	$n++;
	echo "# Problem $n" . "\n";
	foreach ($appetizers as $entree)
		if (array_key_exists($entree, $prob_row))
			echo "$entree: " . $prob_row[$entree] . "\n";
	foreach ($courses as $entree)
		if (array_key_exists($entree, $prob_row))
			echo "$entree: |\n  " . addSpaces($prob_row[$entree]) . "\n";
	echo '---' . "\n";
}	

?>
