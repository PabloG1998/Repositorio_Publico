<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
</head>
<body>
    <h2>Contact Form</h2>
    <form action="send.php" method="POST">
        <label for="name">Nombre: </label>
        <input type="text" id="name" name="name" required>

        <label for="email" required>Email</label>
        <input type="email" name="email" id="email" required>

        <label for="subject" required>Asunto</label>
        <input type="text" name="subject" id="subject" required>
        <br>
        <label for="message">Mensaje:</label>
        <textarea name="message" id="message" rows="5" required></textarea>

        <button type="submit">Send</button>
    </form>
</body>
</html>