<?php

$nom      = "Anna";
$edat     = 20;
$correu   = "anna@example.com";
$telefon  = "";      
$nota     = 7;
$registre = null;

function siNo($valor) {
    return $valor ? "true" : "false";
}

if ($edat >= 18) {
    $missatgeEdat = "$nom és major d'edat ($edat anys).";
} else {
    $missatgeEdat = "$nom és menor d'edat ($edat anys).";
}

if ($nota < 5) {
    $qualificacio = "Suspès";
} elseif ($nota >= 5 && $nota < 7) {
    $qualificacio = "Aprovat";
} elseif ($nota >= 7 && $nota < 9) {
    $qualificacio = "Notable";
} else {
    $qualificacio = "Excel·lent";
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Exercici 2 – Comprovació i comparacions</title>
</head>
<body>
    <h1>Exercici 2 – Comprovació i comparacions amb variables</h1>

    <h2>Comprovació de variables</h2>
    <ul>
        <li>isset($nom): <?php echo siNo(isset($nom)); ?></li>
        <li>isset($registre): <?php echo siNo(isset($registre)); ?></li>
        <li>empty($telefon): <?php echo siNo(empty($telefon)); ?></li>
        <li>empty($correu): <?php echo siNo(empty($correu)); ?></li>
        <li>is_null($registre): <?php echo siNo(is_null($registre)); ?></li>
        <li>is_null($edat): <?php echo siNo(is_null($edat)); ?></li>
    </ul>

    <h2>Comparadors</h2>
    <ul>
        <li>$edat == "20": <?php echo siNo($edat == "20"); ?> (compara només el valor)</li>
        <li>$edat === "20": <?php echo siNo($edat === "20"); ?> (compara valor i tipus)</li>
        <li>$edat != 18: <?php echo siNo($edat != 18); ?></li>
        <li>$nota &lt; 5: <?php echo siNo($nota < 5); ?></li>
        <li>$nota &gt; 5: <?php echo siNo($nota > 5); ?></li>
        <li>$nota &lt;= 7: <?php echo siNo($nota <= 7); ?></li>
        <li>$nota &gt;= 9: <?php echo siNo($nota >= 9); ?></li>
    </ul>

    <h2>Condicions</h2>
    <ul>
        <li><?php echo $missatgeEdat; ?></li>
        <li>Nota <?php echo $nota; ?>: <?php echo $qualificacio; ?></li>
    </ul>

    <h2>Operadors lògics i validació</h2>
    <ul>
        <?php if (empty($telefon) && filter_var($correu, FILTER_VALIDATE_EMAIL)) { ?>
            <li>Avís: no has indicat telèfon, et contactarem pel correu <?php echo $correu; ?>.</li>
        <?php } ?>

        <?php if (is_null($registre) || !$registre) { ?>
            <li>Avís: l'usuari encara no té cap registre.</li>
        <?php } ?>
    </ul>
</body>
</html>