<?php $title = 'Login'; ?>
<?php include(APPPATH . 'views/templates/header.php'); ?>

<h1 class="mt-5">Login</h1>
<?php if (isset($error)): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>
<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
<form action="<?php echo site_url('auth/login'); ?>" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>

<?php include(APPPATH . 'views/templates/footer.php'); ?>
