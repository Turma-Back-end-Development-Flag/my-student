<html>
<head>
  <title>My Student</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
  />

</head>
<body>
  <div class="container">
    <h1><?php echo $class->Name ?></h1>
    <ul>
      <li>
        Group: <?php echo $class->Group ?>
      </li>
      <li>
        Ects: <?php echo $class->Ects ?>
      </li>
      <li>
        Created At:
        <?php echo (new DateTime($class->Created_at))->format('d/m/Y à\s H:i') ?>
      </li>
    </ul>
  </div>
</body>
</html>
