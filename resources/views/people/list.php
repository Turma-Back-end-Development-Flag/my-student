<?php echo view('common.header') ?>

  <ul class="collection with-header">
    <li class="collection-header">
      <h4>People</h4>
    </li>

    <?php foreach ( $people as $person ) : ?>
      <li>
        <a href="/people/<?php echo $person->uid ?>" class="collection-item">
          <?php echo $person->name ?> (<?php echo $person->email ?>)
        </a>
      </li>
    <?php endforeach ?>
  </ul>

  <a href="<?php echo route('new_person') ?>" class="waves-effect waves-light btn">Add new person</a>

<?php echo view('common.footer') ?>
