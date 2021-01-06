<?php echo view('common.header') ?>

    <h1>Create new Person</h1>
    <form method="post">
      <p>
        <label>Name</label>
        <input name="Name" />
      </p>
      <p>
        <label>Email</label>
        <input name="Email" type="email" />
      </p>
      <button type="submit">Create new person</button>
    </form>

<?php echo view('common.footer') ?>
