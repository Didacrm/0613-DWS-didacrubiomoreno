<?php

$noms = ["Anna", "Pau", "Júlia"];

$notes = [
    "Anna"  => ["nota1" => 8, "nota2" => 9],
    "Joan"  => ["nota1" => 6, "nota2" => 7],
    "Pau"   => ["nota1" => 4, "nota2" => 5],
    "Clara" => ["nota1" => 9, "nota2" => 10],
    "Júlia" => ["nota1" => 7, "nota2" => 8]
];
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Exercici 3 – Revisió de notes</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 6px 12px; text-align: center; }
        th { background-color: #ddd; }
    </style>
</head>
<body>
    <h1>Exercici 3 – Revisió de notes</h1>

    <table>
        <tr>
            <th>Nom</th>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Mitjana</th>
            <th>Resultat</th>
        </tr>

        <?php
        foreach ($noms as $nom) {
            $nota1 = $notes[$nom]["nota1"];
            $nota2 = $notes[$nom]["nota2"];

            $mitjana = ($nota1 + $nota2) / 2;

            if ($mitjana < 5) {
                $resultat = "Suspès";
            } elseif ($mitjana < 7) {
                $resultat = "Aprovat";
            } elseif ($mitjana < 9) {
                $resultat = "Notable";
            } else {
                $resultat = "Excel·lent";
            }
        ?>
        <tr>
            <td><?php echo $nom; ?></td>
            <td><?php echo $nota1; ?></td>
            <td><?php echo $nota2; ?></td>
            <td><?php echo number_format($mitjana, 2); ?></td>
            <td><?php echo $resultat; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>