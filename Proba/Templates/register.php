<form method="POST">
    <?php /** @var errors|null */ ?>
    <?php foreach($errors as $error):?>
    <p style="color: red"><?=$error?></p>
<?php endforeach;?>
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    Confirm Password: <input type="password" name="confirm_password"><br>
    Full Name: <input type="text" name="full_name"><br>
    Location: <input type="text" name="location"><br>
    <button type="submit" name="register">Register</button>
</form>