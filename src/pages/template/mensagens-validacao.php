<?php if (isset($_SESSION["errorMessage"])): ?>

    <div class="alert alert-danger" role="alert">
        <?php print $_SESSION["errorMessage"]; ?>
    </div>
    <?php unset($_SESSION["errorMessage"]);
endif; ?>

<?php if (isset($_SESSION["sucessoMessage"])): ?>

    <div class="alert alert-success" role="alert">
        <?php print $_SESSION["sucessoMessage"]; ?>
    </div>
    <?php unset($_SESSION["sucessoMessage"]);
endif; ?>



