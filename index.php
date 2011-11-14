<!DOCTYPE HTML>

<?php

include("dbconfig.php");
include("config_loader.php");

mysql_connect($config['host'],$config['user'],$config['pass']);
mysql_select_db($config['db']);

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
  <link rel="stylesheet" href="css/uniform.default.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="shortcut icon" href="images/favicon-2011.png" type="image/png">
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.fileupload.js"></script>
	<script src="js/jquery.fileupload-ui.js"></script>
	
	<style type="text/css">
		.textboxlist { width: 400px; }
		.selector span{font-family: "Lucida Grande", Verdana, Arial, Helvetica, sans-serif;}
		.selector{ width: 40em;}
	</style>
	
	<link rel="stylesheet" href="css/TextboxList.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="stylesheet" href="css/TextboxList.Autocomplete.css" type="text/css" media="screen" charset="utf-8" />	
  
  <script src="js/TextboxList/SuggestInput.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/TextboxList/GrowingInput.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/TextboxList/TextboxList.js" type="text/javascript" charset="utf-8"></script>		
	<script src="js/TextboxList/TextboxList.Autocomplete.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/TextboxList/TextboxList.Autocomplete.Binary.js" type="text/javascript" charset="utf-8"></script>
	
  <script src="js/jquery.uniform.min.js" type="text/javascript"></script>
	<script type='text/javascript'>
		var autoresCount = 0;
		var autoresAutocomplete; 
		$(document).ready(function() {
			$("select, input:checkbox, input:radio").uniform();
			<?php
			
			  $result = mysql_query("SELECT artista_id as id,Artista.nombres,Artista.apellidos 
			    FROM `artista_semestre` 
			    INNER JOIN `artista` AS Artista ON Artista.matricula = artista_id
			    WHERE coleccion_id=".ConfigLoader::getValue("current_collection"));
			  
			  $buffer = "";
			  while($row = mysql_fetch_assoc($result)){
			    $id = $row["id"];
			    $name = htmlentities($row["nombres"])." ".htmlentities($row["apellidos"]);
			    $buffer.="[{$id},\"{$name}\",null,\"{$name}\"],";
			  }
			  mysql_free_result($result);
			  
        $buffer = substr($buffer,0,strlen($buffer)-1);
        
        echo "var data = [".$buffer."]";

			?>
			
			autoresAutocomplete = new $.TextboxList('#alumnos', {unique: true, plugins: {autocomplete: {onlyFromValues:true,inlineSuggest:false}}});
			autoresAutocomplete.plugins['autocomplete'].setValues(data);
			
			specTabs = $( "#tabs" ).tabs();
			
			$("#addAutorBtn").click(function(){
				autoresCount++;
				newAutor = $("#autorRow").clone().insertBefore($("#buttonRow")); 
				newAutor.find("select")[0].name = "alumno"+autoresCount;
				newAutor.find("select")[1].name = "semestre"+autoresCount;
				newAutor.find("label")[0].innerHTML = "Autor "+autoresCount;			
			});
			
			$("#segundos").blur(function(){
			  segundos = parseInt($("#segundos").val());
			  minutos =  0;
		    if(segundos>=60){
  	      minutos+=parseInt(segundos/60);
  	      segundos = segundos%60;
  	      if(segundos<10){segundos="0"+segundos;}
    	    if(minutos<10){minutos="0"+minutos;}
  	      $("#minutos").val(minutos);
  	      $("#segundos").val(segundos);
  	      $("#minutos").blur();
  	    }
			});
			
			$("#minutos").blur(function(){
			  minutos = parseInt($("#minutos").val());
			  horas =  0;
		    if(minutos>=60){
  	      horas+=parseInt(minutos/60);
  	      minutos = minutos%60;
  	      if(minutos<10){minutos="0"+minutos;}
    	    if(horas<10){horas="0"+horas;}
  	      $("#minutos").val(minutos);
  	      $("#horas").val(horas);
  	      
  	      $("#segundos").val("00");
  	      
  	    }
			});
			
			$("#details").submit(function(evt){

				$("#files").find("textarea").each(function(i, e){
				  hidden = document.createElement("input");
				  hidden.type="hidden";
				  hidden.name = e.id;
				  hidden.value = e.value;
					$("#details").prepend(hidden);
				});
				
	      if(autoresAutocomplete.getValues().length==0){
	        alert("You wanted to submit a piece with no authors I say: \"no, no, no\"");
	        return false;
	      }
	      
	      if($("#files").children().length==0){
	        alert("You wanted to submit a piece with nothing and I say: \"no, no, no\"");
	        return false;
	      }
	      
	      if($("#materia").val()==""){
	        alert("You wanted to submit a piece with no materia and I say: \"no, no, no\"");
	        return false;
	      }
	      
	      if($("#clasificacion").val()==""){
	        alert("You wanted to submit a piece with no clasificacion and I say: \"no, no, no\"");
	        return false;
	      }
				
				selected = specTabs.tabs('option', 'selected');
				specs = "";
				
				switch(selected){
				  case 0:
				    unidad = jQuery("#bi_unidad_de_medida").val();
				    if(unidad==""){
				      alert("Seleccione una unidad!");
				      return false;
				    }
				    specs = jQuery("#bi_altura").val() + "&nbsp;&times;&nbsp;" + jQuery("#bi_anchura").val() + "&nbsp;" + unidad;
				  break;
				  case 1:
				    unidad = jQuery("#tri_unidad_de_medida").val();
				    if(unidad==""){
				      alert("Seleccione una unidad!");
				      return false;
				    }
				    specs = jQuery("#tri_altura").val() + "&nbsp;&times;&nbsp;" + jQuery("#tri_anchura").val() + "&nbsp;&times;&nbsp;" + jQuery("#profundidad").val() + "&nbsp;" + unidad;
				  break;
				  case 2:
				    hora = jQuery("#horas").val();
				    minutos = jQuery("#minutos").val();
				    segundos = jQuery("#segundos").val();

            hora = hora==""?"00":hora;
				    minutos = minutos==""?"00":minutos;
				    segundos = segundos==""?"00":segundos;

				    if(hora.length==1){hora="0"+hora;}
				    if(minutos.length==1){minutos="0"+minutos;}
				    if(segundos.length==1){segundos="0"+segundos;}
				    
				    specs = hora + ":" + minutos + ":" + segundos;
				  break;
				  case 3:
				    specs = jQuery("#otros").val();
				  break;
				}			
				
				jQuery("#especificaciones").val(specs);
				
				values = autoresAutocomplete.getValues();
				jQuery.each(values,function(i,e){
				  hidden = document.createElement("input");
				  hidden.type="hidden";
				  hidden.name = "artista"+i;
				  hidden.value = e[0];
					$("#details").prepend(hidden);
				});
				
				$("#artistas_count").val(autoresAutocomplete.getValues().length);
			
				
			})
		});
	</script>
	<script>
  	$(function() {
  		
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
	<input type="hidden" id="artistas_count" name="artistas_count" value="1"/>		
<h2>Autor(es)</h2>
<p>Mientras se suben los archivos, añade los autores de la pieza</p>
<table id="autorTable">
	<tr class="datos personales" id="autorRow">
		<td class="tdlabel"><label for="select_alumno">Nombre del autor</label></td>
		<td><input type="text" name="alumnos" id="alumnos"></td>
	</tr>
</table>


<h2>Datos de la pieza</h2>
<table>
	<tr>
		<td class="tdlabel"><label for="select_materia">Materia</label></td>
		<td><select name="materia" id="materia">
		  <option value="">Selecciona una materia</option>
			<?php
				$materias = mysql_query("select * from materia");
				while($row = mysql_fetch_assoc($materias)){
					echo "<option value=\"".$row['id']."\">".htmlentities($row['name'])."</option>";
				}
			  mysql_free_result($materias);
			?>
		</select></td>
	</tr>
	<tr>
		<td class="tdlabel"><label for="select_clasificacion">Clasificación</label></td>
		<td><select name="clasificacion" id="clasificacion">
		  <option value="">Selecciona una clasificación</option>
			<?php
				$clasificaciones = mysql_query("select * from clasificacion");
				while($row = mysql_fetch_assoc($clasificaciones)){
					echo "<option value=\"".$row['id']."\">".htmlentities($row['name'])."</option>";
				}
        mysql_free_result($clasificaciones);
			?>
		</select></td>
	</tr>
	<tr>
		<td class="tdlabel"><label for="título">Título</label></td>
		<td><input type="text" name="titulo" value="" id="titulo" placeholder="Inserta el nombre del título aquí" size="33"></td>
	</tr>
	<tr>
		<td class="tdlabel"><label for="descripcion">Descripción general</label></td>
		<td><textarea type="text" name="descripcion" value="" id="descripcion"></textarea></td>
	</tr>
</table>

<h2>Especificaciones</h2>
<input type="hidden" name="especificaciones" value="" id="especificaciones">

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Bidimensional</a></li>
		<li><a href="#tabs-2">Tridimensional</a></li>
		<li><a href="#tabs-3">Multimedia</a></li>
		<li><a href="#tabs-4">Otros</a></li>
	</ul>
	<div id="tabs-1">
    <table class="bidimensional">
    	<tr>
    		<th>
    			Bidimensional
    		</th>
    		<td>
    			<label for="altura">Altura</label><br />
    			<input type="text" name="altura" value="" id="bi_altura" placeholder="10"><br />
    			<span class="altura_hint hint">Altura</span>			
    		</td>
    		<td><span class="times">&times;</span></td>
    		<td>
    			<label for="anchura">Anchura</label><br />
    			<input type="text" name="anchura" value="" id="bi_anchura" placeholder="10"><br />
    			<span class="anchura_hint hint">Anchura</span>
    		</td>
    		<td class="selectbuttontd">
    			<select name="unidad_de_medida" id="bi_unidad_de_medida">
    				<option value="mm">milímetros</option>
    				<option value="cm"selected="selected">centímetros</option>
    				<option value="pulg.">pulgadas</option>
    				<option value="m">metros</option>
    				<option value="px">pixeles</option>
    			</select>
    		</td>
    	</tr>
    </table>
	</div>
	<div id="tabs-2">
    <table class="tridimensional">
    	<tr>
    		<th>
    			Tridimensional
    		</th>
    		<td>
    			<label for="altura">Altura</label><br />
    			<input type="text" name="altura" value="" id="tri_altura" placeholder="10"><br />
    			<span class="altura_hint hint">Altura</span>			
    		</td>
    		<td><span class="times">&times;</span></td>
    		<td>
    			<label for="anchura">Anchura</label><br />
    			<input type="text" name="anchura" value="" id="tri_anchura" placeholder="10"><br />
    			<span class="anchura_hint hint">Anchura</span>
    		</td>
    		<td><span class="times_last">&times;</span></td>
    		<td>
    			<label for="profundidad">Profundidad</label><br />
    			<input type="text" name="profundidad" value="" id="profundidad" placeholder="10"><br />
    			<span class="anchura_hint hint">Profundidad</span>
    		</td>
    		<td class="selectbuttontd">
    			<select name="tri_unidad_de_medida" id="tri_unidad_de_medida">
    			  <option value="">Selecciona una unidad</option>
    				<option value="mm">milímetros</option>
    				<option value="cm">centímetros</option>
    				<option value="pulg.">pulgadas</option>
    				<option value="m">metros</option>
    				<option value="px">pixeles</option>
    			</select>
    		</td>
    	</tr>
    </table>
	</div>
	<div id="tabs-3">
    <table class="temporal">
    	<tr>
    		<th>
    			Multimedia
    		</th>
    		<td>
    			<label for="horas">Horas</label><br />
    			<input type="text" name="horas" value="" id="horas" maxlength="2" placeholder="10"><br />
    			<span class="horas_hint hint">Horas</span>			
    		</td>
    		<td><span class="times bold">:</span></td>
    		<td>
    			<label for="minutos">Minutos</label><br />
    			<input type="text" name="minutos" value="" id="minutos" placeholder="10"><br />
    			<span class="minutos_hint hint">Minutos</span>
    		</td>
    		<td><span class="times_last bold">:</span></td>
    		<td>
    			<label for="segundos">Segundos</label><br />
    			<input type="text" name="segundos" value="" id="segundos" placeholder="10"><br />
    			<span class="anchura_hint hint">Segundos</span>
    		</td>
    	</tr>
    </table>
	</div>
	<div id="tabs-4">
    <table class="otros">
    	<tr>
    		<th>
    			Otros
    		</th>
    		<td>
    			<textarea type="text" name="otros" value="" id="otros"></textarea>			
    		</td>
    </table>
	</div>
</div>


	<input type="submit" value="GUARDARRRRRRR"/>

</form>

<script>
/*global $ */
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
            if(file.error){
              alert("Error uploading file...");
              return false;
            }
            return $('<tr id="file'+file.id+'"><td> Se subi&oacute; el archivo <i>' + file.oldName + '<\/i><br/><textarea id="archivo_desc'+file.id+'" placeholder=\"Descripcion\"></textarea><button onclick="deleteFile('+file.id+')">ELIMINAR</button><\/td><\/tr>');
        }
    });
		/*
		$(window).bind('beforeunload',function() {
		  return 'There are unsaved changes';
		});
		*/

});

	function deleteFile(id){
		$("#file"+id).hide();
		$("#desc"+id)[0].value = "!DELETED!"
	}

</script> 

</body>
</html>
