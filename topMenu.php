

<nav>
    <div class="menu">
        <a href="index.php?action=home" class="option">STRONA GŁÓWNA</a>
        <?php
        if(empty($_SESSION['currID']))
            {
                echo '<a href="index.php?action=login"><div class="option">LOGIN</div></a>';
            }else{
                echo '<a href="index.php?action=logout"><div class="option">WYLOGUJ</div></a>';
            }
        ?>
    </div>
</nav>
