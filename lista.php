<!DOCTYPE html>  
<head>
  <meta charset="utf-8">
	<title>Lista de participantes en la EXPO ARTCOM · primavera 2011</title>
	<link rel="stylesheet" href="webfonts/stylesheet.css">
	<link rel="shortcut icon" href="images/favicon-2011.png" type="image/png">
	<script src="js/jquery.min.js"></script>
    <script src="js/application.js"></script>
<style type="text/css" media="screen">
	h1{font-size: 22px;font-family: "M1clight",Arial, Helvetica, sans-serif;font-weight: normal;}
	th{font-size: .76em;font-family: "M1cmedium",Arial, Helvetica, sans-serif;text-transform: uppercase;font-weight: normal;border-bottom: 1px solid #999;}
	td{font-size: .67em;font-family: "Lucida Grande", Verdana, Arial, Helvetica, sans-serif;font-weight: normal;padding-right: 1em;}	
	fieldset{}
	#search{margin:1em;padding:1em;-webkit-border-radius:11px;-moz-border-radius:11px;border-radius:11px;background-color:#D5D5D5;width:50em;}
	#search label{font-size: 1em;font-family: "M1cmedium",Arial, Helvetica, sans-serif;font-weight: normal;}
	input[type=text]{width:35em;font-size:1.3em;}
</style>

</head>

<body>

  <div id="container">
    <header>
			<h1>Lista de participantes en la expo artcom · semestre de primavera 2011</h1>
				<div id="search">
		        	<label for="filter">Filtrar</label> <input type="text" name="filter" value="" id="filter" placeholder="Escribe un nombre, materia, título, etc."/>
		      	</div>
    </header>
    
    <div id="main">
			
			<table>
			<thead>
			<tr>
			  <th align="right">Obra</th>
			  <th align="left">Nombre y apellido</th>
			  <th align="left">Grado</th>
			  <th align="left">Título</th>
			  <th align="left">Materia</th>
			  <th align="left" colspan="10">Archivos</th>
			</tr>
			</thead>
			<tbody>
<?php
				mysql_connect("","","");
        mysql_select_db("");

				$obras = mysql_query("select O.id,titulo,date,tecnica,T.name,specs,M.profesor,M.name as materiaNombre,M.grupo1 as quihubo,C.nombre as coleccionNombre from `obra` as O inner join `materia` as M on M.id = materia_id inner join `coleccion` as C on C.id = coleccion_id inner join `clasificacion` as T on T.id = tecnica where coleccion_id!=0");
				
				while($row = mysql_fetch_assoc($obras)){
					echo "
			<tr>
			  <td align=\"right\">".($row['id'])."</td>";
			echo "<td align=\"left\">";
				$autores = mysql_query("select * from `obra_artista` inner join `artista` as A on A.matricula = artista_id where obra_id = ".$row['id']." ");

				$buffer = "";
				$counterAutores = 0;
				$total = mysql_num_rows($autores);

				while($row2 = mysql_fetch_assoc($autores)){
			// echo "".htmlentities($row2['nombre_corto']).", ";
			$counterAutores++;
			if($total>1 && $counterAutores > 1){
				if($counterAutores == $total){
					$buffer .= " y&nbsp;";
				}else{
					$buffer .= ", ";
				}
			}
			$buffer .= str_replace(" ","&nbsp;",htmlentities($row2['nombre_corto']));
}
			echo $buffer;
			echo "</td>";
			echo "<td align=\"left\">".$row['quihubo']."</td>";
			echo "<td align=\"left\">".htmlentities($row['titulo'])."</td>";
			echo "<td align=\"left\">".htmlentities($row['materiaNombre'])."</td>";
				$files = mysql_query("select * from `archivo` where obra_id = ".$row['id']." ");
				$i = 'A';
				while($row3 = mysql_fetch_assoc($files)){
			echo "<td align=\"left\"><a href=\"/download.php?f=".($row3['nuevo'])."&fc=".($row['id'])."".($i--)."\">".($i++)."</a></td>";
}			
			// $i = 'A';
			// for ($n=0; $n<6; $n++) {
			//     echo ++$i . "\n";
			// }
			//   <td align="left">b</td>
			//   <td align="left">c</td>
			//   <td align="left">d</td>
			//   <td align="left">e</td>
			//   <td align="left">f</td>
			//   <td align="left">g</td>
			//   <td align="left">h</td>
			//   <td align="left">i</td>
			//   <td align="left">j</td>
			echo "</tr>";

}

?>
			</tbody>
			</table>
    </div>
    <footer>

    </footer>
  
</body>
</html>