<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Rejestracja</title>
</head>
<body>
<?php
include "topMenu.php";
?>

<main>
    <form action="index.php?action=registration" class="test2" method="POST">
        <input type="text" placeholder="Wpisz login" name="login" value="<?php if(!empty($_POST['login'])) echo $_POST['login']; ?>">
        <input type="password" placeholder="Wpisz hasło" name="passwordA">
        <input type="password" placeholder="Powtórz hasło" name="passwordB">
        <input type="text" placeholder="Wpisz imie" name="name" value="<?php if(!empty($_POST['name'])) echo $_POST['name']; ?>">
        <input type="text" placeholder="Wpisz nazwisko" name="surname" value="<?php if(!empty($_POST['surname'])) echo $_POST['surname']; ?>">
        <input type="text" placeholder="Wpisz mail" name="mailA" value="<?php if(!empty($_POST['mailA'])) echo $_POST['mailA']; ?>">
        <input type="text" placeholder="Powtórz mail" name="mailB" value="<?php if(!empty($_POST['mailB'])) echo $_POST['mailB']; ?>">
        <input type="date" name="date" value="" min="2000-01-01" max="2019-12-31">

        <div id="error">
            <p><?php echo $_SESSION['error'];?></p>
        </div>

        <input type="submit" value="Zarejestruj" class="submit" name="action">
    </form>
</main>
