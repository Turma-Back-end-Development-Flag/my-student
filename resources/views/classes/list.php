<?php echo view('common.header') ?>

  <ul class="collection with-header">
    <li class="collection-header">
      <h4>Classes</h4>
    </li>

    <?php foreach ( $classes as $c ) : ?>
      <li>
        <a href="/classes/<?php echo $c->ID ?>" class="collection-item">
          <?php echo $c->Name ?>
        </a>
      </li>
    <?php endforeach ?>
  </ul>

  <a href="<?php echo route('new_classe') ?>" class="waves-effect waves-light btn">Add new classe</a>

<?php echo view('common.footer') ?>
