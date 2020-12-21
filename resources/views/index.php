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
    <h1>Welcome to My Student</h1>
    <h2>Classes</h2>
    <ul>
    <?php foreach ( $classes as $class ) : ?>
      <li>
        <a href="/classes/<?php echo $class->ID ?>">
          <?php echo $class->Name ?>
        </a>
      </li>
    <?php endforeach ?>
    </ul>
    <a href="/classes/new">Add new class</a>
  </div>
</body>
</html>
