<?php /** @var \Data\CategoryDTO3 $data */?>
<h1>Add Items</h1>
<a href="profile.php">My Profile</a>
<?php /** #var $errors|null */ ?>
<?php foreach($errors as $error):?>
    <p style="color: red"><?=$error?></p>
<?php endforeach;?>
<br><br>
<form method="POST">
    <input type="hidden" name="user_id" value="<?=$_SESSION['user_id'];?>"
    <label>
        Title: <input type="text" name="title"> <br>
    </label>
    <label>
        price: <input type="text" name="price"> <br>
    </label>
    <label>
        category:
        <select name="category_id">
            <option></option>
            <?php foreach($data as $category): /** @var \Data\CategoryDTO3 $category */?>
            <option value="<?=$category->getCategoryID();?>"><?=$category->getCategoryName();?></option>
            <?php endforeach; ?>
        </select>
    </label><br>
    <label>
        description: <textarea  name="description"></textarea><br>
    </label>
    <label>
        Image URL: <input type="text" name="image"> <br>
    </label>
    <input type="submit" name="add" value="Add">
</form>