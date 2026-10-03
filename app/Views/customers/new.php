<form method="post" action="<?= site_url('users/create') ?>">
    <?= csrf_field() ?>
    
    <label>Full Name:</label>
    <input type="text" name="full_name" value="<?= old('full_name') ?>">
    <?= validation_show_error('full_name') ?>

    <label>Username:</label>
    <input type="text" name="username" value="<?= old('username') ?>">
    <?= validation_show_error('username') ?>

    <button type="submit">Save User</button>
</form>