<?php

$productes = [
    "Llibre"   => 12.5,
    "Motxilla" => 35,
    "Bolígraf" => 1.2,
    "Carpeta"  => 4.8
];

$quantitats = [
    "Llibre"   => 2,
    "Motxilla" => 1,
    "Bolígraf" => 5,
    "Carpeta"  => 3
];

function calcularDetall($productes, $quantitats) {
    $detall = [];

    foreach ($productes as $producte => $preu) {
        $quantitat = $quantitats[$producte];
        $subtotal  = $preu * $quantitat;

        $detall[] = [
            "producte"  => $producte,
            "preu"      => $preu,
            "quantitat" => $quantitat,
            "subtotal"  => $subtotal
        ];
    }

    return $detall;
}

function calcularTotal($detall) {
    $total = 0;

    foreach ($detall as $linia) {
        $total += $linia["subtotal"];
    }

    return $total;
}

$detall = calcularDetall($productes, $quantitats);
$total  = calcularTotal($detall);
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Exercici 4 – Compres botiga online</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 6px 12px; }
        th { background-color: #ddd; }
        td.num { text-align: right; }
    </style>
</head>
<body>
    <h1>Exercici 4 – Compres botiga online</h1>

    <table>
        <tr>
            <th>Producte</th>
            <th>Preu unitari</th>
            <th>Quantitat</th>
            <th>Subtotal</th>
        </tr>
        <?php foreach ($detall as $linia) { ?>
        <tr>
            <td><?php echo $linia["producte"]; ?></td>
            <td class="num"><?php echo number_format($linia["preu"], 2, ",", "."); ?> €</td>
            <td class="num"><?php echo $linia["quantitat"]; ?></td>
            <td class="num"><?php echo number_format($linia["subtotal"], 2, ",", "."); ?> €</td>
        </tr>
        <?php } ?>
    </table>

    <p><strong>Total de la compra: <?php echo number_format($total, 2, ",", "."); ?> €</strong></p>
</body>
</html>