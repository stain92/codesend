<form method="POST">
    <?php /** @var $_SESSION['full_name']|null */?>
    <?php if(isset($_COOKIE['full_name'])){?>
    <p style="color: green">Congratulation,
     <?=$_COOKIE['full_name'];?>.Login to our platform</p>
    <?php } ?>
    <?php /** @var errors|null */ ?>
    <?php foreach($errors as $error):?>
        <p style="color: red"><?=$error?></p>
    <?php endforeach;?>
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit" name="login">Login</button>
</form>