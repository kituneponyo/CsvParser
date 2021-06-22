require_once('CsvParser.php');

$csvParser = new CsvParser();
$csvParser->load("dirty.csv");

$rows = $csvParser->getRows();

print "
	<style>
		table {
			border-collapse: collapse;
		}
		table, td {
			border: solid 1px;
		}
		td {
			min-height: 1em;
		}			
	</style>
";
print "<table><tbody>";
foreach ($rows as $row) {
	print "<tr>";
	foreach ($row as $cell) {
		print "<td>" . ($cell ? str_replace("\n", "<br>\n", $cell) : '&nbsp;') . "</td>";
	}
	print "</tr>";
}
print "</tbody></table>";
