<html>
<body>
<?php

$vorname = $nachname = $strasse = $hausnummer = $plz = $ort = $land = $tel = $mail = $text = "";
$error ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["vorname"])){
        $error ="Dieses Feld ist ein Pflichtfeld."; //funktioniert nicht weil er immer die neue seite aufruft
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

$con = new mysqli ("localhost", "testuser","1234","Kontaktformular"); //die Datenbank muss dann jeder anlegen
$con->set_charset("UTF-8");
$pstm = $con->prepare("INSERT INTO kontaktformular(vorname,nachname,strasse,hausnummer,plz,ort,land,tel,mail,text) VALUES (?,?,?,?,?,?,?,?,?,?)");
$pstm->bind_param("sssiississ",$vorname,$nachname,$strasse,$hausnummer,$plz,$ort,$land,$tel,$mail,$text);
$pstm->execute();

$pstm->close();
$con->close();



?>



<?php
echo "<h2>Eingaben:</h2>";
echo "<br>";
echo $vorname;
echo "<br>";
echo $nachname;
echo "<br>";
echo $strasse;
echo "<br>";
echo $hausnummer;
echo "<br>";
echo $plz;
echo "<br>";
echo $ort;
echo "<br>";
echo $land;
echo "<br>";
echo $tel;
echo "<br>";
echo $mail;
echo "<br>";
echo $text;
?>
</body>
</html>