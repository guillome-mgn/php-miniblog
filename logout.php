<?php
require 'libs/header.php';
require 'libs/user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    logout();
}
?>

<h2>Deconnexion</h2>
<form method="POST">
    <input type="hidden" name="logout" value="true">
    <button type="submit">Se deconnecter</button>
</form>