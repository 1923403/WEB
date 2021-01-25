<?php include_once ("header.php"); ?>

<link rel="stylesheet" type="text/css" href="./css/contact.css" />
<title>Kontakt</title>
</head>
<?php include_once ("navBar.php"); ?>

<?php
$vorname = $nachname = $strasse = $hausnummer = $plz = $ort = $land = $tel = $mail = $text = "";
$error = $vornameErr = $nachnameErr = $mailErr ="";

$checkreq = array("temp"=>false,"temp2"=>false,"temp3"=>false);  //array mit boolean Variablen

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["vorname"])){
        $error ="Dieses Feld ist ein Pflichtfeld."; 
    }else{
        $vorname = nutzerinput($_POST["vorname"]);
        $checkreq[0]=true;
        if (!preg_match("/^[a-zA-Z-' ]*$/", $vorname)) {
          $vornameErr = "Nur Buchstaben erlaubt";
      }
    }
    if(empty($_POST["nachname"])){
        $error ="Dieses Feld ist ein Pflichtfeld.";
    }else{
        $nachname = nutzerinput($_POST["nachname"]);
        $checkreq[1] = true;
        if (!preg_match("/^[a-zA-Z-' ]*$/", $nachname)) {
          $nachnameErr = "Nur Buchstaben erlaubt";
      }
    }
    $strasse = nutzerinput($_POST["strasse"]);
    $hausnummer = nutzerinput($_POST["hausnummer"]);
    $plz = nutzerinput($_POST["plz"]);
    $ort = nutzerinput($_POST["ort"]);
    $land = nutzerinput($_POST["land"]);
    $tel = nutzerinput($_POST["tel"]);
    if(empty($_POST["mail"])){
      $error ="Dieses Feld ist ein Pflichtfeld.";
    }else{
      $mail = nutzerinput($_POST["mail"]);
      $checkreq[2] = true;
      if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $mailErr = "Ungültige E-Mail-Adresse";
    }
    }
    $text = nutzerinput($_POST["text"]);
}

function nutzerinput($data) {
  $data = trim($data);              
  $data = stripslashes($data);      
  $data = htmlspecialchars($data);  
  $data = htmlentities($data);
  return $data;
}

if($checkreq[0]==true && $checkreq[1]==true && $checkreq[2]){ 
  
  $con = new MySQLi ("localhost", "root","","kontaktformular"); 
  if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }
  $con->set_charset("UTF-8");
  $pstm = $con->prepare("INSERT INTO kontaktformular(vorname,nachname,strasse,hausnummer,plz,ort,land,tel,mail,text) VALUES (?,?,?,?,?,?,?,?,?,?)");
  $pstm->bind_param("sssiisssss",$vorname,$nachname,$strasse,$hausnummer,$plz,$ort,$land,$tel,$mail,$text);
  $pstm->execute();

  $pstm->close();
  $con->close();
  $vorname = $nachname = $strasse = $hausnummer = $plz = $ort = $land = $tel = $mail = $text = "";
  echo "<div style=\"margin-top:50px\"><p>hat funktioniert...</p></div>";
}

?>

    <main>
      <div class="content">
        <h1>Kontakt</h1>
        <form action="kontakt.php" method="post" autocomplete="on">
          <div class="form-container">
            <div class="form-group">
              <label for="vorname">Vorname:</label>
              <input id="vorname" type="text" name="vorname" value="<?php echo $vorname; ?>"/>
              <?php 
                if($vornameErr !=""){
                  echo "<span class=\"error\"> *"; 
                  echo $vornameErr;
                  echo "</span>";
                }
                elseif($error !=""){
                  echo "<span class=\"error\"> *"; 
                  echo $error;
                  echo "</span>";
                }
                ?>
            </div>
            <div class="form-group">
              <label for="nachname">Nachname:</label>
              <input id="nachname" type="text" name="nachname" value="<?php echo $nachname; ?>"/>
              <?php 
                if($nachnameErr !=""){
                  echo "<span class=\"error\"> *"; 
                  echo $nachnameErr;
                  echo "</span>";
                }
                elseif($error !=""){
                  echo "<span class=\"error\"> *"; 
                  echo $error;
                  echo "</span>";
                }
                ?>
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
              <?php 
                if($mailErr !=""){
                  echo "<span class=\"error\"> *"; 
                  echo $mailErr;
                  echo "</span>";
                }
                elseif($error !=""){
                  echo "<span class=\"error\"> *"; 
                  echo $error;
                  echo "</span>";
                }
              ?>
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

