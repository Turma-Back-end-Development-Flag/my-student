<?php echo view('common.header') ?>

  <h1><?php echo $person->name ?></h1>

  <?php if ($person->avatar_filename) : ?>
    <img src="/uploads/<?php echo $person->avatar_filename ?>" width="200" />
  <?php endif; ?>

  <ul>
    <li>
      Number: <?php echo $person->number ?>
    </li>
    <li>
      Email: <?php echo $person->email ?>
    </li>
    <li>
      Created At:
      <?php echo (new DateTime($person->created_at))->format('d/m/Y \à\s H:i') ?>
    </li>
  </ul>

<?php echo view('common.footer') ?>
