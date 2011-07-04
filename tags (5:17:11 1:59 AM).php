<!DOCTYPE html>
<head>
	<meta charset="utf-8"/>

	<title>Expo ARTCOM primavera 2011 · etiquetas para exhibición</title>
	<script type="text/javascript" src="js/qrcode.js"></script>
	<link rel="shortcut icon" href="images/favicon-2011.png" type="image/png">
<script type="text/javascript">
	function draw_qrcode(text) {
		var qr = new QRCode(4, QRErrorCorrectLevel.H);
		qr.addData(text);
		qr.make();
		document.write("<table style='border-width: 0px; border-style: none; border-color: #0000ff; border-collapse: collapse;'>");
		for (var r = 0; r < qr.getModuleCount(); r++) {
		    document.write("<tr>");
		    for (var c = 0; c < qr.getModuleCount(); c++) {
		        if (qr.isDark(r, c) ) {                                                                                                                               
		            document.write("<td style='border-width: 0px; border-style: none; border-color: #0000ff; border-collapse: collapse; padding: 0; margin: 0; width: 2px; height: 2px; background-color: #000000;'></td>");
		        } else {                                                                                                                                              
		            document.write("<td style='border-width: 0px; border-style: none; border-color: #0000ff; border-collapse: collapse; padding: 0; margin: 0; width: 2px; height: 2px; background-color: #ffffff;'></td>");
		        }
		    }
		    document.write("</tr>");
		}
		document.write("</table>");
	}
</script>
	<link rel="stylesheet" href="webfonts/stylesheet.css">
	<!-- <link rel="stylesheet" href="css/tags.css"> -->
<style type="text/css" media="screen">
	html,body{
	margin:0;
	padding:0;
	height:100%;
	border:none;
	font-size: 16px;
	font-size: 100%;
	letter-spacing: .1em;
	}
	.column{float: left;}

	.clr{clear: both;}
	.tag{width: 3.75in;/*19.125em · 306px · 4.25in */clear: both;position:relative;padding:.5in .25in .5in .25in ;/*background-color: lightgreen;*/}
	.tag .left{float: left;width: .84in;/*background-color: pink;*/}
	.folio{font-family:"m1cblack", Arial, sans-serif;font-size: 27pt;line-height: 1;margin: 0;letter-spacing: 0;}
	.qr table{display: block;margin-top: 20.6pt;}
	/*.qr{width: 20px;}*/
	.qr img{width: .84in;display: block;margin-top: 20.6pt;}

	.tag .right{float: left;width: 2.91in;/*12.1875em · 195px · 2.7in */ text-align: right;/*background-color: orange;*/}
	.autores{font-family: "m1cthin", Arial, sans-serif;text-transform: uppercase;font-size: 9pt;line-height: 13pt;margin: 0;height: 38pt;}
	.autores:before{content:url(images/tags-bowtie.svg)" ";}
	.name{font-family: "DekarRegular", Arial, sans-serif;font-size: 16.5pt;line-height: 20pt;margin:8pt 0 0;height: 39pt;}
	.materia{font-family: "m1cregular", Arial, sans-serif;text-transform: uppercase;font-size: 9pt;margin:5pt 0 0;line-height: 20pt;color:#666;}
	.specs{font-family:"m1cheavy", Arial, sans-serif;font-size: 9pt;line-height: 20pt;margin: 0;}
	.tecnica{font-family:"m1clight", Arial, sans-serif;}
	.especificaciones{}
</style>
<style type="text/css" media="print">
	  * { background: transparent !important; color: #444 !important; text-shadow: none !important; }
	  a, a:visited { color: #444 !important; text-decoration: underline; }
	  a:after { content: " (" attr(href) ")"; } 
	  abbr:after { content: " (" attr(title) ")"; }
	  .ir a:after { content: ""; }  
	  pre, blockquote { border: 1px solid #999; page-break-inside: avoid; }
	  thead { display: table-header-group; }  
	  tr, img { page-break-inside: avoid; }
	  @page { margin: 0.5cm; }
	  p, h2, h3 { orphans: 3; widows: 3; }
	  h2, h3{ page-break-after: avoid; }
		/*my styles*/
		@page {size: letter portrait;/* width height */	margin: 0in;}
		body{background-color: #DDD;}
		.column{float: left;}
		.break{color: red;page-break-after:always;}
		.clr{clear: both;}
		.tag{width: 3.75in;/*19.125em · 306px · 4.25in */padding:.25in .25in .25in 0;/*float: left;*/margin: 0;page-break-after:always;}
		.tag .left{float: left;width: .84in;background-color: pink;}
		.folio{font-family: "mplus-1c-black", "m1cblack", Arial, sans-serif;font-size: 27pt;line-height: 1;margin: 0;letter-spacing: 0;}
		.qr table{display: block;margin-top: 20.6pt;border-width: 0px; border-style: none; border-color: #0000ff; border-collapse: collapse;}
		.qr td{border-width: 0px; border-style: none; border-color: #0000ff; border-collapse: collapse; padding: 0; margin: 0; width: 2px; height: 2px; background-color: #ffffff;}
		.qr img{width: .84in;display: block;margin-top: 20.6pt;}

		.tag .right{float: left;width: 2.91in;/*12.1875em · 195px · 2.7in */ text-align: right;background-color: orange;}
		.autores{font-family: "mplus-1c-thin", "m1cthin", Arial, sans-serif;text-transform: uppercase;font-size: 9pt;line-height: 13pt;margin: 0;height: 38pt;}
		.autores:before{content:url(images/tags-bowtie.svg)" ";}
		.name{font-family: "Dekar", "DekarRegular", Arial, sans-serif;font-size: 16.5pt;line-height: 20pt;margin:8pt 0 0;height: 39pt;}
		.materia{font-family: "mplus-1c-regular", "m1cregular", Arial, sans-serif;text-transform: uppercase;font-size: 9pt;margin:5pt 0 0;line-height: 20pt;color:#666;}
		.specs{font-family: "mplus-1c-heavy", "m1cheavy", Arial, sans-serif;font-size: 9pt;line-height: 20pt;margin: 0;}
		.tecnica{font-family: "mplus-1c-light", "m1clight", Arial, sans-serif;}
		.especificaciones{}
	}
</style>
</head>
<body>
	
	<!-- 
	Gallery PHP CODE BEGINS
	 -->
			<div class="">
	<?php

		mysql_connect("internal-db.s56558.gridserver.com","db56558","TWDsxCH5");
		mysql_select_db("db56558_expo_artcom");

		$obras = mysql_query("select O.id,titulo,date,tecnica,T.name as clasificacion,specs,M.profesor,M.name as materiaNombre,C.nombre as coleccionNombre from `obra` as O inner join `materia` as M on M.id = materia_id inner join `coleccion` as C on C.id = coleccion_id inner join `clasificacion` as T on T.id = tecnica where coleccion_id!=0");
		$counter = 0;
		while($row = mysql_fetch_assoc($obras)){
			$counter++;
			echo "
		<!--
		GALLERY ITEM " .($row['id'])." BEGINS
		-->";

			echo "
				<div id=\"".($row['id'])."\" class=\"tag\">
					<div class=\"left\">";
				echo "
						<span class=\"folio\">".htmlentities($row['id'])."</span>";
				echo "
						<span class=\"qr\">
							<script type=\"text/javascript\">
								draw_qrcode(\"qr_url\",\"http://artcom.um.edu.mx/expo/gallery/p2011/".htmlentities($row['id'])."\");
							</script>
						</span>";
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
				echo "<p class=\"specs\"><span class=\"tecnica\">".htmlentities($row['clasificacion'])."</span> · <span class=\"especificaciones\">".htmlentities($row['specs'])."</span></p>";
				echo"
					</div><!-- .right -->
				</div><!-- #".($row['id'])." -->";
				
				if($counter==8){
					$counter=0;
					echo "<span style=\"page-break-after:always;\"></span>";
				}
				
			}
			?>
	</div><!-- .column -->

</body>
</html>