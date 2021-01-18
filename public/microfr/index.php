<?php

include "./router.php";

// $_SERVER;
// $_SESSION;
// $_GET;
// $_POST;
// $_REQUEST;
// $_FILES;

session_start();

router(function (array $input) {
  switch ($input['type']) {
    case 'index':
      ?>
      <form method="post" action="?type=form" enctype="multipart/form-data">
        <input type="text" name="name" />
        <input type="file" name="image" />
        <button type="submit">Submit</button>
      </form>
      <?php
      break;

    case 'form':
      if ($_FILES['image']) {
        move_uploaded_file(
          $_FILES['image']['tmp_name'],
          __DIR__ . '/' . $_FILES['image']['name']
        );
      }
      var_dump($_POST, $_FILES);
      break;

    default:
      echo '404';
  }
});
