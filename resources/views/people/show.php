<?php echo view('common.header') ?>

  <h1><?php echo $person->Name ?></h1>
  <ul>
    <li>
      Number: <?php echo $person->Number ?>
    </li>
    <li>
      Email: <?php echo $person->Email ?>
    </li>
    <li>
      Created At:
      <?php echo (new DateTime($person->Created_at))->format('d/m/Y \à\s H:i') ?>
    </li>
  </ul>

<?php echo view('common.footer') ?>
