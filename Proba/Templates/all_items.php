<?php /**  @var $data|null */ ?>
<h1>ALL ITEMS</h1>
<br>
<p><a href="">Add new item</a>|<a href="profile.php">My Profile</a>|<a href="logout.php">LogOut</a></p>
<br>
<table border="2">
    <tr>
        <td>Title</td>
        <td>Category</td>
        <td>Price</td>
        <td>Username</td>
        <td>Location</td>
        <td>Details</td>
    </tr>
    <?php
    foreach ($data as $item) {
        /** @var $item \Data\AllItemsDTO3 */?>
        <tr>
            <td><?=$item->getTitle() ?></td>
            <td><?=$item->getCategoryName() ?></td>
            <td><?=$item->getPrice() ?></td>
            <td><?=$item->getUsername() ?></td>
            <td><?=$item->getLocation() ?></td>
            <td><a href="view.php?id=<?=$item->getItemId()?>">Details</a></td>
        </tr>
    <?php } ?>
</table>