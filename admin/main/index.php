<?php
include("header.php");
?>
<br>
<div id="page-wrapper">
    <h2 class="col-sm-10"><b>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?></b> </h2>
</div>
<?php
include("footer.php");
?>