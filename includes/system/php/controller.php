<?php
require  'includes/system/config.conf';

function selected_img()
{
  global $sliderimg_path;
  global $typ;
  $verzeichnis = $sliderimg_path;
  if (isset($_GET['seite'])) //abfrage ob ein link geklickt wurde
  {
    return $verzeichnis . '/' . $_GET['seite'] . '.JPG';
  } else {
    return $verzeichnis . '/valpen_jorass_kvadrat.jpg';
  }
}


function capitalize_after_space($string)
{
  // Slice the string into an array of words
  $words = explode(' ', $string);

  $new_string = '';
  // Loop through the words
  foreach ($words as $word) {
    // Capitalize the first letter of each word
    $new_string .= ucfirst($word) . ' ';
  }

  // Remove the trailing space and return
  return rtrim($new_string);
}

function replace_strokes_and_underscores($string)
{
  $string = str_replace('_', ' ', $string);
  $string = str_replace('-', ' ', $string);

  return $string;
}

function seiten_name()
{
  global $seitennamen;

  $seitennamen = array(
    'Ueber Ellen Sell' => 'ueber Ellen Sell',
    'Kinderbuecher' => 'Kinderbücher',
    'Praesenz Medien' => 'Präsenz Medien',
    'Projekte Erwachsene' => 'Projekte Jugendliche & Erwachsene',
    'Lesungen Erwachsene' => 'Lesungen Jugendliche & Erwachsene',
    'Jury Erwachsene' => 'Jury Jugendliche & Erwachsene',
    'Links Erwachsene' => 'Links Jugendliche & Erwachsene',
  );

  if (isset($_GET['seite'])) { //abfrage ob ein link geklickt wurde
    $seite = $_GET['seite'];

    // Ersten Buchstaben groß schreiben
    $seite = ucfirst($seite);

    $seite = replace_strokes_and_underscores($seite);
    // Nach dem ersten Leerzeichen groß schreiben
    $seite = capitalize_after_space($seite);


    if (array_key_exists($seite, $seitennamen)) {
      return $seitennamen[$seite];
    } else {
      return $seite;
    }
  } else {
    return 'Home';
  }
}

function random_img()
{
  global $img_path;
  global $typ;
  $verzeichnis = opendir($sliderimg_path);
  $bilder = array();
  while ($datei = readdir($verzeichnis)) {
    //Dateiendung rausfiltern
    $datei_endung = substr(strrchr($datei, '.'), 1);
    if (in_array($datei_endung, $typ)) {
      $bilder[] = $datei;
    }
  }
  //Verzeichnis schließen
  closedir($verzeichnis);
  srand((float) microtime() * 10000000);
  $key = array_rand($bilder);
  return $sliderimg_path . '/' . $bilder[$key];
}

//funktion der navigation auf der seite 
//sie wird automatisch erstellt an der anzahl der datein im ordner content
//der linkname wird durch den dateinamen übernommen
function nav()
{
  global $nav_ausnahmen;
  global $content_path;
  echo '<a href="?seite=Startseite">Home</a>'; //home link wird manuel erstellt damit er immer an der ersten stelle ist
  $handle = scandir($content_path, 1); //ordner auslesen und sortieren. Die 1 steht für z-a
  foreach ($handle as $datei) //schleifenanfang
  {
    $dateiinfo = pathinfo($content_path . "/" . $datei); // formatierung /slasch zwischen ordner und datei
    if (
      $datei != "." && $datei != ".."  && $datei != "_notes" && $datei != "Startseite.php" &&
      $datei != "kinderbuecher.php" && $datei != "projekte_kinder.php" && $datei != "lesungen_kinder.php" &&
      $datei != "praesenz_medien_kinder.php" && $datei != "jury_kinder.php" && $datei != "rezensionen_kinder.php" &&
      $datei != "kurzprosa.php" && $datei != "projekte_erwachsene.php" && $datei != "links_kinder.php" &&
      $datei != "web_lesungen.php" && $datei != "moderationen.php" && $datei != "lesungen_erwachsene.php" &&
      $datei != "links_erwachsene.php" && $datei != "praesenz_medien.php" && $datei != "jury_erwachsene.php" &&
      $datei != "Biografien.php" && $datei != "Impressum.php" && $datei != "Kontakt.php"
    ) // Ausnahmen für die Ausgabe
    {
      echo '<a href="?seite=' . $dateiinfo['filename'] . '">' . $dateiinfo['filename'] . '</a>'; // schleifeausgabe
    }
  }
  echo '<div class="dropdown">
		<a class="dropbtn">Kinder</a>
		<div class="dropdown-content">
			<a href="?seite=kinderbuecher">Kinderbücher</a>
			<a href="?seite=projekte_kinder">Projekte</a>
			<a href="?seite=lesungen_kinder">Lesungen</a>
			<a href="?seite=rezensionen_kinder">Rezensionen</a>
			<a href="?seite=jury_kinder">Jury-Mitarbeit</a>
			<a href="?seite=praesenz_medien_kinder">Präsenz in Medien</a>
			<a href="?seite=links_kinder">Links</a>
		</div>
	   </div>';

  echo '<div class="dropdown">
		<a class="dropbtn">Jugendliche & Erwachsene</a>
		<div class="dropdown-content">
			<a href="?seite=kurzprosa">Kurzprosa</a>
			<a href="?seite=Biografien">Biografien</a>
			<a href="?seite=projekte_erwachsene">Projekte</a>
			<a href="?seite=lesungen_erwachsene">Lesungen</a>
			<a href="?seite=moderationen">Moderationen</a>
			<a href="?seite=web_lesungen">Web-Lesungen</a>
			<a href="?seite=jury_erwachsene">Jury-Mitarbeit</a>
			<a href="?seite=praesenz_medien">Präsenz in Medien</a>
			<a href="?seite=links_erwachsene">Links</a>
		</div>
	   </div>';
  echo '<a href="?seite=Kontakt">Kontakt</a>';
  echo '<a href="?seite=Impressum">Impressum</a>';
}


//
//der content wird atomatisch geladen 
//wird ein link im style (?seite=...) geladen
//wird dieser in eine art iframe geladen 
function nav_content()
{
  global $content_path;
  if (isset($errorMessage)) {
    echo $errorMessage;
  }
  if (isset($_GET['seite'])) //abfrage ob ein link geklickt wurde
  {
    $get = $_GET['seite']; //der geklickte link wird in eine variable gespeichert
    include $content_path . '/' . $get . '.php'; // und die seite wird in den content geladen
  } else {
    include $content_path . '/Startseite.php'; // sonst laden wir den startcontent 
  }
}


function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function besucherzahl()
{
  $counterstand = intval(file_get_contents("counter.txt"));

  if (!isset($_SESSION['counter_ip'])) {
    $counterstand++;
    file_put_contents("counter.txt", $counterstand);

    $_SESSION['counter_ip'] = true;
  }

  return $counterstand;
}
