<form method="post" action="<?= site_url('users/update/'.$user['id']) ?>" enctype="multipart/form-data">
    <?= csrf_field() ?>
    
    <label>Full Name:</label>
    <input type="text" name="full_name" value="<?= old('full_name', $user['full_name']) ?>">
    <?= validation_show_error('full_name') ?>

    <label>Username:</label>
    <input type="text" name="username" value="<?= old('username', $user['username']) ?>">
    <?= validation_show_error('username') ?>

    <label>Profile Avatar (JPG/PNG, Max 2MB):</label>
    <input type="file" name="avatar">
    <?= validation_show_error('avatar') ?>

    <button type="submit">Update User</button>
</form>