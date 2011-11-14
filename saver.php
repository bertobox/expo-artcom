<?php
include("dbconfig.php");
include("config_loader.php");

mysql_connect($config['host'],$config['user'],$config['pass']);
mysql_select_db($config['db']);

mysql_set_charset('utf8'); 
if($_POST['tmp_id']){
    $archivo_prefix = "archivo_desc";
	  $descriptions = array();
	  
  	foreach($_POST as $key => $value){
  		if(strpos($key,$archivo_prefix) === false){
  			//WHY!
  		}else{
  			array_push($descriptions,$key);
  		}
  	}
	
  	foreach($descriptions as $desc){
  		$id_archivo = substr($desc,strlen($archivo_prefix));//Remove the prefix: "archivo_desc22" -> "22"

  		if($_POST[$desc]!="!DELETED!"){
  			mysql_query("update `archivo` set descripcion=\"".$_POST[$desc]."\" where id=".$id_archivo);
  			handle_failure();
  		}else{
  			mysql_query("delete from `archivo` where id=".$id_archivo);
  			handle_failure();
  		}
  	}
	
  	$title 	= mysql_real_escape_string($_POST['titulo']);
  	$specs = mysql_real_escape_string($_POST['especificaciones']);
  	$materia = mysql_real_escape_string($_POST['materia']);
  	$clasificacion = mysql_real_escape_string($_POST['clasificacion']);
  	$descripcion = mysql_real_escape_string($_POST['descripcion']);
  	$tmp_id = mysql_real_escape_string($_POST['tmp_id']);
	
  	$query = "delete from `pre_obra` where id=".mysql_real_escape_string($tmp_id);
  	mysql_query($query);
  	handle_failure();
	
  	$query = "insert into `obra` (titulo,clasificacion_id,descripcion,specs,materia_id,coleccion_id,date) values (\"".$title."\",".$clasificacion.",\"".$descripcion."\",\"".$specs."\",".$materia.",".ConfigLoader::getValue("current_collection").",now())";
  	mysql_query($query);
  	handle_failure();
  	
  	$new_id = mysql_insert_id();
	
  	$artistas_count = mysql_real_escape_string($_POST['artistas_count']);
	
  	for($i=0;$i<$artistas_count;$i++){
  		//echo "guardando autor".$i;
  		$currentA = mysql_real_escape_string($_POST['artista'.$i]);
  		$query = "insert into `obra_artista` (artista_id,obra_id) values(".$currentA.",".$new_id.")";
  		//echo $query;
  		mysql_query($query);
  		handle_failure();
  	}
	
  	$query = "select id from `archivo` where pre_obra_id = ".mysql_real_escape_string($tmp_id);
  	$archivos = mysql_query($query);
  	handle_failure();

  	while($row = mysql_fetch_row($archivos)){
  		mysql_query("update `archivo` set obra_id=".$new_id." where id=".$row[0]);
  		handle_failure();
  	}
  	
  	mysql_free_result($archivos);
  	
		include("upload_success.html");
}

function handle_failure(){
  if(mysql_error()!=""){
	  include("upload_error.html");
	  die(1);
	}
}


?>