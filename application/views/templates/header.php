<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous"> -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">

  <!-- My CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">

  <!-- start trial chart -->
  <script src="<?php echo base_url()?>/assets/js/chart.min.js"></script>
  <!-- end trial chart -->



  <title><?php echo $judul; ?></title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand">Monitoring Test Tire</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="<?= base_url(); ?>livemonitoringprocess">Live Monitoring Process</a>
          <a class="nav-item nav-link" href="<?= base_url(); ?>historymonitoringprocess">History Monitoring Process</a>
          <a class="nav-item nav-link" href="<?= base_url(); ?>livemonitoringstock">Live Monitoring Stock</a>
          <a class="nav-item nav-link" href="<?= base_url(); ?>historymonitoringstock">History Monitoring Stock</a>
          <!-- <a class="nav-item nav-link" href="#">About</a> -->
        </div>
      </div>
    </div>
  </nav>
  
</body>