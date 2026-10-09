<!DOCTYPE html>
<html>
<head>
    <title>Login - POS System</title>
</head>
<body>
    <h2>Login</h2>
    
    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

    <form action="<?= site_url('auth/attemptLogin') ?>" method="post">
        <?= csrf_field() ?>
        
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>