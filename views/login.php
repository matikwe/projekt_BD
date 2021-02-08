<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Logowanie</title>
</head>
<body>
<?php
    include "topMenu.php";

    if(empty($_SESSION['currID']))
    {
?>
<main>
    <form action="index.php?action=login" class="test2" method="post">
        <input type="text" placeholder="Login" name="login" value="<?php if(!empty($_POST['login'])) echo $_POST['login']; ?>">
        <input type="password" placeholder="Hasło" name="password">

        <div id="error">
            <p><?php echo $_SESSION['error'];?></p>
        </div>

        <a href="index.php?action=registration" class="info">Nie masz konta? Zarejestruj się...</a>
        <input type="submit" value="Zaloguj" class="submit" name="buttonLogin">
    </form>

<?php }else {
        echo '<a href="index.php?action=logout">WYLOGUJ</a>';
    }
?>
</main>
