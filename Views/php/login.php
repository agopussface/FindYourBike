<!DOCTYPE html>
<html>

<head>
  <title>Page de connexion</title>
</head>

<body>
  <h2>consultacc</h2>
  <form action="check/checkConsLogin.php" method="post">
    <label for="username">Nom d'utilisateur:</label>
    <input type="text" id="consUsername" name="consUsername" oninput="blockInput()"><br><br>

    <label for="password">Mot de passe:</label>
    <input type="password" id="consPassword" name="consPassword"><br><br>

    <input type="submit" id="consBtn" value="Se connecter">
  </form>

  <h2>entryacc</h2>
  <form action="check/checkEntrLogin.php" method="post">
    <label for="username">Nom d'utilisateur:</label>
    <input type="text" id="entrUsername" name="entrUsername" oninput="blockInput()"><br><br>

    <label for="password">Mot de passe:</label>
    <input type="password" id="entrPassword" name="entrUsername"><br><br>

    <input type="submit" id="entrBtn" value="Se connecter">
  </form>

  <script>
 function blockInput() {
  
  if (consUsername.value.length > 0) {
    entrUsername.disabled = true;
    entrPassword.disabled = true;
    entrBtn.disabled = true;
  } else {
    entrUsername.disabled = false;
    entrPassword.disabled = false;
    entrBtn.disabled = false;
  }

  if (entrUsername.value.length > 0) {
    consUsername.disabled = true;
    consPassword.disabled = true;
    consBtn.disabled = true;
    
  } else {
    consUsername.disabled = false;
    consPassword.disabled = false;
    consBtn.disabled = false;
  }
}

  </script>
</body>

</html>