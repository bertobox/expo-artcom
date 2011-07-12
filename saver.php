<?php
mysql_connect("","","");
mysql_select_db("");
mysql_set_charset('utf8'); 
if($_POST['tmp_id']){
	
	$descriptions = array();
	foreach($_POST as $key => $value){
		//echo (strpos($key,"desc")===true)."->";
		if(strpos($key,"desc") === false){
			//WHY!
		}else{
			array_push($descriptions,$key);
		}
	}
	
	foreach($descriptions as $desc){
		$id_archivo = substr($desc,4);
		//echo $id_archivo;
		if($_POST[$desc]!="!DELETED!"){
			mysql_query("update `archivo` set descripcion=\"".$_POST[$desc]."\" where id=".$id_archivo);
		}else{
			mysql_query("delete from `archivo` where id=".$id_archivo);
		}
	}
	
	//print_r($descriptions);
	
	$title 	= mysql_real_escape_string($_POST['titulo']);
	$specs = mysql_real_escape_string($_POST['especificaciones']);
	$materia = mysql_real_escape_string($_POST['materia']);
	$clasificacion = mysql_real_escape_string($_POST['clasificacion']);
	$tmp_id = mysql_real_escape_string($_POST['tmp_id']);
	
	$query = "delete from `pre_obra` where id=".mysql_real_escape_string($tmp_id);
	mysql_query($query);
	
	$query = "insert into `obra` (titulo,tecnica,specs,materia_id,semestre,coleccion_id,date) values (\"".$title."\",\"".$clasificacion."\",\"".$specs."\",".$materia.",(select max(id) from `coleccion`),8,now())";
	mysql_query($query);
	$new_id = mysql_insert_id();
	
	$autores_count = mysql_real_escape_string($_POST['autores_count']);
	
	for($i=0;$i<$autores_count;$i++){
		//echo "guardando autor".$i;
		$currentA = mysql_real_escape_string($_POST['alumno'.$i]);
		$currentS = mysql_real_escape_string($_POST['semestre'.$i]);
		$query = "insert into `obra_artista` (artista_id,obra_id,semestre) values(".$currentA.",".$new_id.",".$currentS.")";
		//echo $query;
		mysql_query($query);
	}
	
	$query = "select id from `archivo` where pre_obra_id = ".mysql_real_escape_string($tmp_id);
	///echo $query;
	$archivos = mysql_query($query);

	while($row = mysql_fetch_row($archivos)){
		mysql_query("update `archivo` set obra_id=".$new_id." where id=".$row[0]);
	}
	
	include("test.html");
}


?>