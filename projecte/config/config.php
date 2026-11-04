<?php
$url = "localhost";
$userbd = "root";
$passwodb = "";
$nombredb = "athnet";
$conn = mysqli_connect($url, $userbd, $passwodb, $nombredb) or die("Problemas con la connexion BD");


function login_athnet()
{
  global $conn;
  if (isset($_POST["email"]) and isset($_REQUEST["password"])) {
    $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
    $resultat = mysqli_query($conn, "SELECT id FROM usuari WHERE email=" . $_REQUEST['email'] . " AND password =" . $password . ";")
      or die("Problemas en el insert" . mysqli_error($conn));
    if (isset($resultat)) {
      $_SESSION['user'] = $resultat;
      header("Location: profile.php");
    } else {
      return 1;
    }
    mysqli_close($conn);
  }
}
function resgiter_athnet(){
  $insert="INSERT INTO `usuari`(nom, cognoms, username, email, password, data_naixement, id_club, data_registre) VALUES ('?','?','?','?','?','?','?','?')"
  global $conn;
  if (isset($_REQUEST["nom"]) and isset($_REQUEST['cognoms']) 
      and isset($_REQUEST["username"]) and isset($_REQUEST['email']) 
      and isset($_REQUEST['password']) and  isset($_REQUEST['password_confirm']) 
      and isset($_REQUEST['data_neixament'])) {
        if ($_REQUEST['password'] == $_REQUEST['password_confirm']){
            $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
            mysqli_prepare($conn,$insert);
            if ($_REQUEST['grup'])
        }


}
