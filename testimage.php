<?php

mysql_connect("","","");
mysql_select_db("");

$initial = microtime();

$obra = mysql_query("select O.id,titulo,date,T.name as tecnica_long,tecnica,T.name,specs,M.profesor,M.name as materiaNombre,C.nombre as coleccionNombre from `obra` as O inner join `materia` as M on M.id = materia_id inner join `coleccion` as C on C.id = coleccion_id inner join `clasificacion` as T on T.id = tecnica where coleccion_id=".mysql_real_escape_string($_GET['col'])." limit 1 offset ".(mysql_real_escape_string($_GET['off'])-1));
$row = mysql_fetch_assoc($obra);

$final = microtime();

if(mysql_num_rows($obra)==0){
	die("");
}
?>

<?php

$time = $final - $initial;
echo "<script>console.log(\"Executed SQL querry in ".$time." sec\");</script>";




?>

<div id="main" role="main">
			<div class="obra">
				<h2 class="title"><?php echo $row['titulo']; ?></h2>
				<dl>
					<?php
						$autores = mysql_query("select * from `obra_artista` inner join `artista` as A on A.matricula = artista_id where obra_id = ".$row['id']." ");
						if(mysql_num_rows($autores)>1){
							echo "<dt>Autores</dt>";
						}else{
							echo "<dt>Autor</dt>";
						}
						while($row2 = mysql_fetch_assoc($autores)){
							echo "
							<dd>".htmlentities($row2['nombres'])." ".htmlentities($row2['apellidos'])."</dd>";
						}
					?>
					<dt>Técnica y especificaciones</dt>
					<dd><?php echo htmlentities($row['tecnica_long']); ?></dd>
					<dd><?php echo htmlentities($row['specs']); ?></dd>
				</dl>
			</div><!-- .obra-details -->

			<div class="gallery-media">
				<?php
					$files = mysql_query("select * from `archivo` where obra_id = ".$row['id']." ");
					while($row3 = mysql_fetch_assoc($files)){
						echo "<img src=\"upload/".$row3['nuevo']."\"/>";
					}
				?>
			</div><!-- .gallery-media -->
     <div class="socialnetworks">
				<script src="http://connect.facebook.net/es_MX/all.js#xfbml=1"></script><fb:like href="http://artcom.um.edu.mx/p11/001" send="false" layout="button_count" width="400" show_faces="true" font="lucida grande"></fb:like>
      </div><!-- .socialnetworks -->
   </div><!-- #main -->
