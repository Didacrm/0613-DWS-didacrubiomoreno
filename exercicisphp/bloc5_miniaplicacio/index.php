<?php



function esMajorEdat($edat) {
    return $edat >= 18;
}

function mitjana($notes) {
    $suma = 0;
    foreach ($notes as $n) {
        $suma += $n;
    }
    return $suma / count($notes);
}

function qualificacio($mitjana) {
    if ($mitjana < 5) {
        return "Suspès";
    } elseif ($mitjana < 7) {
        return "Aprovat";
    } elseif ($mitjana < 9) {
        return "Notable";
    } else {
        return "Excel·lent";
    }
}


$errors  = [];
$enviat  = false;
$nom     = "";
$edat    = "";
$numero  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom    = trim($_POST["nom"] ?? "");
    $edat   = trim($_POST["edat"] ?? "");
    $numero = trim($_POST["numero"] ?? "");

    if ($nom === "") {
        $errors[] = "El nom no pot estar buit.";
    }

    if ($edat === "") {
        $errors[] = "L'edat no pot estar buida.";
    } elseif (filter_var($edat, FILTER_VALIDATE_INT, ["options" => ["min_range" => 0, "max_range" => 120]]) === false) {
        $errors[] = "L'edat ha de ser un número enter entre 0 i 120.";
    }

    if ($numero === "") {
        $errors[] = "El número no pot estar buit.";
    } elseif (filter_var($numero, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1, "max_range" => 10]]) === false) {
        $errors[] = "El número ha de ser un enter entre 1 i 10.";
    }

    if (count($errors) == 0) {
        $edat   = (int)$edat;
        $numero = (int)$numero;
        $enviat = true;
    }
}

$notes = [
    "Matemàtiques" => 6,
    "Català"       => 7.5,
    "Anglès"       => 8
];
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Exercici 5 – Miniaplicació PHP</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 20px auto; }
        label { display: block; margin-top: 10px; }
        input { padding: 5px; width: 200px; }
        button { margin-top: 15px; padding: 6px 15px; }
        .error { color: red; }
        .resultat { margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Miniaplicació PHP</h1>

    <form method="post" action="">
        <label>Nom:
            <input type="text" name="nom" value="<?php echo htmlspecialchars($nom); ?>">
        </label>
        <label>Edat:
            <input type="number" name="edat" min="0" max="120" value="<?php echo htmlspecialchars($edat); ?>">
        </label>
        <label>Número (1-10):
            <input type="number" name="numero" min="1" max="10" value="<?php echo htmlspecialchars($numero); ?>">
        </label>
        <button type="submit">Enviar</button>
    </form>

    <?php if (count($errors) > 0) { ?>
        <div class="error">
            <?php foreach ($errors as $error) { ?>
                <p><?php echo $error; ?></p>
            <?php } ?>
        </div>
    <?php } ?>

    <?php if ($enviat) { ?>
        <div class="resultat">
            <p>Hola <?php echo htmlspecialchars($nom); ?>, tens <?php echo $edat; ?> anys.</p>

            <?php if (esMajorEdat($edat)) { ?>
                <p>Ets major d'edat.</p>
            <?php } else { ?>
                <p>Ets menor d'edat.</p>
            <?php } ?>

            <h2>Taula del <?php echo $numero; ?>:</h2>
            <ul>
                <?php for ($i = 1; $i <= 10; $i++) { ?>
                    <li><?php echo "$numero x $i = " . ($numero * $i); ?></li>
                <?php } ?>
            </ul>

            <h2>Compte enrere:</h2>
            <p>
                <?php
                $comptador = $numero;
                while ($comptador >= 1) {
                    echo $comptador . " ";
                    $comptador--;
                }
                ?>
            </p>

            <h2>Notes</h2>
            <p>Les notes són:</p>
            <ul>
                <?php foreach ($notes as $assignatura => $n) { ?>
                    <li><?php echo "$assignatura: $n"; ?></li>
                <?php } ?>
            </ul>

            <?php $mitjanaNotes = mitjana($notes); ?>
            <p>La mitjana de les notes és: <?php echo number_format($mitjanaNotes, 2); ?>
               (<?php echo qualificacio($mitjanaNotes); ?>)</p>
        </div>
    <?php } ?>
</body>
</html>