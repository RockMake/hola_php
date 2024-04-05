<!DOCTYPE html>
<html>

<head>
    <title>Formulario de Mascotas</title>
</head>

<body>
    <h1>Registrar Mascota</h1>
    <form method="post" action="">
        <input type="text" name="nombre" placeholder="Nombre de la mascota"><br>
        <input type="text" name="id" placeholder="ID de la mascota"><br>
        <input type="text" name="raza" placeholder="Raza de la mascota"><br>
        <input type="submit" name="add" value="Agregar"><br>
    </form>

    <h2>Listado de Mascotas</h2>

    <?php
    session_start();

    if (isset($_POST["add"])) {
        $_SESSION["mascotas"][] = array(
            "nombre" => $_POST["nombre"],
            "id" => $_POST["id"],
            "raza" => $_POST["raza"]
        );
    }

    if (isset($_POST['del'])) {
        unset($_SESSION['mascotas'][$_POST['key']]);
    }

    if (isset($_SESSION["mascotas"])) {
        $mascotas = $_SESSION["mascotas"];

        $mascotas_por_raza = array();
        foreach ($mascotas as $mascota) {
            $raza = $mascota['raza'];
            if (!isset($mascotas_por_raza[$raza])) {
                $mascotas_por_raza[$raza] = array();
            }
            $mascotas_por_raza[$raza][] = $mascota;
        }

        foreach ($mascotas_por_raza as $raza => $mascotas_raza) {
            echo "<h3>Mascotas de la raza $raza</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Nombre</th><th>ID</th><th>Acción</th></tr>";
            foreach ($mascotas_raza as $key => $mascota) {
                echo "<tr>";
                echo "<td>" . $mascota["nombre"] . "</td>";
                echo "<td>" . $mascota["id"] . "</td>";
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
    }
    ?>
</body>

</html>