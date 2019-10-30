<?php


namespace Services;


use Data\EditItemDTO3;
use Data\ItemsDTO3;
use Repository\ItemsRepository3;

class ItemsServices3
{
    /**
     * @var ItemsRepository3
     */
    private $items_repository;

    /**
     * ItemsServices3 constructor.
     * @param ItemsRepository3 $items_repository
     */
    public function __construct(ItemsRepository3 $items_repository)
    {
        $this->items_repository = $items_repository;
    }

    /**
     * @param ItemsDTO3 $item
     * @throws \Exception
     */
    public function add(ItemsDTO3 $item)
    {
        if($item)
        {
            $this->items_repository->add($item);
        }else{
            throw new \Exception('Invalid item');
        }

    }

    public function myItems(int $user_id){
        return $this->items_repository->myItems($user_id);
    }

    public function allItems()
    {
        return $this->items_repository->AllItems();
    }

    public function getOneByItemID(int $item_id)
    {
        return $this->items_repository->getOneByItemID($item_id);
    }

    public function update_item(ItemsDTO3 $item, int $item_id)
    {
        $this->items_repository->update($item,$item_id);
    }

    public function delete(int $item_id)
    {
        $this->items_repository->delete($item_id);
    }
}