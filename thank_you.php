<?php
    include ("includes/header.php");
?>

<section class="thank-you-section">
    <div class="container">
        <h1 class="section-title">¡Gracias por Contactarnos!</h1>
        <p class="success-p">Hemos recibido tu mensaje y nos pondremos en contacto contigo pronto.</p>
        <a href="home.php" class="btn-primary">Volver al Inicio</a>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
<script>
    function launchConfetti() {
        const duration = 5 * 1000;
        const animationEnd = Date.now() + duration;
        const defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

        function randomInRange(min, max) {
            return Math.random() * (max - min) + min;
        }

        const interval = setInterval(function() {
            const timeLeft = animationEnd - Date.now();

            if (timeLeft <= 0) {
                return clearInterval(interval);
            }

            const particleCount = 50 * (timeLeft / duration);

            confetti(Object.assign({}, defaults, {
                particleCount,
                origin: { x: randomInRange(0, 1), y: Math.random() - 0.2 }
            }));
        }, 250);
    }

    window.onload = launchConfetti;
</script>

<?php
    include ("includes/footer.php");
?>