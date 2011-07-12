<!DOCTYPE html>  
<head>
  <meta charset="utf-8">
	<title>Lista de participantes en la EXPO ARTCOM · primavera 2011</title>
	<link rel="stylesheet" href="webfonts/stylesheet.css">
  <link rel="stylesheet" href="css/expo-lista.css">
	<link rel="shortcut icon" href="images/favicon-2011.png" type="image/png">
	<script src="js/jquery.min.js"></script>
    <script src="js/application.js"></script>

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
				while($row2 = mysql_fetch_assoc($autores)){
					echo "
					<dd>".htmlentities($row2['nombres'])." ".htmlentities($row2['apellidos'])."</dd>";
				}
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