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
function get_UserInfo()
{
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
function get_CompetitionInfo()
{
  global $conn;
  $sql = "SELECT * FROM competicio LIMIT 2";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $var = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_stmt_close($stmt);
  return $var;
}
function get_ActivitiesUser()
{
  # Activitats que realitza el usuar
  global $conn;
  $sql = "SELECT * FROM activitat WHERE id_usuari = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $_SESSION['user']);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $var = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_stmt_close($stmt);
  return $var;
}
function get_SumaryActivitiesKm()
{
  global $conn;
  $sql = "SELECT COALESCE(SUM(distancia), 0) AS total FROM activitat WHERE id_usuari = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $_SESSION['user']);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($result);
  mysqli_stmt_close($stmt);
  return (float) $row['total'];
}

function get_SumaryActivities()
{
  global $conn;
  $sql = "SELECT COALESCE(COUNT(distancia), 0) AS total FROM activitat WHERE id_usuari = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $_SESSION['user']);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($result);
  mysqli_stmt_close($stmt);
  return (float) $row['total'];
}
function get_PBActivitat()
{
  # PB de l'usuari: l'activitat amb millor ritme (durada / distància), sense competició
  global $conn;
  $sql = "SELECT id_activitat, tipus, durada, distancia, data
          FROM activitat
          WHERE id_usuari = ? AND distancia > 0
          ORDER BY durada / distancia ASC
          LIMIT 1";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $_SESSION['user']);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $pb = mysqli_fetch_assoc($result);
  mysqli_stmt_close($stmt);
  return $pb ?: null;
}
function get_NewestActivites()
{
  global $conn;
  $sql = "SELECT * FROM activitat WHERE id_usuari = ? ORDER BY data LIMIT 10 ";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $_SESSION['user']);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $var = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_stmt_close($stmt);
  return $var;
}
  function titleActivity($titol,$hores,$tipus){
    if(!isset($titol)){
      if($hores >= 6 && $hores < 12){
        $resultat = "Morning $tipus";
      }elseif($hores >= 12 && $hores < 14){
        $resultat = "Lunch $tipus";
      }elseif($hores >= 14 && $hores < 19){
        $resultat = "Afternoon $tipus";
      } elseif($hores >= 19 && $hores < 21){
        $resultat = "Evening $tipus";
      } else {
        $resultat = "Night $tipus";
      }
      return $resultat;
    }
  }
  function NewActivity($user, $titol,$tipus, $data, $data_sql, $durada, $distancia)
  {
    global $conn;
    $error = '';
    $tipus_valids = ['Run', 'Trail', 'Ciclying', 'Walk'];
    if (!in_array($tipus, $tipus_valids, true)) {
      $error = "Tipus d'activitat no vàlid.";
    } elseif (!$data || strtotime($data_sql) === false) {
      $error = "Data no vàlida.";
    } elseif (!is_numeric($distancia) || (float) $distancia <= 0) {
      $error = "La distància ha de ser un número més gran que 0.";
    } elseif ($durada <= 0) {
      $error = "El temps ha de ser més gran que 0.";
    } else {
      $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO activitat (id_usuari,titol, tipus, data, durada, distancia)
             VALUES (?, ?, ?, ?, ?, ?)"
      );
      $distancia = round((float) $distancia, 2);
      mysqli_stmt_bind_param($stmt, "issid", $user,$titol, $tipus, $data_sql, $durada, $distancia);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      return $error ?: null;
    }
  }
function Get_ActivitiesFromAllUsers($user){
  global $conn;
  $sql = "SELECT a.id_activitat, a.tipus, a.data, a.durada, a.distancia,
               u.nom, u.cognoms, u.username
        FROM activitat a
        JOIN usuari u ON u.id_usuari = a.id_usuari
        WHERE a.id_usuari <> ?
        ORDER BY a.data DESC
        LIMIT 50";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $user);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $activitats = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_stmt_close($stmt);
  return $activitats;
}
function Get_ActivitiesRecentActivities(){
  # Obté les 5 primeres activitats dels usuaris
  global $conn;
  $sql = "SELECT a.id_activitat, a.tipus, a.data, a.durada, a.distancia,
               u.nom, u.cognoms, u.username
        FROM activitat a
        JOIN usuari u ON u.id_usuari = a.id_usuari
        ORDER BY a.data DESC
        LIMIT 5";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $activitats = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_stmt_close($stmt);
  return $activitats;
}

function Get_Calendar(){
    global $conn;
  $sql = "SELECT * 
        FROM competicio";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $calendar = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_stmt_close($stmt);
  return $calendar;
}

function Get_CalendarByMonth($month, $year){
  global $conn;
  $sql = "SELECT * FROM competicio WHERE MONTH(data) = ? AND YEAR(data) = ?";
  $stmt = mysqli_prepare($conn, $sql);
   mysqli_stmt_bind_param($stmt,"i", (string) $month, (string) $year);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $calendar = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_stmt_close($stmt);
  return $calendar;
}



