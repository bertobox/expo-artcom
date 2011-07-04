<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Device-width aware gallery</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  <link rel="stylesheet" href="webfonts/stylesheet.css">
<script src="jquery.min.js"></script>
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
			.obra{position: fixed;top:22px;width: 320px;}
			.gallery-media{margin: 0 0 0 330px;width: 720px;}
			.socialnetworks{position: fixed;top:230px;}
			iframe{}
		/*dd{display: block;}
			dd:after{content:"";}*/
		}

		/* IT'S OVER 9000 */
		@media screen and (min-width: 1200px) {

		}
	</style>
</head>

<body>
<!--  <div id="previous" class="arrows"></div> #previous -->
  <div class="gradient">
    
  </div><!-- .gradient -->
  <div id="container">
    <header>
			<h1>expo&nbsp;artcom&nbsp;·&nbsp;primavera&nbsp;<span class="year">2O11</span></h1>
    </header>
    <div id="main" role="main">
			<div class="obra">
				<h2 class="title">Las cacatúas que cantan en la primavera</h2>
				<dl>
					<dt>Autores</dt>
					<dd>Estefanía Márquez</dd>
					<dd>Daniela Camacho</dd>
					<dd>Irene Jiménez</dd>
					<dt>Técnica y especificaciones</dt>
					<dd>Óleo</dd>
					<dd>30 cm &times; 15 cm</dd>
				</dl>
			</div><!-- .obra-details -->

			<div class="gallery-media">
				<img src="http://placehold.it/720x400"/>
				<div class="vimeo">
					<iframe src="http://player.vimeo.com/video/1807479?color=ffffff" width="500" height="281" frameborder="0"></iframe><!-- <p><a href="http://vimeo.com/1807479">Brief Moment</a> from <a href="http://vimeo.com/marcoaslan">Marco Aslan</a> on <a href="http://vimeo.com">Vimeo</a>.</p><p>A travel in Southern France, capturing 3 divergent cultures French, Italian, and Brazilian languages.<br /><br />Year: 2008-2009<br /><br />http://marcoaslan.com</p> -->
				</div>
				<img src="http://placehold.it/720x800"/>
				<div class="vimeo">
					<iframe title="YouTube video player" width="960" height="750" src="http://www.youtube.com/embed/JW5meKfy3fY?rel=0" frameborder="0" allowfullscreen></iframe>
				</div><!-- .vimeo -->
			</div><!-- .gallery-media -->
      <div class="socialnetworks">
				<script src="http://connect.facebook.net/es_MX/all.js#xfbml=1"></script><fb:like href="http://artcom.um.edu.mx/p11/001" send="false" layout="button_count" width="400" show_faces="true" font="lucida grande"></fb:like>
       </div><!-- .socialnetworks -->
    </div><!-- #main -->
    <footer>
			<p>© 2011 <acronym title="Artes y Comunicación">ARTCOM</acronym> - <acronym title="Universidad de Montemorelos">UM</acronym></p>
    </footer>
  </div>
<!--  <div id="next" class="arrows"></div> #next -->
  <div class="gradientright">
    
  </div><!-- .gradientright -->
<script type="text/javascript" charset="utf-8">
	var $vidPlayer = $("iframe");
	var playerWidth = $(".vimeo").width();

	$vidPlayer.each(function(){
	    var $this = $(this);
	    var aspect = $this.attr("height") / $this.attr("width");

	    $(window).resize(function() {
	          $this.width(playerWidth).height(playerWidth * aspect);
	    }).trigger("resize");
	});
</script>
</body>
</html>