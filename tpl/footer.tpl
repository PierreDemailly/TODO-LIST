  <?php if($_HAS_NAVBAR): ?>

  <nav class="nav justify-content-center">
    <p class="heading">
      Made by <a href="https://github.com/PierreDemailly">Pierre Demailly</a>
    </p>
  </nav>

  <?php endif; ?>

  <script type="text/javascript">
  var BASE_URL = <?= BASE_URL ?>;
  </script>
  <script src="<?= BASE_URL ?>js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="<?= BASE_URL ?>js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
  <script src="<?= BASE_URL ?>js/main.js"></script>
</body>

</html>
