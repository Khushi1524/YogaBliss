<?php
if (!isset($logopath)) {
    $logopath = "./assets/";
    $path = '.';
} else {
    $path = "..";
}
?>
<nav>
    <h3><i class="ri-menu-fill" onclick="menuopen() "></i>
    <img src="<?php echo $logopath ?>logo.png" alt="">
    </h3>
    <span class="links" id="menu">
        <a href="<?php echo $path ?>/index.php">Home</a>
        <a href="<?php echo $path ?>/admin.php">Admin</a>
        <a href="<?php echo $path ?>/Resources.php">Resources</a>
        <a href="<?php echo $path ?>/Meditation.php">Meditation</a>
        <a href="<?php echo $path ?>/articles.php">Articles</a>
        <a href="<?php echo $path ?>/activity.php">MyActivity</a>
        <a href="<?php echo $path ?>/forum.php">Forum</a>
    </span>
    <span class="login">
        <?php


        if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
            echo $_SESSION['name'] . " - <a href='" . $path . "/php/logout.php'>Logout</a>";
        } else {
            echo "<a href='" . $path . "/login.php'>Login</a>";
        }
        ?>
    </span>
</nav>

<script>
    function menuopen() {
        document.getElementById('menu').style.right = "0"
    }

    function menuclose() {
        document.getElementById('menu').style.right = "-150vw"
    }
</script>