<?php

$nom = "Anna";
$edat_str = "20";
$nota_float = 8.5;
$aprovat = true;

$edat = (int) $edat_str;

$suma = $edat + $nota_float;

$edat_com_string = strval($edat);
$nota_com_int = intval($nota_float);

$suma_implicita = $edat_str + $nota_float;

?>
<!DOCTYPE html>
<html lang="ca">
<head>
 <meta charset="UTF-8">
    <title>Exercici 1 – Variables i conversió de tipus</title>
</head>
<body>
    <h1>Exercici 1 – Variables i conversió de tipus</h1>
 
    <h2>Dades de l'alumne</h2>
    <p>Nom: <?php echo $nom; ?></p>
    <p>Edat: <?php echo $edat; ?></p>
    <p>Nota: <?php echo $nota_float; ?></p>
    <p>Suma edat + nota: <?php echo $suma; ?></p>
 
    <h2>Resultat</h2>
    <?php if ($aprovat) { ?>
        <p>L'alumne ha aprovat.</p>
    <?php } else { ?>
        <p>L'alumne ha suspès.</p>
    <?php } ?>

   <h2>Conversions de tipus</h2>
    <p>
        Edat original: "<?php echo $edat_str; ?>" (<?php echo gettype($edat_str); ?>)
        → <?php echo $edat; ?> (<?php echo gettype($edat); ?>)

        </p>
    <p>
        Edat convertida a string amb strval(): "<?php echo $edat_com_string; ?>"
        (<?php echo gettype($edat_com_string); ?>)
    </p>
    <p>
        Nota convertida a integer amb intval(): <?php echo $nota_com_int; ?>
        (<?php echo gettype($nota_com_int); ?>)
    </p>
    <p>
        Conversió implícita ("20" + 8.5): <?php echo $suma_implicita; ?>
        (<?php echo gettype($suma_implicita); ?>)
    </p>
</body>
</html>