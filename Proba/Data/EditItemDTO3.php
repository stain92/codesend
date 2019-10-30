<?php


namespace Data;


class EditItemDTO3 extends ItemsDTO3
{
    private $categories;

    /**
     * @return CategoryDTO3[]|\Generator
     */
    public function getCategories() :\Generator
    {
        return $this->categories;
    }

    /**
     * @param mixed $categories
     */
    public function setCategories($categories): void
    {
        $this->categories = $categories;
    }

}