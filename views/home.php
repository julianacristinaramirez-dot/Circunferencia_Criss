<?php
session_start();
require_once __DIR__ . '/../controller/AuthController.php';
require_once __DIR__ . '/../controller/CircunferenciaController.php';

AuthController::verificarSesion();

$circunferenciaController = new CircunferenciaController();
$mensaje = $_GET['mensaje'] ?? '';
$mensajeFormulario = $circunferenciaController->procesarFormulario();

if ($mensajeFormulario !== '') {
    $mensaje = $mensajeFormulario;
}

$registroEditar = null;

if (isset($_GET['editar'])) {
    $registroEditar = $circunferenciaController->obtenerParaEditar((int) $_GET['editar']);
}

$idActual = $registroEditar['id_circunferencia'] ?? '';
$radioActual = $registroEditar['radio'] ?? '';
$detalleActual = $registroEditar['detalle'] ?? '';
$areaActual = $registroEditar['area'] ?? '';
$perimetroActual = $registroEditar['perimetro'] ?? '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index,follow">
    <meta name="description" content="Calculo del area y perimetro de la circunferencia">
    <meta name="keywords" content="circunferencia, sistema, base de datos">
    <meta name="author" content="JC TECH">

    <link rel="icon" href="../imagenes/icono.png">
    <link rel="stylesheet" href="../assetes/css/style_home.css">

    <title>Circunferencia - Principal</title>
</head>
<body>
    <header class="headerHome">
        <div class="lineaSup">
            <div class="logo-links">
                <div class="logo">
                    <img src="../imagenes/logo.png" alt="Logo">
                    <h1>Matemáticas</h1>
                </div>
                <a href="#">Quienes somos</a>
            </div>

        </div>
        <div class="lineaInf">
            <nav class="menu">
                <li>
                    <a href="home.php">Inicio</a>
                </li>
                <li>
                    <a href="historial.php">Nuestra historia</a>
                </li>
                <li>
                    <a href="logout.php" onclick="return confirm('¿Desea salir?');">Cerrar sesión</a>
                </li>
            </nav>
        </div>
    </header>

    <main>
        <div class="datos">
            <div class="titulo">
                <h1>Calculo de la Circunferencia</h1>
                <p>Usuario: <?php echo htmlspecialchars($_SESSION['usuario']); ?></p>
            </div>

            <?php if ($mensaje !== '') : ?>
                <p class="mensaje">
                    <?php echo htmlspecialchars(ucfirst($mensaje)); ?>
                </p>
            <?php endif; ?>

            <form action="" method="post" class="form2" id="frmFormulario">
                <input type="hidden" name="id_circunferencia" value="<?php echo htmlspecialchars($idActual); ?>">

                <div class="inputs">
                    <label for="txtRadio">Radio</label>
                    <input class="inputHome" type="number" step="any" name="txtRadio" id="txtRadio" placeholder="Radio"
                     value="<?php echo htmlspecialchars($radioActual); ?>">
                </div>
                <div class="inputs">
                    <label for="txtDetalle">Comentario</label>
                    <input class="inputHome" type="text" placeholder="Opcional: Un comentario"
                    name="txtDetalle" id="txtDetalle" value="<?php echo htmlspecialchars($detalleActual); ?>">
                </div>
                <div class="inputs">
                    <label for="txtA">Area</label>
                    <input class="inputHome" type="text" name="txtA" id="txtA" readonly placeholder="Area"
                     value="<?php echo htmlspecialchars($areaActual); ?>">
                </div>
                <div class="inputs">
                    <label for="txtP">Perímetro</label>
                    <input class="inputHome" type="text" name="txtP" id="txtP" readonly placeholder="Perimetro"
                     value="<?php echo htmlspecialchars($perimetroActual); ?>">
                </div>
                <div class="botones">
                    <button type="button" onclick="calcularCircunferencia();">Calcular</button>
                    <a class="btn-link cancelar" href="home.php">Cancelar</a>
                    <button type="submit" name="accion" value="guardar">
                        <?php echo $idActual !== '' ? 'Actualizar' : 'Guardar'; ?>
                    </button>
                </div>
            </form>
        </div>

    </main>

    <script src="../assetes/js/app.js?v=3"></script>
</body>
</html>
