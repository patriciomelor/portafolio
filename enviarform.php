<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validar los datos
    if (empty($name) || empty($email) || empty($message)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    // Validar el email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El email no es válido.";
        exit;
    }

    // Configuración del correo
    $to = "patriciomelor@gmail.com";
    $subject = "Formulario contacto desde github";
    $body = "Nombre: $name\nEmail: $email\nMensaje:\n$message";
    $headers = "From: $email";

    // Enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado. Gracias por contactarnos.";
    } else {
        echo "Hubo un problema al enviar el mensaje. Inténtelo de nuevo más tarde.";
    }
} else {
    echo "Método de solicitud no soportado.";
}
?>
