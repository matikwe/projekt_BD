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
    if(empty($_SESSION['ReffID']))
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

        </main>
<?php } ?>