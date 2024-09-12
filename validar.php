<?php

//función para limpiar las entradas
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



// Inicializar un array para almacenar los errores
$errores = [];

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar nombre
    if (empty($_POST["nombre"])) {
        $errores[] = "El nombre es obligatorio.";
    }

    // Validar correo
    // filter_var es una función que filtra una variable con un filtro especificado
    // FILTER_VALIDATE_EMAIL es una constante predefinidad que representa un filtro para validar direcciones de email
    if (empty($_POST["correo"])) {
        $errores[] = "El correo electrónico es obligatorio.";
    } elseif (!filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El formato del correo electrónico no es válido.";
    }

    // Validar contraseña
    if (empty($_POST["pass"])) {
        $errores[] = "La contraseña es obligatoria.";
    }

    // Validar fecha
    if (empty($_POST["fecha"])) {
        $errores[] = "La fecha de antigüedad es obligatoria.";
    }

    // Validar color (no es obligatorio, pero si se selecciona, debe ser válido)
    if (isset($_POST["eligeColor"]) && !in_array($_POST["eligeColor"], ["Rojo", "Azul", "Verde"])) {
        $errores[] = "El color seleccionado no es válido.";
    }

    // Validar aceptación de políticas
    if (isset($_POST["aceptoPoliticas"])) {
        $errores[] = "Debes aceptar las políticas de privacidad.";
    }

    // Si no hay errores, procesar los datos
    if (empty($errores)) {
        echo "<h2>Datos del formulario:</h2>";
        echo "<p><strong>Nombre:</strong> " . htmlspecialchars($_POST["nombre"]) . "</p>";
        echo "<p><strong>Dirección:</strong> " . htmlspecialchars($_POST["direccion"]) . "</p>";
        echo "<p><strong>Correo:</strong> " . htmlspecialchars($_POST["correo"]) . "</p>";
        echo "<p><strong>Contraseña:</strong> [Oculta por seguridad]</p>";
        echo "<p><strong>Antigüedad:</strong> " . htmlspecialchars($_POST["fecha"]) . "</p>";
        echo "<p><strong>Color elegido:</strong> " . (isset($_POST["eligeColor"]) ? htmlspecialchars($_POST["eligeColor"]) : "No seleccionado") . "</p>";
        echo "<p><strong>Comentarios:</strong> " . htmlspecialchars($_POST["comentarios"]) . "</p>";
        echo "<p><strong>Aceptó políticas:</strong> Sí</p>";
    } else {
        // Si hay errores, mostrarlos
        echo "<h2>Errores en el formulario:</h2>";
        echo "<ul>";
        foreach ($errores as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
        echo "<p><a href='javascript:history.back()'>Volver al formulario</a></p>";
    }
} else {
    // Si no se ha enviado el formulario, redirigir al formulario
    header("Location: index.html");
    exit();
}
?>