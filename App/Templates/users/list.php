<?php/** @var \App\Data\UserDTO[] $data[0] */ ?>
<h1>All Users</h1>
<br>
<table border="1">
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Full name</th>
        <th>Birthday</th>
    </tr>
    <?php /** @var \App\Data\UserDTO $user */
    foreach ($data[0] as $user): ?>
    <tr>
        <td><?= $user->getId();?></td>
        <td><?= $user->getUsername();?></td>
        <td><?= $user->getFirstName();?> <?= $user->getLastName();?></td>
        <td><?= $user->getBirthday();?></td>
    </tr>
    <?php endforeach; ?>
</table>
Go back to your <a href="profile.php">profile</a>