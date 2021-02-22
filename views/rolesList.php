<html lang="pl-PL">

<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Lista aktorów</title>
</head>
<body>
<?php
include "topMenu.php";
?>
<main>
    <?php
    if(empty($_GET['a'])) {
        echo '<table border=1>';
        echo '<tr><th>Rola</th><th>Akcje</th></tr>';

        for ($i = 0; $i < $_SESSION['countRoles']; $i++) {
            $roles = unserialize($_SESSION['roles'][$i]);
            echo '<tr><td>';
            echo $roles->getROLA();
            echo '</td><td>';
            echo '<a href="index.php?action=rolesList&a=edit&id=' . $roles->getIDROLA() . '" class="smallButtonV2">Edytuj</a>';
            echo '<a href="index.php?action=rolesList&a=delete&id=' . $roles->getIDROLA() . '" class="smallButtonV2"> Usuń</a>';
            echo '</td></tr>';
        }
        echo '<a href="index.php?action=rolesList&a=add" class="smallButton">Dodaj rolę</a>';
    }else if($_GET['a'] == 'edit'){
        echo '<form action="index.php?action=rolesList&a=edit&id='.$_GET['id'].'" class="test2" method="POST">';
        echo '<input type="text" placeholder="Wpisz nową rolę" name="role">';

        echo '<div id="error">';
        if(!empty($_SESSION['error']))
            echo $_SESSION['error'];
        echo '</div>';

        echo '<input type="submit" value="Zmień rolę" class="submit" name="action">';
        echo '</form>';
    }else if($_GET['a'] == 'add'){
        echo '<form action="index.php?action=rolesList&a=add" class="test2" method="POST">';
        echo '<input type="text" placeholder="Wpisz nową rolę" name="role">';

        echo '<div id="error">';
        if(!empty($_SESSION['error']))
            echo $_SESSION['error'];
        echo '</div>';

        echo '<input type="submit" value="Dodaj rolę" class="submit" name="action">';
        echo '</form>';
    }
    ?>

</main>