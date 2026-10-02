<nav>
    <a href="<?= base_url('/') ?>">Home</a> | 
    <a href="<?= base_url('about') ?>">About</a> | 
    <a href="<?= base_url('customers') ?>">Customers</a> | 
    <a href="<?= base_url('users') ?>">Users</a>
</nav>
<hr>
<h1>Customer Accounts</h1>
<table border="1" cellpadding="10">
    <tr><th>Full Name</th><th>Email</th><th>Phone</th></tr>
    <?php foreach ($customers as $c): ?>
    <tr>
        <td><?= esc($c['full_name']) ?></td>
        <td><?= esc($c['email']) ?></td>
        <td><?= esc($c['phone']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>