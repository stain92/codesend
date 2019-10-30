<?php /** @var \Data\EditItemDTO3 $data */?>
<h1>Edit Items</h1>
<?php /** #var $errors|null */ ?>
<?php foreach($errors as $error):?>
<p style="color: red"><?=$error?></p>
<?php endforeach;?>
<a href="profile.php">My Profile</a>
<br><br>
<form method="POST">
    <input type="hidden" name="user_id" value="<?=$_SESSION['user_id'];?>"
    <label>
        Title: <input type="text" name="title" value="<?=$data->getTitle() ?>"> <br>
    </label>
    <label>
        price: <input type="text" name="price" value="<?=$data->getPrice() ?>"> <br>
    </label>
    <label>
        category:
        <select name="category_id">
            <?php foreach($data->getCategories() as $category): /** @var \Data\CategoryDTO3 $category */?>
                <option <?=($data->getCategoryId()==$category->getCategoryId())?'selected':'';?> value="<?=$category->getCategoryID();?>"><?=$category->getCategoryName();?></option>
            <?php endforeach; ?>
        </select>
    </label><br>
    <label>
        description: <textarea  name="description"><?=$data->getDescription()?></textarea><br>
    </label>
    <label>
        Image URL: <input type="text" name="image" value="<?=$data->getImage()?>"> <br>
    </label>
    <img src="<?=$data->getImage()?>">
    <input type="submit" name="edit" value="Edit">

</form>