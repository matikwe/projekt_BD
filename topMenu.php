

<nav>
    <div class="menu">

        <a href="index.php?action=home" class="option">STRONA GŁÓWNA</a>
        <a href="index.php?action=search" class="option">WYSZUKIWARKA</a>

        <?php
        if(empty($_SESSION['idreff']) && empty($_SESSION['currID']))
        {
            echo ' <a href="index.php?action=adminPanel" class="option">PANEL ADMINA</a>';
            echo '<a href="index.php?action=login"><div class="option">LOGIN</div></a>';
        }else if ( !empty($_SESSION['currID'])){
            echo '<a href="index.php?action=login"><div class="option">LOGIN</div></a>';
        }else if (!empty($_SESSION['idreff'])){
            echo ' <a href="index.php?action=adminPanel" class="option">PANEL ADMINA</a>';
        }
        ?>
    </div>
</nav>
