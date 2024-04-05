<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $name = "pepe";
    $age = 20;
    $height = 1.80;
    $isStudent = true;
    $output = "hola mi nombre es $name, tengo $age años, mido $height y soy estudiante $isStudent";
    $outputage = match (true) {
        $age < 18 => "eres menor de edad",
        $age >= 18 && $age < 65 => "eres adulto",
        $age >= 65 => "eres jubilado"
    };




    ?>
    <h1>
        <?= $output; ?>
    </h1>


















    <style>
        :root {
            color-scheme: light dark;
        }

        body {
            display: grid;
            place-content: center;
        }
    </style>

</body>

</html>