<?php


namespace Repository;


use Data\AllItemsDTO3;
use Data\EditItemDTO3;
use Data\MyItemsDTO3;
use Data\ItemsDTO3;
use Database\PDODatabase;


class ItemsRepository3
{

    /**
     * @var PDODatabase
     */
    private $db;

    /**
     * ItemsRepository3 constructor.
     * @param PDODatabase $db
     */
    public function __construct(PDODatabase $db)
    {
        $this->db = $db;
    }

    public function add(ItemsDTO3 $items)
    {
        $stm=$this->db->query('INSERT INTO items (title,price,description,image,category_id,user_id)
                                VALUES (:title,:price,:description,:image,:category_id,:user_id)')
            ->execute(['title'=>$items->getTitle(),
                        'price'=>$items->getPrice(),
                        'description'=>$items->getDescription(),
                        'image'=>$items->getImage(),
                        'category_id'=>$items->getCategoryId(),
                        'user_id'=>$items->getUserId()]);
    }

    /**
     * @param int $user_id
     * @return \Generator
     */
    public function myItems(int $user_id){
        return $stm=$this->db->query('SELECT item_id,category_id,title,category_name,price FROM items
                                INNER JOIN categories USING(category_id)
                                WHERE user_id=:user_id
                                ORDER BY category_id ASC, price DESC')
            ->execute(['user_id'=>$user_id])->fetch(MyItemsDTO3::class);

    }

    public function AllItems()
    {
        return $stm=$this->db->query('SELECT item_id,category_id,title,category_name,price,username,location FROM items
                                INNER JOIN categories USING(category_id)
                                INNER JOIN users USING (user_id)
                                ORDER BY location DESC , category_id ASC, price ASC')
            ->execute()->fetch(AllItemsDTO3::class);

    }

    public function getOneByItemID(int $item_id)
    {
        return $stm=$this->db->query('SELECT item_id,category_id,title,category_name,price,description,image,user_id FROM items
                                INNER JOIN categories USING(category_id)
                                WHERE item_id=:item_id
                                ORDER BY category_id ASC, price DESC')
            ->execute(['item_id'=>$item_id])->getOne(ItemsDTO3::class);

    }

    public function update(ItemsDTO3 $item, int $item_id)
    {
        $stm=$this->db->query('UPDATE items SET title=:title,
                                                price=:price,
                                                category_id=:category_id,
                                                description=:description,
                                                image=:image
                                                WHERE item_id=:item_id')
            ->execute(['title'=>$item->getTitle(),
                        'price'=>$item->getPrice(),
                        'category_id'=>$item->getCategoryId(),
                        'description'=>$item->getDescription(),
                        'image'=>$item->getImage(),
                        'item_id'=>$item->getItemId()]);
    }

    public function delete(int $item_id)
    {
        $stm=$this->db->query('DELETE FROM items WHERE item_id=:item_id')
            ->execute(['item_id'=>$item_id]);
    }

}