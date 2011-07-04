<?php
$file = $_FILES['file'];
if ($file["size"] < 10240000){
  
	if ($file["error"] > 0){
    echo "Return Code: " . $file["error"] . "<br />";
		return;
  }

  if (file_exists("upload/" . $file["name"])){
		echo $file["name"] . " already exists. ";
	}else{
		$chunks = explode('.',$file['name']);
		$newName = md5($file["name"].microtime()).'.'.$chunks[count($chunks)-1];
		move_uploaded_file($file["tmp_name"], "./upload/" . $newName);
		
		//mysql_connect("internal-db.s56558.gridserver.com","db56558","TWDsxCH5");
		//mysql_select_db("db56558_expo_artcom");
		
		$query = "insert into `archivo` (original,nuevo,pre_obra_id) values (\"".$file['name']."\",\"".$newName."\",".mysql_real_escape_string($_POST['tmp_id']).")";
		mysql_query($query);
		$id = mysql_insert_id();
		
		echo '{"name":"'.$newName.'","oldName":"'.$file['name'].'","type":"'.$file['type'].'","size":"'.$file['size'].'","id":'.$id.'}';
	}
	
}else{
	echo "Invalid file";
}
?>
