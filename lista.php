<!DOCTYPE html>  
<head>
  <meta charset="utf-8">
  <title>Lista de participantes en la EXPO ARTCOM · otoño 2011</title>
  <link rel="stylesheet" href="webfonts/stylesheet.css">
  <link rel="stylesheet" href="css/expo-lista.css">
  <link rel="shortcut icon" href="images/favicon-2011.png" type="image/png">
  <script src="js/jquery.min.js"></script>
  <script src="js/application.js"></script>
</head>

<body>

  <div id="container">
    <header>
      <h1>Lista de participantes en la expo artcom · semestre de otoño 2011</h1>
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
        <th align="left">Título</th>
        <th align="left">Materia</th>
        <th align="left" colspan="10">Archivos</th>
      </tr>
      </thead>
      <tbody>
      <?php
        include("dbconfig.php");
        include("config_loader.php");
        
        mysql_connect($config['host'],$config['user'],$config['pass']);
        mysql_select_db($config['db']);
        
        $obras = mysql_query("SELECT 
          Obra.id, Obra.titulo, Obra.date, Obra.specs, 
          Clasificacion.name, 
          Materia.profesor, Materia.name AS materiaNombre, 
          Coleccion.nombre AS coleccionNombre 
          FROM `obra` as Obra 
          INNER JOIN `clasificacion` AS Clasificacion ON Clasificacion.id = Obra.clasificacion_id 
          INNER JOIN `materia` AS Materia ON Materia.id = Obra.materia_id 
          INNER JOIN `coleccion` AS Coleccion ON Coleccion.id = Obra.coleccion_id 
          WHERE Obra.coleccion_id=".ConfigLoader::getValue("current_collection"));

        while($row = mysql_fetch_assoc($obras)){
          echo "<tr><td class=\"row_right\">".$row['id']."</td>";
          echo "<td class=\"row_left\">";
          
          $autores = mysql_query("SELECT DISTINCT
            OA.artista_id, OA.obra_id, 
            Artista.carrera_id, Artista.nombres, Artista.apellidos, Artista.matricula, 
            Obra.materia_id, Obra.coleccion_id, 
            Carrera.initial  
            FROM `obra_artista` AS OA
            INNER JOIN `artista` AS Artista ON Artista.matricula = OA.artista_id 
            INNER JOIN `obra` AS Obra ON Obra.id = OA.obra_id 
            INNER JOIN `carrera` AS Carrera ON Carrera.id = Artista.carrera_id 
            WHERE OA.obra_id = ".$row['id']);
          
          $buffer = "";
          $buffer2 = "";
          $counterAutores = 0;
          $total = mysql_num_rows($autores);

          while($row2 = mysql_fetch_assoc($autores)){
            $buffer .= "<div class=\"author\">";
            $buffer .= str_replace(" ","&nbsp;",htmlentities($row2['nombres']));
            $buffer .= " ";
            $buffer .= str_replace(" ","&nbsp;",htmlentities($row2['apellidos']));
            $buffer .= " ";
            
            $semester = mysql_query("SELECT * 
              FROM `materia_grupo` AS MG 
              WHERE MG.materia_id = ".$row2['materia_id']." 
              AND MG.carrera_id = ".$row2['carrera_id']);
            
            $total2 = mysql_num_rows($semester);
            if($total2==0){
              $semester = mysql_query("SELECT * 
                FROM `artista_semestre` AS ArS 
                WHERE ArS.artista_id = ".$row2['matricula']." 
                AND ArS.coleccion_id = ".$row2['coleccion_id']);
            }
            $row3 = mysql_fetch_assoc($semester);
            
            $buffer .= str_replace(" ","&nbsp;","(".htmlentities($row3['semestre'].$row2['initial']).")");
            $buffer .= "</div>";
          }
      
          echo $buffer;
          echo "</td>";
          echo "<td class=\"row_left\">".htmlentities($row['titulo'])."</td>";
          echo "<td class=\"row_left\">".htmlentities($row['materiaNombre'])."</td>";
          
          $files = mysql_query("select * from `archivo` where obra_id = ".$row['id']);
          $i = 'A';
          
          while($row3 = mysql_fetch_assoc($files)){
            echo "<td class=\"row_left\"><a href=\"download.php?f=".$row3['nuevo']."&fc=".$row['id'].$i."\">".$i."</a></td>";
            $i++;
          }     
          echo "</tr>";
        }
        
        mysql_free_result($obras);
        mysql_free_result($autores);
        mysql_free_result($semester);
        mysql_free_result($files);

      ?>
      </tbody>
      </table>
    </div>
    <footer>
    </footer>
</body>
</html>