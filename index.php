<?php
session_set_cookie_params(10800);
session_start();
?>
<!DOCTYPE html>
<html>
<?php include 'includes/system/php/controller.php'; ?>

<head>
  <meta charset="utf-8">
  <title>Startseite, Ellen Sell, Autorin, Hamburg</title>
  <meta name="Keywords" content="Ellen Sell, Sell, Ellen, Sell Ellen, Kinderbuch, Kinderbuch Autorin, Kinderbuchautorin, Kurzprosa, Jury-Mitarbeit, Pauline, Knabberschreck, Labradorhündin, Fleurie, Jorass, Yvonne, Stachelbeere, Gnufii, Lese-Zwerge, Margaux-Luis, Chablis, Seiteneinsteiger, Rupamu, Kriegskinder, Themenabend," />
  <meta name="Description" content="Beste Kinderbuch Autorin Ellen Sell, Mitglied der Hamburger Autorenvereinigung, Liebe zu Kindern und Tieren, Lesungen für Kinder in den Öffentlichen Bücherhallen, Labrador-Retriever-Hunde als Überraschungsgäste, Kriegskinder in ..und Bosnien nicht zu vergessen, Herta Sorge, Kindertage, die Anthologie, die die Hamburger Autorenvereinigung" />
  <meta name="author" content="Ellen Sell">
  <link href="includes/system/css/style.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <header>
    <?php include $path . '/header.php'; ?>
  </header>

  <nav>
    <a href="?seite=Startseite">Home</a>
    <a href="?seite=ueber_Ellen_Sell">ueber Ellen Sell</a>
    <a href="?seite=Aktuelles">Aktuelles</a>
    <div class="dropdown">
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
    </div>

    <div class="dropdown">
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
    </div>
    <a href="?seite=Kontakt">Kontakt</a>
    <a href="?seite=Impressum">Impressum</a>
  </nav>

  <main class="row">
    <?php nav_content(); ?>
  </main>

  <footer>
    <?php include $path . '/footer.php'; ?>
  </footer>

</body>

</html>