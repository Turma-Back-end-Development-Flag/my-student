<?php echo view('common.header') ?>

    <h1>Create new class</h1>
    <form method="post">
      <p>
        <label>Name</label>
        <input name="Name" />
      </p>
      <p>
        <label>Group</label>
        <input name="Group" />
      </p>
      <p>
        <label>Ects</label>
        <input name="Ects" />
      </p>
      <button type="submit">Create new class</button>
    </form>

<?php echo view('common.footer') ?>
