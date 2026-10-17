<?php
session_start();
require_once __DIR__ . '/../controller/AuthController.php';
require_once __DIR__ . '/../controller/CircunferenciaController.php';

AuthController::verificarSesion();

$circunferenciaController = new CircunferenciaController();
$buscar = trim($_GET['buscar'] ?? '');
$registros = $circunferenciaController->listar($buscar);

// Lógica para eliminar desde esta vista
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'eliminar') {
    $circunferenciaController->eliminar();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imagenes/icono.png">
    <link rel="stylesheet" href="../assetes/css/style_home.css">
    <title>Historial de Cálculos</title>
</head>
<body>
    <header class="headeerHome">
        <div class="lineaSup">
            <div class="logo-links">
                <div class="logo">
                    <img src="../imagenes/logo.png" alt="Logo">
                    <h1>Matemáticas</h1>
                </div>
                <a href="home.php">Volver al Calculador</a>
            </div>
        </div>
        <div class="lineaInf">
            <nav class="menu">
                <li><a href="home.php">Inicio</a></li>
                <li><a href="#">Nuestra historia</a></li>
                <li><a href="logout.php" onclick="return confirm('¿Desea salir?');">Cerrar sesión</a></li>
            </nav>
        </div>
    </header>

    <main>
        <div class="buscar" style="margin-top: 20px;">
            <form action="historial.php" method="get" id="frmBuscar">
                <img src="../imagenes/logo.png" alt="Buscar">
                <button type="submit">Buscar</button>
                <input type="text" name="buscar" id="txtBuscar" placeholder="Buscar por radio o comentario"
                 value="<?php echo htmlspecialchars($buscar); ?>">
                <a class="btn-link limpiar" href="historial.php">Limpiar</a>
            </form>
        </div>

        <div class="tabla">
            <h1>Historial de los cálculos</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Radio</th>
                        <th>Detalle</th>
                        <th>Area</th>
                        <th>Perimetro</th>
                        <th>Fecha y hora</th>
                        <th>Botones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($registros) > 0) : ?>
                        <?php foreach ($registros as $fila) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($fila['id_circunferencia']); ?></td>
                                <td><?php echo htmlspecialchars($fila['radio']); ?></td>
                                <td><?php echo htmlspecialchars($fila['detalle']); ?></td>
                                <td><?php echo htmlspecialchars($fila['area']); ?></td>
                                <td><?php echo htmlspecialchars($fila['perimetro']); ?></td>
                                <td><?php echo htmlspecialchars($fila['fecha_registro']); ?></td>
                                <td class="acciones">
                                    <a class="btn-tabla editar" href="home.php?editar=<?php echo (int) $fila['id_circunferencia']; ?>">Editar</a>

                                    <form action="" method="post" onsubmit="return confirm('¿Desea eliminar este registro?');">
                                        <input type="hidden" name="id_circunferencia" value="<?php echo (int) $fila['id_circunferencia']; ?>">
                                        <button class="btn-tabla eliminar" type="submit" name="accion" value="eliminar">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7">No hay registros para mostrar.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>