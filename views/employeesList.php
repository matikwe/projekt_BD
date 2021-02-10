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
        echo '<tr><th>LOGIN</th><th>ROLA</th><th>Akcje</th></tr>';

        for ($i = 0; $i < $_SESSION['countEmployees']; $i++) {
            $employees = unserialize($_SESSION['employees'][$i]);
            echo '<tr><td>';
            echo $employees->getLOGIN();
            echo '</td><td>';
            echo $employees->getIDROLA();
            echo '</td><td>';
            echo '<a href="index.php?action=employeesList&a=edit&id=' . $employees->getIDPRACOWNIK() . '">Edytuj</a>';
            echo '<a href="index.php?action=employeesList&a=delete&id=' . $employees->getIDPRACOWNIK() . '"> Usuń</a>';
            echo '</td></tr>';
        }
        echo'<a href="index.php?action=employeesList&a=add">Dodaj pracownika</a>';
    }else if($_GET['a'] == 'edit'){
        echo '<form action="index.php?action=employeesList&a=edit&id='.$_GET['id'].'" class="test2" method="POST">';
        echo'<select name="role">';

        for ($i = 0; $i < $_SESSION['countRoles']; $i++) {
            $roles = unserialize($_SESSION['roles'][$i]);
            echo '<option value="'.$roles->getIDROLA().'">'.$roles->getROLA().'</option>';
        }

        echo'</select>';

        echo '<div id="error">';
        if(!empty($_SESSION['error']))
            echo $_SESSION['error'];
        echo '</div>';

        echo '<input type="submit" value="Zmień rolę" class="submit" name="action">';
        echo '</form>';
    }else if($_GET['a'] == 'add'){
        echo '<form action="index.php?action=employeesList&a=add" class="test2" method="POST">';
        echo '<input type="text" placeholder="Wpisz login" name="login">';
        echo'<select name="role">';

        for ($i = 0; $i < $_SESSION['countRoles']; $i++) {
            $roles = unserialize($_SESSION['roles'][$i]);
            echo '<option value="'.$roles->getIDROLA().'">'.$roles->getROLA().'</option>';
        }

        echo'</select>';
        echo '<div id="error">';
        if(!empty($_SESSION['error']))
            echo $_SESSION['error'];
        echo '</div>';

        echo '<input type="submit" value="Dodaj pracownika" class="submit" name="action">';
        echo '</form>';
    }
    ?>

</main>
