<h2>User Accounts</h2>
<a href="<?= site_url('users/new') ?>">Add New User</a>

<table border="1">
    <tr>
        <th>Avatar</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Actions</th>
    </tr>
    <?php foreach($users as $user): ?>
    <tr>
        <td>
            <?php if (!empty($user['avatar'])): ?>
                <img src="<?= base_url('uploads/' . $user['avatar']) ?>" width="50" height="50" alt="Avatar">
            <?php else: ?>
                <img src="<?= base_url('images/placeholder.png') ?>" width="50" height="50" alt="No Avatar">
            <?php endif; ?>
        </td>
        <td><?= esc($user['full_name']) ?></td>
        <td><?= esc($user['username']) ?></td>
        <td>
            <a href="<?= site_url('users/edit/'.$user['id']) ?>">Edit</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>