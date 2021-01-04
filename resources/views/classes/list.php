<?php echo view('common.header') ?>

  <ul class="collection with-header">
    <li class="collection-header">
      <h4>Classes</h4>
    </li>

    <?php foreach ( $classes as $class ) : ?>
      <li>
        <a href="/classes/<?php echo $class->ID ?>" class="collection-item">
          <?php echo $class->Name ?>
        </a>
      </li>
    <?php endforeach ?>
  </ul>

  <a href="<?php echo route('new_classe') ?>" class="waves-effect waves-light btn">Add new classe</a>

<?php echo view('common.footer') ?>
