<?php
$url = "localhost";
$userbd = "root";
$passwodb = "";
$nombredb = "athnet";
$conn = mysqli_connect($url, $userbd, $passwodb, $nombredb) or die("Problemas con la connexion BD");
global $conn;

function login_athnet()
{
  global $conn;
  if (!isset($_POST["email"], $_POST["password"])) {
    return 1;
  }

  $stmt = mysqli_prepare($conn, "SELECT id_usuari, password FROM usuari WHERE email = ?");
  if (!$stmt) {
    die("Problemes en iniciar sessió: " . mysqli_error($conn));
  }

  mysqli_stmt_bind_param($stmt, "s", $_POST["email"]);
  if (!mysqli_stmt_execute($stmt)) {
    $error = mysqli_stmt_error($stmt);
    mysqli_stmt_close($stmt);
    die("Problemes en iniciar sessió: " . $error);
  }

  mysqli_stmt_bind_result($stmt, $id_usuari, $password_hash);
  if (mysqli_stmt_fetch($stmt) && password_verify($_POST["password"], $password_hash)) {
    $_SESSION["user"] = $id_usuari;
    mysqli_stmt_close($stmt);
    header("Location: profile.php");
    exit;
  }

  mysqli_stmt_close($stmt);
  return 1;
}
function register_athnet()
{
  global $conn;

  $required = ['nom', 'cognoms', 'username', 'email', 'password', 'password_confirm', 'data_naixement'];
  foreach ($required as $field) {
    if (empty($_POST[$field])) {
      return 0;
    }
  }

  if ($_POST['password'] !== $_POST['password_confirm']) {
    return 0;
  }

  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $club = isset($_POST['grup']) ? $_POST['grup'] : "N/A";

  $sql = "INSERT INTO usuari (nom, cognoms, username, email, password, data_naixement, id_club)
            VALUES (?, ?, ?, ?, ?, ?, (SELECT id_club FROM club WHERE nom = ?))";

  $stmt = mysqli_prepare($conn, $sql);
  if (!$stmt) {
    return 0;
  }

  mysqli_stmt_bind_param(
    $stmt,
    "sssssss",
    $_POST['nom'],
    $_POST['cognoms'],
    $_POST['username'],
    $_POST['email'],
    $password,
    $_POST['data_naixement'],
    $club
  );

  $ok = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  return $ok ? 1 : 0;
}
function get_UserInfo(){
  global $conn;
  $sql = "SELECT u.*, c.nom AS nom_club
          FROM usuari u
          LEFT JOIN club c ON u.id_club = c.id_club
          WHERE u.id_usuari = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $_SESSION['user']);
  mysqli_stmt_execute($stmt);
  
  $result = mysqli_stmt_get_result($stmt);
  $var = mysqli_fetch_array($result);
  mysqli_stmt_close($stmt);
  return $var;
}
function get_CompetitionInfo(){
  global $conn;
  $sql = "SELECT * FROM competicio LIMIT 2";
  $stmt = mysqli_prepare($conn,$sql);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $var = mysqli_fetch_array($result);
  mysqli_stmt_close($stmt);
  return $var;
}