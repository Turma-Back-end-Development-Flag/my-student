<?php

/*

Este é um pequeno exercício de criação de uma microframework.
Poderiamos fazer algo mais complexo.

Recomendo olharem para a solução Bramus Router neste link:
https://github.com/bramus/router

É das implementações de Router mais pequenas mas mesmo assim
usáveis em PHP. Pode ser útil para aplicações pequenas.

*/

include "./router.php";

/* Estas variáveis globais de PHP são úteis */

// $_SERVER;
// $_SESSION;
// $_GET;
// $_POST;
// $_REQUEST;
// $_FILES;

session_start();

router(function (array $input) {
  // Este switch declara as rotas, tal como o routes/web.php
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
