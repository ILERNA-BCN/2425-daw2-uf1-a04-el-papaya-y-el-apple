<?php
    include ("includes/header.php");
?>

<section class="contact-section">
    <div class="container">
        <h1>Contactanos</h1>
        <p>Si tienes alguna pregunta o deseas más información, no dudes en contactarnos a través de este formulario.</p>
        <form action="actions/procesar_contacto.php" method="POST" class="contact-form">
            <div class="form-group">
                <label for="name">Nombre Completo:</label>
                <input type="text" id="name" name="name" required placeholder="Escribe tu nombre completo">
            </div>
            <div class="form-group">
                <label for="phone">Teléfono:</label>
                <input type="tel" id="phone" name="phone" required placeholder="Escribe tu número de teléfono">
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required placeholder="Escribe tu correo electrónico">
            </div>
            <div class="form-group">
                <button type="submit" class="btn-submit">Enviar</button>
            </div>
        </form>
    </div>
</section>

<?php
    include ("includes/footer.php");
?>