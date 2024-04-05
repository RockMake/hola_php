<html>

<head>
    <title>Formulario de Usuarios</title>
</head>

<body>
    <h1>Crear Usuario</h1>
    <form method="post" action="">
        <input type="text" name="nombre" placeholder="Nombre"><br>
        <input type="text" name="cedula" placeholder="Cédula"><br>
        <input type="number" name="edad" placeholder="Edad"><br>
        <input type="submit" name="add" value="Agregar"><br>
    </form>

    <h2>Lista de Usuarios</h2>
    <?php
    session_start();

    // Agregar usuario 
    if (isset($_POST["add"])) {
        $_SESSION["usuarios"][] = array(
            "nombre" => $_POST["nombre"],
            "cedula" => $_POST["cedula"],
            "edad" => $_POST["edad"]
        );
    }

    // Eliminar usuario 
    if (isset($_POST['del'])) {
        unset($_SESSION['usuarios'][$_POST['key']]);
    }

    // Ordenar usuarios por edad 
    if (isset($_SESSION["usuarios"])) {
        $usuarios = $_SESSION["usuarios"];


        function compararPorEdad($a, $b)
        {
            if ($a['edad'] == $b['edad']) {
                return 0;
            }
            return ($a['edad'] > $b['edad']) ? -1 : 1;
        }

        usort($usuarios, 'compararPorEdad');

        // Mostrar usuarios en tabla
        echo "<table border='1'>";
        echo "<tr><th>Nombre</th><th>Cédula</th><th>Edad</th><th>Acción</th></tr>";

        foreach ($usuarios as $key => $value) {
            echo "<tr>";
            echo "<td>" . $value["nombre"] . "</td>";
            echo "<td>" . $value["cedula"] . "</td>";
            echo "<td>" . $value["edad"] . "</td>";
            echo "<td>
                    <form method='post' action=''>
                        <input type='hidden' name='key' value='$key'>
                        <input type='submit' name='del' value='Eliminar'>
                    </form>
                </td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>

</html>