<!DOCTYPE HTML>

<?php
mysql_connect("","","");
mysql_select_db("");

mysql_query("insert into `pre_obra` (titulo,tecnica,specs,materia_id,semestre,coleccion_id,date) values (0,0,0,0,0,0,now())");
$tmp_id = mysql_insert_id();

?>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>EXPO ARTCOM · Registro de piezas</title>
  <link rel="stylesheet" href="css/expo.css">
	<link rel="stylesheet" href="css/jquery-ui.css" id="theme">
	<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
	<link rel="stylesheet" href="css/uniform.default.css" media="screen">
	<link rel="shortcut icon" href="images/favicon-2011.png" type="image/png">
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.fileupload.js"></script>
	<script src="js/jquery.fileupload-ui.js"></script>
	<script src="js/jquery.uniform.min.js" type="text/javascript"></script>
	<script type='text/javascript'>
		var autoresCount = 0;
		$(document).ready(function() {
			//$("select, input:checkbox, input:radio").uniform
			$("#file_error").dialog({ autoOpen: false,modal: true,
				buttons: { "OK": function() { 
						$(this).dialog("close"); 
					} 
				}
			})
			$("#title_error").dialog({ autoOpen: false,modal: true,
				buttons: { "OK": function() { 
						$(this).dialog("close"); 
					} 
				}
			})
			
			$("#especificaciones_error").dialog({ autoOpen: false,modal: true,
				buttons: { "OK": function() { 
						$(this).dialog("close"); 
					} 
				}
			})
			
			$("#addAutorBtn").click(function(){
				autoresCount++;
				newAutor = $("#autorRow").clone().insertBefore($("#buttonRow")); 
				newAutor.find("select")[0].name = "alumno"+autoresCount;
				newAutor.find("select")[1].name = "semestre"+autoresCount;
				newAutor.find("label")[0].innerHTML = "Autor "+autoresCount;			
			});
			$("#details").submit(function(){
				
				//Rough validations
				if(totalFiles==0){
					$("#file_error").dialog('open');
					return false;
				}
				if($('#titulo').val() == ""){
					$("#title_error").dialog('open');
					return false;
				}
				if($('#especificaciones').val() == ""){
					$("#especificaciones_error").dialog('open');
					return false;
				}
				
				//Find total number of autores
				$("#autores_count")[0].value = autoresCount+1;
				
				//Add all upload descriptions to hidden fields in form being submitted
				$("#files").find("textarea").each(function(i, e){
					$("#details").append("<input type=\"hidden\" name=\""+e.id+"\" value=\""+e.value+"\"/>");
				});
			
			
			})
		});
	</script>	
</head>

<body>
	
	<!-- 
	Some thoughts:
	Several authors may be credited to a piece. 
	For this, a few considerations must be implemented:
	· The form must allow one to specify multiple authors
	· The request must allow several methods of writing the names on the print PDF
	
	a “Preguntas frecuentes” section:
	· ¿qué tipo de archivos puedo/debo subir?
	
	
	 -->
<div id="file_error" title="Error">Debes subir al menos un archivo!</div>
<div id="title_error" title="Error">Debes escribir el t&iacute;tulo de la obra.</div>
<div id="especificaciones_error" title="Error">Debes escribir las especificaciones de la obra.</div>

<h1>Registro de piezas para la exhibición de fin de semestre</h1>
<p>Llena este formulario por <strong>cada</strong> pieza en exhibición</p>
<h2>Archivo(s) de la pieza</h2>
<p>Arrastra los archivos que correspondan a la presentación de esta pieza al area de abajo. También puedes hacer click y así seleccionar los archivos a subir desde tu computadora.</p>

<form id="file_upload" action="upload.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="tmp_id" value="<?php echo $tmp_id; ?>"/>
    <input type="file" name="file" multiple>
    <button>Subir los archivos</button>
    <div>Subir los archivos</div>
</form>
<table id="files"></table>
<form id="details" action="saver.php" method="POST">
	<input type="hidden" name="tmp_id" value="<?php echo $tmp_id; ?>"/>
	<input type="hidden" id="autores_count" name="autores_count" value="1"/>		
<h2>Autor(es)</h2>
<p>Mientras se suben los archivos, selecciona los autores de la pieza</p>
<table id="autorTable">
	<tr class="datos personales" id="autorRow">
		<td class="tdlabel"><label for="select_alumno">Nombre del autor</label></td>
		<td><select name="alumno0" id="alumno">
			<?php
				$alumnos = mysql_query("select * from artista");
				while($row = mysql_fetch_assoc($alumnos)){
					echo "<option value=\"".$row['matricula']."\">".htmlentities($row['nombres'])." ".htmlentities($row['apellidos'])."</option>";
				}
			
			?>
		</select></td>
		<td>Semestre</td>
		<td><select name="semestre0" id="semestre">
			<option value="1" selected="selected">1 - Primero</option>
			<option value="2">2 - Segundo</option>
			<option value="3">3 - Tercer</option>
			<option value="4">4 - Cuarto</option>
			<option value="5">5 - Quinto</option>
			<option value="6">6 - Sexto</option>
			<option value="7">7 - Séptimo</option>
			<option value="8">8 - Octavo</option>
		</select></td>
	</tr>
	<tr id="buttonRow">
		<td colspan="4" style="text-align:right">
			<input type="button" id="addAutorBtn" value="Agregar otro autor"/>
		</td>
	</tr>
</table>


<h2>Datos de la pieza</h2>
<table>
	<tr>
		<td class="tdlabel"><label for="select_materia">Materia</label></td>
		<td><select name="materia" id="materia">
			<?php
				$materias = mysql_query("select * from materia");
				while($row = mysql_fetch_assoc($materias)){
					echo "<option value=\"".$row['id']."\">".htmlentities($row['name'])."</option>";
				}
			
			?>
		</select></td>
	</tr>
	<tr>
		<td class="tdlabel"><label for="select_clasificacion">Clasificación</label></td>
		<td><select name="clasificacion" id="clasificacion">
			<?php
				$clasificaciones = mysql_query("select * from clasificacion");
				while($row = mysql_fetch_assoc($clasificaciones)){
					echo "<option value=\"".$row['id']."\">".htmlentities($row['name'])."</option>";
				}
			
			?>
		</select></td>
	</tr>
	<tr>
		<td class="tdlabel"><label for="título">Título</label></td>
		<td><input type="text" name="titulo" value="" id="titulo" placeholder="Inserta el nombre del título aquí" size="33"></td>
	</tr>
	<tr>
		<td class="tdlabel"><label for="especificaciones">Especificaciones</label></td>
		<td><input type="text" name="especificaciones" value="" id="especificaciones" size="33"></td>
	</tr>
</table>
	<input type="submit" value="GUARDAR"/>

</form>

<script>
/*global $ */
var totalFiles = 0;
$(function () {
    $('#file_upload').fileUploadUI({
        uploadTable: $('#files'),
        downloadTable: $('#files'),
        buildUploadRow: function (files, index) {
            return $('<tr><td>' + files[index].fileName + '<\/td>' +
                    '<td class="file_upload_progress"><div><\/div><\/td>' +
                    '<td class="file_upload_cancel">' +
                    '<button class="ui-state-default ui-corner-all" title="Cancelar">' +
                    '<span class="ui-icon ui-icon-cancel">Cancelar<\/span>' +
                    '<\/button><\/td><\/tr>');
        },
        buildDownloadRow: function (file) {
			totalFiles++;
            return $('<tr id="file'+file.id+'"><td> Se subi&oacute; el archivo <i>' + file.oldName + '<\/i><br/><textarea id="desc'+file.id+'" placeholder=\"Descripcion\"></textarea><button onclick="deleteFile('+file.id+')">ELIMINAR</button><\/td><\/tr>');
        }
    });
		/*
		$(window).bind('beforeunload',function() {
		  return 'There are unsaved changes';
		});
		*/

});

	function deleteFile(id){
		totalFiles--;
		$("#file"+id).hide();
		$("#desc"+id)[0].value = "!DELETED!"
	}

</script> 

</body>
</html>
