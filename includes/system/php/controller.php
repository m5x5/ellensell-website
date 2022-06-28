<?php
require  'includes/system/config.conf';

function selected_img()
{
  global $sliderimg_path;

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
    "Praesenz Medien Kinder" => "Präsenz Medien Kinder",
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

// der content wird atomatisch geladen 
// wird ein link im style (?seite=...) geladen
// wird dieser in eine art iframe geladen 
function nav_content()
{
  global $content_path;
  if (isset($errorMessage)) {
    echo $errorMessage;
  }
  if (isset($_GET['seite'])) // abfrage ob ein link geklickt wurde
  {
    $get = $_GET['seite']; // der geklickte link wird in eine variable gespeichert
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
