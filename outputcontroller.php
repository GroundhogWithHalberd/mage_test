<?php

include 'connection.php';
include 'data.php';
include 'db.php';

$Data = new DataBase($db);
$EmList = $Data->selectAll();
	$count = 0;
	$domain_array;
foreach ($EmList as $email){
	$unit = new Data ($email['email'],$email['reg_date']);
	$domain_array[] = $unit->getDomain();
	include 'views/table.php';
	$count++;
}
$domain_array = array_unique($domain_array);
foreach ($domain_array as $domain){
    echo "<button type='button' value='$domain' onclick='searchDom(this)'>$domain</button>";
}
echo "<button type='button' value='' onclick='searchDom(this)''>Clear</button>";

if ($count == 0){
	echo '<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        <div class="content">
			<p>List is empty</p>
        </div>
    </div>
</div>';
}
if (isset($_POST["selection"])){
	$inputs = $_POST["selection"];
	$choice = $_POST["action"];
	$string = null;
    foreach ($inputs as $value) {
		if ($string == null) $string .= "('".$value."'";
		else {
			$string.=", "."'".$value."'";
		}
	}
	$string .= ")";
	$Data->$choice($string);
}