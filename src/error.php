<?php if (isset($_SESSION['pageNotFound'])): ?>
    <script type="text/javascript">
        alert("The page you tried to access was not found. You have been redirected here.");
    </script>
    <?php unset($_SESSION['pageNotFound']); // clear the session variable ?>
<?php endif; ?>