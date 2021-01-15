<?php echo view('common.header') ?>

    <h1>Create new Person</h1>
    <form method="post" enctype="multipart/form-data">
      <p>
        <label>Name</label>
        <input name="name" minlength="2" maxlength="255"
         value="<?php echo isset($name) ? $name : null ?>"
         required />
      </p>
      <p>
        <label>Email</label>
        <input name="email" type="email"
          value="<?php echo isset($email) ? $email : null ?>"
          required />
      </p>
      <p>
        <label>NIF</label>
        <input name="nif" minlength="9" maxlength="9"
         value="<?php echo isset($nif) ? $nif : null ?>"
         pattern="[0,1,2,3,5,9][\d]+"
         required />
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
