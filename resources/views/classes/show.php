<?php echo view('common.header') ?>

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

<?php echo view('common.footer') ?>
