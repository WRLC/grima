<!DOCTYPE html>
<html>
  <head>
<?=$t('head')?>
  </head>
  <body class="grey lighten-3">
  <nav>
        <div class="nav-wrapper blue"> <img src="../Materialize/wrlc-logo-white.png" height="50px" style="margin:5px 0 0 20px; position:absolute;">
        <a href="#" class="brand-logo" style="margin-left:90px;">Almagic - A Suite of Alma API Applications</a>
        </div>
    </nav>
    <div class="jumbotron">
      <div class="container task-<?=$e($basename)?>">
        <div class="container mt-4 position-relative">
          <!-- success -->
          <?= $t('success') ?>
          <div class="position-absolute mx-auto help-button">
            <a class="btn btn-info" href="<?=$e($basename)?>.php">BACK</a>
            <a class="btn btn-info" href="/home.html">HOME</a>
            <a class="btn btn-info" href="../Logout/Logout.php">LOGOUT</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
