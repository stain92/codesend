<?php


namespace Services;


use Repository\CategoriesRepository3;

class CategoriesServices3
{
    /**
     * @var CategoriesRepository3
     */
    private $category_services;

    /**
     * CategoriesServices3 constructor.
     * @param CategoriesRepository3 $category_services
     */
    public function __construct(CategoriesRepository3 $category_services)
    {
        $this->category_services = $category_services;
    }

    public function getAll()
    {
        return $this->category_services->findAll();
    }
}