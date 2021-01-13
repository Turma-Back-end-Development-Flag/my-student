<?php echo view('common.header') ?>

  <h1><?php echo $class->name ?></h1>
  <ul>
    <li>
      Group: <?php echo $class->group ?>
    </li>
    <li>
      Ects: <?php echo $class->ects ?>
    </li>
    <li>
      Created At:
      <?php echo (new DateTime($class->created_at))->format('d/m/Y à\s H:i') ?>
    </li>
  </ul>

<?php echo view('common.footer') ?>
