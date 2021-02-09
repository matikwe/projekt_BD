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

<?php }
    else{

        echo '<a href="index.php?action=login&display=current">FILMY DO OBEJRZENIA</a>';
        echo '<br><a href="index.php?action=login&display=history">WYGASLE FILMY</a>';
        echo '<br><a href="index.php?action=logout">WYLOGUJ</a>';
        if(!empty($_GET['display'])){
            if($_SESSION['countMoviesV2'] <= 0){
                echo "Brak danych do wyświetlenia";
            }else {
                echo '<table border=1>';
                echo '<tr><th>TYTUL</th><th>KATEGORIA</th><th>ROK WYDANIA</th><th>DATA WYPOZYCZENIA</th><th>DATA WYGASNIECIA FILMU</th><th>CENA PO RABACIE</th></tr>';
                for($i = 0; $i < $_SESSION['countMoviesV2']; $i++){

                    echo '<tr><th>'.$movies[$i]->getTYTUL().'</th><th>'.$movies[$i]->getKATEGORIA().'</th><th>'.$movies[$i]->getROKWYDANIA().'</th><th>'.$movies[$i]->getDATAWYPOZYCZENIA().'</th><th>'.$movies[$i]->getDATAWYGASNIECIAFILMU().'</th><th>'.$movies[$i]->getCENA().' zł'.'</th></tr>';

                }
                echo '</table>';
            }
        }
    }

?>
</main>
