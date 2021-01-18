<?php echo view('common.header') ?>

<h1>404 - Página não encontrada</h1>
<?php if ( isset($message) ) : ?>
<p><?php echo $message; ?></p>
<?php endif; ?>

<?php echo view('common.footer') ?>
