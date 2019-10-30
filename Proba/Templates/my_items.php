<h1>MY ITEMS</h1>
<?php /** @var $data|null */

use Data\MyItemsDTO3;

;?>

<br>
<p><a href="add_items.php">Add new Item</a>|<a href="profile.php">My Profile</a>|<a href="logout.php">LogOut</a></p>
    <table border="2">
        <tr>
            <td>Title</td>
            <td>Category</td>
            <td>Price</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        <?php foreach ($data as $item) {
        /** @var $item MyItemsDTO3 */?>
        <tr>
            <td><?=$item->getTitle() ?></td>
            <td><?=$item->getCategoryName() ?></td>
            <td><?=$item->getPrice() ?></td>
            <td><a href="edit_item.php?id=<?=$item->getItemId() ?>">Edit</a></td>
            <td><a href="delete.php?id=<?=$item->getItemId()?>">Delete</a></td>
            </tr>
        <?php } ?>
    </table>
