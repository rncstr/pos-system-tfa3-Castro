<nav>
    <a href="<?= base_url('/') ?>">Home</a> | 
    <a href="<?= base_url('about') ?>">About</a> | 
    <a href="<?= base_url('customers') ?>">Customers</a> | 
    <a href="<?= base_url('users') ?>">Users</a>
</nav>
<hr>
<h1>User Accounts</h1>
<table border="1" cellpadding="10">
    <tr><th>Username</th><th>Full Name</th><th>Role</th></tr>
    <?php foreach ($users as $u): ?>
    <tr>
        <td><?= esc($u['username']) ?></td>
        <td><?= esc($u['name']) ?></td>
        <td><?= esc($u['role']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>