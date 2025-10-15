<?php
/*===================================
Capturar el dominio
===================================*/
  $path = TemplateController::path();
  // echo '<pre>';print_r($path);echo '</pre>';

/*===================================
Capturar rutas de la URL
===================================*/
  $ruta = $_SERVER['REQUEST_URI'];
  //echo '<pre>';print_r($ruta);echo '</pre>';

  $arrayRutas = (explode("/",$ruta));
  array_shift($arrayRutas);

  // echo '<pre>';print_r($arrayRutas);echo '</pre>';
  foreach($arrayRutas as $key => $value){
    $arrayRutas[$key] = explode("?", $value)[0];
  }

  // echo '<pre>';print_r($arrayRutas);echo '</pre>';
?>


<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Top Navigation + Sidebar</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- bootstrap 5 -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=$path?>views/sources/adminlte/plugins/fontawesome-free/css/all.min.css">
  
  <link rel="stylesheet" href="<?=$path?>views/sources/plugins/jdSlider/jdSlider.css">
  
  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=$path?>views/sources/adminlte/dist/css/adminlte.min.css">

  <!-- Mis estilos -->
  <link rel="stylesheet" href="<?=$path?>views/sources/css/style.css">
</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">

<?php
  include "views/modules/top.php";
  include "views/modules/navbar.php";

  if(isset($_SESSION['admin'])){
    include "views/modules/aside.php";
  }

  if(
    $arrayRutas[0] == "admin"
  ){
    include "pages/".$arrayRutas[0]."/".$arrayRutas[0].".php";
  }else{
    include "views/pages/home/home.php";
  }


  // include "views/modules/sidebar-control.php";
  include "views/modules/footer.php";
  include "views/modules/modals.php";
?>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="views/sources/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="views/sources/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

<!-- jdslider -->
<script src="<?=$path?>views/sources/plugins/jdSlider/jdSlider.js"></script>



<!-- AdminLTE App -->
<script src="<?=$path?>views/sources/adminlte/dist/js/adminlte.min.js"></script>

<!-- Scripts propios -->
<script src="<?=$path?>views/sources/js/slide.js"></script>
<script src="<?=$path?>views/sources/js/products.js"></script>
<script src="<?=$path?>views/sources/js/forms.js"></script>
</body>
</html>

