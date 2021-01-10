<!-- <!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="./css/global.css" /> -->

    <?php include_once ("header.php"); ?>

    <link rel="stylesheet" type="text/css" href="./css/contact.css" />
    
    <title>Kontakt</title>
  </head>
  <body>

  <?php include_once ("topleiste.php"); ?>
<!--     <header>
      <nav>
        <ul>
          <li><a href="index.html">&Uuml;ber uns</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-button">Team</a>
            <div class="dropdown-content">
              <a href="./profile/tBenrath.html">Tobias Benrath</a>
              <a href="./profile/zFirat.html">Zahid Firat</a>
              <a href="./profile/sHausmann.html">Steffen Hausmann</a>
              <a href="./profile/mHehl.html">Maximilian Hehl</a>
              <a href="./profile/mHuber.html">Markus Huber</a>
            </div>
          </li>
          <li id="contact"><a href="contact.php">Kontakt</a></li>
        </ul>
      </nav>
    </header> -->
    <main>
      <div class="content">
        <h1>Kontakt</h1>
        <form action="kontakt.php" method="post" autocomplete="on">
          <div class="form-container">
            <div class="form-group">
              <label for="vorname">Vorname:</label>
              <input id="vorname" type="text" name="vorname" />
            </div>
            <div class="form-group">
              <label for="nachname">Nachname:</label>
              <input id="nachname" type="text" name="nachname" />
            </div>
            <div class="form-group">
              <label for="strasse">Stra&szlig;e:</label>
              <input id="strasse" type="text" name="strasse" />
            </div>
            <div class="form-group">
              <label for="hausnummer">Hausnummer:</label>
              <input id="hausnummer" type="text" name="hausnummer" />
            </div>
            <div class="form-group">
              <label for="plz">PLZ:</label>
              <input id="plz" type="number" name="plz" />
            </div>
            <div class="form-group">
              <label for="ort">Ort:</label>
              <input id="ort" type="text" name="ort" />
            </div>
            <div class="form-group">
              <label for="land">Land:</label>
              <input id="land" type="text" name="land" />
            </div>
            <div class="form-group">
              <label for="tel">Telefonnummer:</label>
              <input id="tel" type="tel" name="tel" />
            </div>
            <div class="form-group">
              <label for="mail">E-Mail:</label>
              <input id="mail" type="email" name="mail" />
            </div>
            <div class="form-group">
              <label for="text">Ihre Anfrage:</label>
              <textarea id="text" name="text"></textarea>
            </div>
          </div>
          <div class="form-button">
            <button id="submit" type="submit">Absenden</button>
            <button id="reset" type="reset">Zur&uuml;cksetzen</button>
          </div>
        </form>
      </div>
    </main>

    <?php include_once ("footer.php"); ?>
<!--      <footer>
      <ul>
        <li><a href="impressum.html">Impressum</a></li>
        <li><a href="datenschutz.html">Datenschutz</a></li>
      </ul>
    </footer>
  </body>
</html> -->
 