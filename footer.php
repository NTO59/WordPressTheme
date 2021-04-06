</div> <!-- fin container -->
<div class="bg-dark py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php dynamic_sidebar(('footer-1')) ?>
            </div>
            <div class="col-lg-3">
                <?php dynamic_sidebar(('footer-2')) ?>
            </div>
            <div class="col-lg-3">
                <?php dynamic_sidebar(('footer-3')) ?>
            </div>
            <div class="col-lg-3">
                <?php dynamic_sidebar(('footer-4')) ?>
            </div>
        </div>
    </div>
</div>

<?php
// Ajoute les JS de WordPress et des plugins
wp_footer() ?>
</body>

</html>