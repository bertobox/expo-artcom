<!DOCTYPE html>
<head>
	<meta charset="utf-8"/>
	<title>Expo ARTCOM primavera 2011 · etiquetas para exhibición</title>
	<script type="text/javascript" src="js/qrcode.js"></script>
	<script type="text/javascript" src="js/qrcanvas.js"></script>
	<link rel="shortcut icon" href="images/favicon-2011.png" type="image/png">
	<link rel="stylesheet" href="webfonts/stylesheet.css">
  <link rel="stylesheet" href="css/expo-tags.css" media="screen,print">
	<!-- <link rel="stylesheet" href="css/tags.css"> -->
</head>
<body>
	
	<!-- 
	Gallery PHP CODE BEGINS
	 -->
			<div class="">
	<?php

		mysql_connect("","","");
    mysql_select_db("");

		$obras = mysql_query("select M.id as materia_id, O.id,titulo,date,tecnica,T.name as clasificacion,specs,M.profesor,M.name as materiaNombre,C.nombre as coleccionNombre from `obra` as O inner join `materia` as M on M.id = materia_id inner join `coleccion` as C on C.id = coleccion_id inner join `clasificacion` as T on T.id = tecnica where coleccion_id!=0 order by materia_id");
		$counter = 0;
		$prev_materia = -1;
		while($row = mysql_fetch_assoc($obras)){
			$extra = "";
			if($prev_materia!=-1 && $prev_materia != $row["materia_id"]){
				echo "</div></div>";
							$counter = 0;
			}
			$prev_materia = $row["materia_id"];
			if($counter%8==0){
				echo "<div class=\"page {$extra}\">";
			}
			
			echo "
		<!--
		GALLERY ITEM " .($row['id'])." BEGINS
		-->";
			$extra = "";
			if($counter%8==0){
				echo "<!-- =========== START 1 ========= -->";
				echo "<div class=\"column left\">";
			}
			if($counter%8==4){
				echo "<!-- =========== END 1 =========== -->";
				echo "</div><div class=\"column right\">";
			}
			echo "
				<div id=\"".($row['id'])."\" class=\"tag\">
					<div class='tl'></div><div class='tr'></div><div class='bl'></div><div class='br'></div>
					<div class=\"left\">";
				echo "
						<span class=\"folio\">".($row['id'])."</span>";
				echo "
						<div id=\"qr_url_".($row['id'])."\" class=\"qr\">
							<script type=\"text/javascript\">
								append_qrcode(4,\"qr_url_".($row['id'])."\",\"http://artcom.um.edu.mx/g/p11-".($row['id'])."\");
							</script>
						</div><!-- #qr_url_".($row['id'])." -->";
				echo "
					</div><!-- .left -->";
				$autores = mysql_query("select * from `obra_artista` inner join `artista` as A on A.matricula = artista_id where obra_id = ".$row['id']." ");	
				echo "
					<div class=\"right\">";
				echo "
						<p class=\"autores\">";
				
				$buffer = "";
				$counterAutores = 0;
				$total = mysql_num_rows($autores);
				while($row2 = mysql_fetch_assoc($autores)){
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
				echo "</p>";
				echo "<p class=\"name\">".htmlentities($row['titulo'])."</p>";
				echo "<p class=\"materia\">".htmlentities($row['materiaNombre'])."</p>";
				if(strlen($row['clasificacion'])+strlen($row['specs'])>120){
					$row['specs'] = substr($row['specs'],0,117)."...";
				}
				echo "<p class=\"specs\"><span class=\"tecnica\">".htmlentities($row['clasificacion'])."</span> · <span class=\"especificaciones\">".htmlentities($row['specs'])."</span></p>";
				echo"
					</div><div class='clearfix'>&nbsp;</div><!-- .right -->
				</div><!-- #".($row['id'])." -->";
				
				//if($counter==4){
				//	$counter=0;
				/*	echo "
	</div><!-- .column -->
	
	<div class=\"column page-break\">";
	
				}*/
				if($counter%8==7){
					echo "<!-- =========== END 2 ========== -->";
					echo "</div>";
				}
				$counter++;
				if($counter%8==0){
					echo "</div>";
				}
			}
			?>
	</div><!-- .column -->

</body>
</html>