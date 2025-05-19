<?php
/* require('./db.php'); */
require_once __DIR__ . '/../php_sup/pdo.php';

$isLoggedIn = false;
$loginError = '';

if (!empty($_POST['login']) && !empty($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = $pdo->prepare('SELECT * FROM connexion WHERE login = :login');
    $query->bindValue('login', $login);
    $query->execute();
    $results = $query->fetch(PDO::FETCH_ASSOC);

    if ($results && password_verify($password, $results['password'])) {
        $isLoggedIn = true;
    } else {
        $loginError = "Invalid login or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Premium Information All Star Tower Rater</title>
  <meta name="description" content="Access premium features documentation. Learn how to unlock advanced analysis, filtering, and team optimization for ASTD units." >
  <link href="/All_Star_Tower_Rater/assets/css/style_general.css" rel="stylesheet" />
  <link href="/All_Star_Tower_Rater/assets/css/style_premium.css" rel="stylesheet" />
  <link rel="icon" href="/All_Star_Tower_Rater/assets/images/favicon_local.ico">
  <script src="https://cdn.lordicon.com/lordicon.js"></script>
</head>

<body>
<?php include __DIR__ . "/../php_sup/header.php"; ?>

<main>
  <h1>All Star Tower Rater - Premium Links</h1>
  
  <?php if (!$isLoggedIn): ?>
    <section>
      <p class="little-div">Please log in to be authentified as a trusted player in order to access to premium documentation.</p>
      <form method="POST" action="">
        <label for="login" class="left">Login</label>
        <input class="left" type="text" placeholder="User" name="login" id="login" required><br>
        <label for="password" class="left">Password</label>
        <input type="password" placeholder="password" name="password" id="password" class="password left" required>
<lord-icon class="eye open"
    src="https://cdn.lordicon.com/dicvhxpz.json"
    trigger="hover"
    stroke="bold"
    state="hover-lashes"
    colors="primary:#121331,secondary:#5a41d4"
    style="width:25px;height:25px">
</lord-icon>
<lord-icon class="eye closed"
    src="https://cdn.lordicon.com/dicvhxpz.json"
    trigger="hover"
    stroke="bold"
    colors="primary:#121331,secondary:#5a41d4"
    style="width:25px;height:25px">
</lord-icon><br>
        <button class="left send" type="submit">Connexion</button>
        <?php if ($loginError): ?>
          <p class="error"><?= htmlspecialchars($loginError) ?></p>
        <?php endif; ?>
      </form>
    </section>
  <?php else: ?>
    <section class="terms" id="contenu">
      <?php
        // Tu peux replacer ici ta requête glossary, maintenant que l’utilisateur est authentifié
        $stmt = $pdo->query("SELECT * FROM premium_links ORDER BY id");
        $linksData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($linksData as $entry) {
          $term = htmlspecialchars($entry['name']);
          $definition = htmlspecialchars($entry['description']);
          $link = htmlspecialchars($entry['links']);
          echo "<div class=\"term\">\n";
          echo "  <h2>$term</h2>\n";
          echo "  <p>$definition</p>\n";
          echo " <a href=".$link." target='_blank' rel='noreferrer noopener'>-> Ouvrir le document dans un nouvel onglet</a>\n";
          echo "</div>\n";
        }
      ?>
    </section>
  <?php endif; ?>
</main>

<?php include __DIR__ . "/../php_sup/footer.php"; ?>
</body>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const closedAi = document.querySelector('.closed');
    const openAi = document.querySelector('.open');
    const password = document.querySelector('.password');

document.querySelectorAll(".eye").forEach(eye => {
  eye.addEventListener('click', () => {
    const isClosedHidden = getComputedStyle(closedAi).display === 'none';

    if (isClosedHidden) {
      closedAi.style.display = 'inline-block';
      openAi.style.display = 'none';
      password.setAttribute('type', 'text');
    } else {
      closedAi.style.display = 'none';
      openAi.style.display = 'inline-block';
      password.setAttribute('type', 'password');
    }
  });
  });
  });
</script>
</html>
