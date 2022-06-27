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
  <link href="includes/system/js/js.js" rel="javascript">
</head>

<body>
  <header>
    <?php include $path . '/header.php'; ?>
  </header>

  <nav>
    <div class="desktop_nav">
      <?php nav(); ?>
    </div>

    <div class="mobile_nav">
      <div class="dropdown-mobile_nav">
        <a class="dropbtn"  style="font-size: 4rem">&equiv;</a>
        <div class="dropdown-mobile_nav-content">
          <?php nav(); ?>
        </div>
      </div>
    </div>
  </nav>

  <main class="row">
    <?php nav_content(); ?>
  </main>

  <footer>
    <?php include $path . '/footer.php'; ?>
  </footer>

</body>

</html>