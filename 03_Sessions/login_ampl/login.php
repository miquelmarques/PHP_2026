<?php
session_start();
$account = ["user" => "u9272af1", "password" => "P@ssw0rd!"];
if (!isset($_SESSION["user"])) {
  if ($_POST["user"] === $account["user"] and $_POST["pass"] === $account["password"]) {
    
    $_SESSION["user"] = $_POST["user"];
  
  } else {
    header("Location:index.html");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Benvingut! <?php echo $_SESSION["user"] ?> :)</title>
  <style>
    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      min-height: 100vh;
      display: grid;
      place-items: center;
      font-family: system-ui, -apple-system, "Segoe UI", sans-serif;
      background: linear-gradient(135deg, #43cea2, #185a9d);
    }

    body>div {
      width: min(90vw, 460px);
      padding: 2.5rem 2rem;
      text-align: center;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
      animation: entra 0.5s ease-out;
    }

    h1 {
      margin: 0 0 1.5rem;
      font-size: 2rem;
      color: #185a9d;
      overflow-wrap: anywhere;
    }

    a {
      display: inline-block;
      padding: 0.7rem 1.5rem;
      color: #fff;
      background: #185a9d;
      text-decoration: none;
      font-weight: 600;
      border-radius: 8px;
      transition: background 0.2s;
    }

    a:hover {
      background: #134a80;
    }

    @keyframes entra {
      from {
        opacity: 0;
        transform: translateY(15px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>
  <div>
    <h1>Benvingut <?php echo $_SESSION["user"] ?>!</h1>
    <div>
      <a href="logout.php">Sortir</a>
    </div>
  </div>
</body>

</html>