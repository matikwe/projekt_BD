<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Panel</title>
</head>
<body>
<?php
include "topMenu.php";
?>

<main>
    <?php
    if(empty($_SESSION['idreff']))
    {
    ?>
        <form action="index.php?action=adminPanel" class="test2" method="post">
            <input type="text" placeholder="Login" name="login" value="<?php if(!empty($_POST['login'])) echo $_POST['login']; ?>">
            <input type="password" placeholder="Hasło" name="password">

            <div id="error">
                <p><?php echo $_SESSION['error'];?></p>
            </div>

            <input type="submit" value="Zaloguj" class="submit" name="buttonLogin">
        </form>

    <?php
    }else{
    ?>

        <a href="index.php?action=partnerProgram" class="smallButton">Program partnerski</a>
        <a href="index.php?action=employeesList" class="smallButton">Lista pracowników</a>
        <a href="index.php?action=rolesList" class="smallButton">Lista ról</a>
        <a href="index.php?action=moviesList" class="smallButton">Lista filmów</a>
        <a href="index.php?action=actorsList" class="smallButton">Lista aktorów</a>
        <a href="index.php?action=categoriesList" class="smallButton">Lista kategorii</a>
        <a href="index.php?action=directorsList" class="smallButton">Lista reżyserów</a>
        <a href="index.php?action=logout" class="smallButton">WYLOGUJ</a>
    </main>
<?php } ?>