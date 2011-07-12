<!DOCTYPE html>
<head>
	<meta charset="utf-8"/>

	<title>Expo ARTCOM primavera 2011 · etiquetas para exhibición</title>
	<script type="text/javascript" src="js/qrcode.js"></script>
	<script type="text/javascript" src="js/qrcanvas.js"></script>
	<link rel="shortcut icon" href="images/favicon-2011.png" type="image/png">
	<link rel="stylesheet" href="webfonts/stylesheet.css">
	<!-- <link rel="stylesheet" href="css/tags.css"> -->
<style type="text/css" media="screen,print">
	html,body{margin:0;padding:0;height:100%;border:none;font-size:16px;font-size:100%;letter-spacing:.1em;}
	@page {size: letter portrait;margin: 0in;padding:0in}
  .page{padding-top:0;width:8.5in;height:11in;-webkit-page-break-before:always;-moz-page-break-before:always;page-break-before:always;}
	.page:first{display:none;}
	.tl{border:0px solid black;border-width:0px 0px 0px 0px;position:absolute;top:0px;left:0px;height:15pt;width:15pt;}
	.tr{border:0.25pt solid #cbcbcb;border-width:0px 1px 0px 0px;position:absolute;top:0px;right:0px;height:15pt;width:15pt;}
	.bl{border:0.25pt solid #cbcbcb;border-width:0px 0px 1px 0px;position:absolute;bottom:0px;left:0px;height:15pt;width:15pt;}
	.br{border:0.25pt solid #cbcbcb;border-width:0px 1px 1px 0px;position:absolute;bottom:0px;right:0px;height:15pt;width:15pt;}
	.column{width:4.25in;padding:0px;margin:0px;float:left;}
	.clr{clear: both;}
	.break{-webkit-page-break-before:always;
	    -moz-page-break-before:always;
	    page-break-before:always;}
	.tag{position:relative;width: 3.75in;/*19.125em · 306px · 4.25in */padding:.25in .25in .0in .25in ;/*background-color: lightgreen;*/}
	.tag .left{float: left;width: .84in;/*background-color: pink;*/}
	.folio{font-family:"m1cblack", Arial, sans-serif;font-size: 27pt;line-height: 1;margin: 0;letter-spacing: 0;}
	.qr table{display: block;margin-top: 20.6pt;}
	/*.qr{width: 20px;}*/
	.qr img{width: .84in;margin-top: 20.6pt;}
	.qr{width: .84in;display: block;margin-top: 20.6pt;}
	.tag .right{width: 100%;/*12.1875em · 195px · 2.7in */ text-align: right;/*background-color: orange;*/}
	.autores{font-family: "m1cthin", Arial, sans-serif;text-transform: uppercase;font-size: 9pt;line-height: 13pt;margin: 0;height: 38pt;}
	.autores:before{content:url(images/tags-bowtie.svg)" ";}
	.name{font-family: "DekarRegular", Arial, sans-serif;font-size: 16.5pt;line-height: 20pt;margin:8pt 0 0;height: 39pt;}
	.materia{font-family: "m1cregular", Arial, sans-serif;text-transform: uppercase;font-size: 9pt;margin:5pt 0 0;line-height: 20pt;color:#666;}
	.specs{font-family:"m1cheavy", Arial, sans-serif;font-size: 9pt;line-height: 20pt;margin: 0;height:59pt;}
	.tecnica{font-family:"m1clight", Arial, sans-serif;}
	.especificaciones{}
</style>
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