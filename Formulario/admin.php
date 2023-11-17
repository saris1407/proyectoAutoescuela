
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/proyectoAutoescuela/cargadores/Autoload.php';
Autoload::autoload();

$conexion = new PDO("mysql:host=localhost;dbname=autoescuela", "root", "12345678");

if (!$conexion) {
    die("Error en la conexión a la base de datos.");
}

$validado = 1; 
// Procesar la solicitud de validación
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id']) && isset($_POST['rol'])) {
    $usuarioId = $_POST['id'];
    $rol = $_POST['rol'];

    if (isset($_POST['no'])) {
        $validado = 0; // No validado
        $mensaje = "Usuario no validado";
    } elseif (isset($_POST['si'])) {
        $validacionExitosa = Db_usuario::validarUsuario($conexion, $usuarioId, $rol, $validado);
        
        if ($validacionExitosa) {
            switch ($rol) {
                case "profesor":
                    $mensaje = "Usuario validado como profesor.";
                    break;
                case "alumno":
                    $mensaje = "Usuario validado como alumno.";
                    break;
                default:
                    $mensaje = "Rol de usuario desconocido.";
                    break;
            }
        } else {
            $mensaje = "Error al validar el usuario.";
        }
       
    }
}


$muestra = funcionesadmin::obtenerUsuariosNoValidado($conexion);

?>

<h2>Bienvenido Administrador</h2>
<main>
    <div class="tabla-container">
        <?php if (!empty($muestra)): ?>
            <table class="tablavalidar">
                <tr>
                    <th>id</th>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Validar</th>
                </tr>
                <?php foreach ($muestra as $key): ?>
                    <tr>
                        <td><?php echo $key['id']; ?></td>
                        <td><?php echo $key['nombre']; ?></td>
                        <td>
                            <select name="rol">
                                <option value="alumno" <?php echo $key['rol'] === 'alumno' ? 'selected' : ''; ?>> Alumno </option>
                                <option value="profesor" <?php echo $key['rol'] === 'profesor' ? 'selected' : ''; ?>> Profesor </option>
                            </select>
                        </td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="id" value="<?php echo $key['id']; ?>">
                                <input type="hidden" name="rol" value="<?php echo $key['rol']; ?>">
                                <button type="submit" class="botonSi" name="si">Si</button>
                                <button type="submit" class="botonNo" name="no" value="<?php echo $key['id']; ?>">No</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No hay usuarios para validar.</p>
        <?php endif; ?>
    </div>
</main>
