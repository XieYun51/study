<?php 
$con = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_BASE);
$con->query('set names utf8');
function insert_db($table,$arr){
	$keys = "`".implode("`,`",array_keys($arr))."`";
        $values = "'".implode("','",array_values($arr))."'";
        $sql = "insert into {$table} ({$keys}) values ({$values})";
        
        $GLOBALS['con']->query($sql);
        return   mysqli_affected_rows($GLOBALS['con']);
}


function delete_db($table,$condition){
	$sql = "delete from {$table} ".($condition == null?null:$condition);
	$GLOBALS['con']->query($sql);
	return mysqli_affected_rows($GLOBALS['con']);
	
}


function update_db($tab,$arr,$condition){
$db = null;
foreach ($arr as $key => $value) {
	if (count($arr) == 1) {
		$step = " ";
	}else{
		$step = ",";
	}
	$db.=$key."='".$value."'".$step;
}
$db = substr($db,0,strlen($db)-1);
$sql = "update {$tab} set {$db}".($condition == null?null:" where ".$condition);

$GLOBALS['con']->query($sql);
return mysqli_affected_rows($GLOBALS['con']);

}


function select_db($table,$fields,$condition){

if (is_string($fields)) {
	$sql = "select {$fields} from {$table} ".($condition == null?null:" where ".$condition);
}elseif (is_array($fields)) {
	$field = implode(',', $fields);
	$sql = "select {$field} from {$table} ".($condition == null?null:" where ".$condition);
}

	
	$results = $GLOBALS['con']->query($sql);
	return $results;

}
function select_page($table,$fields,$condition){

if (is_string($fields)) {
	$sql = "select {$fields} from {$table} ".($condition == null?null:$condition);
}elseif (is_array($fields)) {
	$field = implode(',', $fields);
	$sql = "select {$field} from {$table} ".($condition == null?null:$condition);
}
	
	$results = $GLOBALS['con']->query($sql);
	return $results;

}
?>
