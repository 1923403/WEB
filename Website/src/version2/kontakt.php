<?php include_once ("header.php"); ?>

<link rel="stylesheet" type="text/css" href="./css/contact.css" />
<title>Kontakt</title>
</head>
<body>
<?php include_once ("topleiste.php"); ?>

<?php
$vorname = $nachname = $strasse = $hausnummer = $plz = $ort = $land = $tel = $mail = $text = "";
$error ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["vorname"])){
        $error ="Dieses Feld ist ein Pflichtfeld."; 
    }else{
        $vorname = nutzerinput($_POST["vorname"]);
    }
    if(empty($_POST["nachname"])){
        $error ="Dieses Feld ist ein Pflichtfeld.";
    }else{
        $nachname = nutzerinput($_POST["nachname"]);
    }
    $strasse = nutzerinput($_POST["strasse"]);
    $hausnummer = nutzerinput($_POST["hausnummer"]);
    $plz = nutzerinput($_POST["plz"]);
    $ort = nutzerinput($_POST["ort"]);
    $land = nutzerinput($_POST["land"]);
    $tel = nutzerinput($_POST["tel"]);
    $mail = nutzerinput($_POST["mail"]);
    $text = nutzerinput($_POST["text"]);
}

function nutzerinput($data) {
  $data = trim($data);              //entfernt unnötige leerzeichen
  $data = stripslashes($data);      //entfernt backslashes(keine ahnung warum)
  $data = htmlspecialchars($data);  //Wandelt Zeichen um
  return $data;
}

//hiermit auf Datenbank schreiben
$con = new mysqli ("localhost", "testuser","1234","Kontaktformular"); //die Datenbank muss dann jeder anlegen
$con->set_charset("UTF-8");
$pstm = $con->prepare("INSERT INTO kontaktformular(vorname,nachname,strasse,hausnummer,plz,ort,land,tel,mail,text) VALUES (?,?,?,?,?,?,?,?,?,?)");
$pstm->bind_param("sssiississ",$vorname,$nachname,$strasse,$hausnummer,$plz,$ort,$land,$tel,$mail,$text);
$pstm->execute();

$pstm->close();
$con->close();

?>

    <main>
      <div class="content">
        <h1>Kontakt</h1>
        <form action="kontakt.php" method="post" autocomplete="on">
          <div class="form-container">
            <div class="form-group">
              <label for="vorname">Vorname:</label>
              <input id="vorname" type="text" name="vorname" />
              <span class="error">* <?php echo $error;?></span>
            </div>
            <div class="form-group">
              <label for="nachname">Nachname:</label>
              <input id="nachname" type="text" name="nachname" />
              <span class="error">* <?php echo $error;?></span>
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

