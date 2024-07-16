<?php $title = 'Sign Up'; ?>
<?php include(APPPATH . 'views/templates/header.php'); ?>


<div class="container mt-5">
    <h2>Sign Up</h2>
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?php echo form_open('auth/signup'); ?>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    <?php echo form_close(); ?>
</div>


<?php include(APPPATH . 'views/templates/footer.php'); ?>