<?php echo view('common.header') ?>

    <h1>Create new Person</h1>
    <form method="post" enctype="multipart/form-data">
      <p>
        <label>Name</label>
        <input name="name" />
      </p>
      <p>
        <label>Email</label>
        <input name="email" type="email" />
      </p>
      <p>
        <label>Upload Avatar</label>
        <input name="avatar" type="file" />
      </p>
      <button type="submit">Create new person</button>

      <?php if (isset($error)) : ?>

        <div class="card-panel red darken-4 white-text">
          <b>Erro:</b> <?php echo $error ?>
        </div>

      <?php endif; ?>
    </form>

<?php echo view('common.footer') ?>
