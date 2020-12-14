<html>
<head>
  <title>My Student</title>
</head>
<body>
  <h1>Welcome to My Student</h1>
  <h2>Classes</h2>
  <ul>
  <?php foreach ( $classes as $class ) : ?>
    <li><?php echo $class ?></li>
  <?php endforeach ?>
  </ul>
</body>
</html>
