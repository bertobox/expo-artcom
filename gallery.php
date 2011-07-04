<!DOCTYPE html>  
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<link rel="shortcut icon" href="images/favicon-2011.png" type="image/png">
	<title>Galería · expo artcom · primavera 2011</title>
	<link rel="stylesheet" href="webfonts/stylesheet.css"/>
	<link rel="stylesheet" href="css/skin.css"/>
<script src="js/qrcode.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.jcarousel.min.js"></script>
<style type="text/css" media="screen">
.jcarousel-next-horizontal{border:1px solid red;background-color:rgb(180,100,100);height:30px;width:30px;}
.jcarousel-prev-horizontal{border:1px solid blue;background-color:rgb(100,100,180);height:30px;width:30px;}
.jcarousel-clip, .jcarousel-clip-horizontal {width:100%;}
	body{}
	.style7 {font-family:'M1cblack', Arial, sans-serif;}
	.wrap{width: 760px;}
	.wrap img{width: 100%;}
	img.qr{width: 216px;}
</style>
	<style type="text/css" media="screen">
		body{margin: 0;padding: 0;}
		h1{font-family: "DekarLightRegular", Verdana, Arial, Helvetica, sans-serif;font-size: 20px;font-weight: normal;line-height: 1;margin:0;}
		h2{font-family: "Calibri",Verdana, Arial, Helvetica, sans-serif;font-weight: normal;margin:0;font-size: 1.2em;}
		dt{font-family: "m1cregular",Verdana, Arial, Helvetica, sans-serif;text-transform: uppercase;font-size: 10px;color: #B6B6B6;margin: 1em 0 .2em;}
		dd{font-family: "m1cregular",Verdana, Arial, Helvetica, sans-serif;margin: 0;font-size: 13px;}
		.obra{margin-top: 20px;margin-bottom: 20px;width: 320px;}
		.socialnetworks{height: 21px;}
		h1 .year{font-family: "DekarRegular",sans-serif;font-size: .8em;letter-spacing: .1em;}
		.vimeo{width: 100%;}
		footer p{font-family: "m1cregular",Verdana, Arial, Helvetica, sans-serif;margin: 0;font-size: 11px;}
    #previous{background: rgba(145,0,0,.0);left:10px;}
    #next{background: rgba(145,0,0,.0);right:10px;}
    #previous:hover{background: rgba(0,0,0,.35) url('images/slider-arrow-35.png') no-repeat scroll center center;left:10px;}
    #next:hover{background: rgba(0,0,0,.35) url('images/slider-arrow-right-35.png') no-repeat scroll center center;right:10px;}
    .arrows{width:60px;height:120px;position:fixed;top:300px;border-radius:3px;z-index:3000;}

.gradient{position:fixed;height:100%;width:60px;background:url('images/slider-arrow-35.png') no-repeat scroll center center;background-image:-moz-linear-gradient(
    center bottom,
    rgb(255,255,255) 12%,
    rgb(89,129,91) 56%,
    rgb(255,255,255) 100%
    );}
    .gradient:hover{position:fixed;height:100%;width:60px;background:url('images/slider-arrow.png') no-repeat scroll center center,
    -webkit-gradient(
    linear,
    left bottom,
    left top,
    color-stop(0,rgba(255,255,255,0)),
    color-stop(0.25,rgba(0,0,0,.05)),
    color-stop(0.5,rgba(0,0,0,.15)),
    color-stop(0.75,rgba(0,0,0,.05)),
    color-stop(1,rgba(255,255,255,0))
    );}
    .gradientright {
      position: fixed;
      right: 0px;
      height: 100%;
      width: 60px;
      background: url('images/slider-arrow-right-35.png') no-repeat scroll center center;
      background-image: -moz-linear-gradient(
        center bottom,
        rgb(255,255,255) 12%,
        rgb(89,129,91) 56%,
        rgb(255,255,255) 100%
        );
      }

      .gradientright:hover {
        position: fixed;
        height: 100%;
        width: 60px;
        background: url('images/slider-arrow-right.png') no-repeat scroll center center,
        -webkit-gradient(
          linear,
          left bottom,
          left top,
          color-stop(0,rgba(255,255,255,0)),
          color-stop(0.25,rgba(0,0,0,.05)),
          color-stop(0.5,rgba(0,0,0,.15)),
          color-stop(0.75,rgba(0,0,0,.05)),
          color-stop(1,rgba(255,255,255,0))
          );
        }

    
    
    
    
		/* Small screen! */
		@media screen and (max-device-width: 480px),
		screen and (max-width: 600px) {
			/* iOS and Windows Mobile font-size changes make the robot cry and SMASH */
			html{-ms-text-size-adjust:none;-webkit-text-size-adjust:none;}
			#container{padding: 0 10px;}
			h1{margin: 0;}
			.gallery-media{margin: 0 auto;width: 100%;}
			.gallery-media img{width: 100%;}
		}
		/* ¡Aún pequeño! (pero un poquito más grande) */
		@media screen and (min-width: 600px) {
			#container{padding: 0 10px;}
			.obra{width: 100%;}
			.gallery-media{margin: 0 auto;width: 100%;}
			.gallery-media img{width: 100%;}
			.gallery-media iframe{width: 100%;}
			/*dd{display: inline;}
				dd:after{content:", ";}
				dl:nth-last-child{content:"";}*/
		}
		/* Desktop! */
		@media screen and (min-width: 740px) {
			#container{margin: 0 auto;width: 720px;}
			#main{padding: 0;}
			.obra{}
			.gallery-media, .vimeo{width: 720px;}
			.socialnetworks{/*position: fixed;top:230px;*/}
			/*dl{margin: 0;}
				dd{display: block;}
				dd:after{content:"";}*/
		}

		@media screen and (min-width: 1090px) {
			#container{position: relative;margin: 0 auto;width: 1050px;}
			#main{padding: 0 ;}
			.obra{position: absolute;top:22px;width: 320px;}
			.gallery-media{margin: 0 0 0 330px;width: 720px;}
			.socialnetworks{position: absolute;top:230px;}
			iframe{}
		/*dd{display: block;}
			dd:after{content:"";}*/
		}

		/* IT'S OVER 9000 */
		@media screen and (min-width: 1200px) {

		}
	</style>
<script type="text/javascript">

var preloadItems = 3;
var pendingRequests = 3;
var buffer = [];

function beforeShowing(carousel, state)
{
		$.ajax({
		  url: "testimage.php?col=8&off="+(carousel.first+preloadItems),
		  success: function(data) {
				if(data=="")
					return;
			  if(!carousel.has(carousel.first+preloadItems))
			  	carousel.add(carousel.first+preloadItems, data);
			}
		});
};

function initialPreloading(initial){
	$.ajax({
	  url: "testimage.php?col=8&off="+initial,
	  success: function(data) {
			pendingRequests--;
			buffer.push(data);
			if(pendingRequests==0){
				createCarousel();
			}else{
				initialPreloading(++initial);
			}
		}
	});
}

function createCarousel(){
	jQuery('#mycarousel').jcarousel({
      size: 6,
			scroll: 1,
			wrap: 'circular',
      itemLoadCallback: {onBeforeAnimation: beforeShowing},
			initCallback: firstLoad,
			itemFallbackDimension:200
  });
}

function firstLoad(carousel){
	$.each(buffer, function(i,v){
		if(v=="")
			return;
		if(!carousel.has(i+1))
	  	carousel.add(i+1, v);
	})
}

jQuery(document).ready(function() {
		initialPreloading(1);
});

</script>
</head>
<body id="gallery" onload="">
	<div class="gradient">

	  </div><!-- .gradient -->
	  <div id="container">
	    <header>
				<h1>expo&nbsp;artcom&nbsp;·&nbsp;primavera&nbsp;<span class="year">2O11</span></h1>
	    </header>
	<ul id="mycarousel" style="border:1px solid red;">

	</ul>
	
	<div class="wrap">
		
<!-- <p class="style7" style="-webkit-transform: rotate(-180deg);text-align:right;">1234</p> -->
<?php
/*
	mysql_connect("internal-db.s56558.gridserver.com","db56558","TWDsxCH5");
	mysql_select_db("db56558_expo_artcom");
	
	$obras = mysql_query("select O.id,titulo,date,tecnica,T.name,specs,M.profesor,M.name as materiaNombre,C.nombre as coleccionNombre from `obra` as O inner join `materia` as M on M.id = materia_id inner join `coleccion` as C on C.id = coleccion_id inner join `clasificacion` as T on T.id = tecnica where coleccion_id!=0");

	while($row = mysql_fetch_assoc($obras)){
		echo "
	<!--
	GALLERY ITEM " .($row['id'])." BEGINS
	-->
	<h2 class=\"style7\">".$row['id']."</h2>";
		
		?>
		<?php
		echo "
	<dl>";
		echo "
	<dt>".htmlentities($row['titulo'])."</dt>";
		echo "
		<dd>".htmlentities($row['tecnica'])."</dd>";
		echo "
		<dd>".htmlentities($row['specs'])."</dd>";
		echo "
		<dd>".htmlentities($row['materiaNombre']).",".htmlentities($row['profesor'])."</dd>";
		echo "
		<dd>".htmlentities($row['coleccionNombre'])."</dd>";
		echo "
		<dd>".htmlentities($row['date'])."</dd>";

		$autores = mysql_query("select * from `obra_artista` inner join `artista` as A on A.matricula = artista_id where obra_id = ".$row['id']." ");
		echo "
	<dt>Autores</dt>
		<dd>
			<ul>";
		while($row2 = mysql_fetch_assoc($autores)){
			echo "
			<li>".htmlentities($row2['nombres'])." ".htmlentities($row2['apellidos']). ", ".$row2['semestre']."</li>";
		}
			echo "
			</ul>
		</dd>
		
		";

		$files = mysql_query("select * from `archivo` where obra_id = ".$row['id']." ");
		echo "
	<dt>Galería</dt>
		<dd>
			<ul>";
		while($row3 = mysql_fetch_assoc($files)){
			echo "
			<li><img src=\"upload/".$row3['nuevo']."\"/><br/>".htmlentities($row3['descripcion'])."</li>";
		}
		echo "
			</ul>
		</dd>";

		echo "
	</ul>
	
	<hr/>
	";

	}

*/
?>

	</div><!-- .wrap --></body>
</html>