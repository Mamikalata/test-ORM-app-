
<?php /** @var \App\Data\UserDTO $user */
$user = $data[0];
?>
<h1>Edit Profile</h1>

<form method="post">
    <div>
        Username: <input type="text" name="username" value="<?= $user->getUsername() ?>">
    </div>
    <div>
        Password: <input type="password" required="required" name="password">
    </div>
    <div>
        First name: <input type="text" name="first_name" value="<?= $user->getFirstName() ?>">
    </div>
    <div>
        Last name: <input type="text" name="last_name" value="<?= $user->getLastName() ?>">
    </div>
    <div>
        Birthday: <input type="text" name="birthday" value="<?= $user->getBirthday() ?>">
    </div>
    <div>
        <input type="submit" name="edit" value="Edit">
    </div>
</form>
<div>You can <a href="index.php">Logout</a> or see <a href="users.php">all users</a>.</div>