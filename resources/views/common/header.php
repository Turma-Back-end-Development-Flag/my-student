<html>
<head>
  <title><?php echo env('APP_NAME') ?></title>
  <link
    href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet"
  />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
  />

  <style>
    body {
      display: grid;
      height: 100%;
      grid-template-rows: auto 1fr auto;
    }
  </style>
</head>
<body>
  <nav>
    <div class="nav-wrapper container">
      <a href="/" class="brand-logo"><?php echo env('APP_NAME') ?></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="<?php echo route('list_classes') ?>">Classes</a></li>
        <li><a href="<?php echo route('list_people') ?>">Students</a></li>
        <li><a href="#">Teachers</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
