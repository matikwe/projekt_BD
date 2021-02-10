<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Rejestracja</title>
</head>
<body>
<main>
    <h1>Zmień twoje domyślne hasło !</h1>
    <form action="index.php?action=editPassword" class="test2" method="POST">

        <input type="password" placeholder="Wpisz hasło" name="passwordA">
        <input type="password" placeholder="Powtórz hasło" name="passwordB">

        <div id="error">
            <p><?php if(!empty($_SESSION['error'])) echo $_SESSION['error'];?></p>
        </div>

        <input type="submit" value="Zmień hasło" class="submit" name="action">
    </form>
</main>