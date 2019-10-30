<?php


namespace Repository;


use Data\CategoryDTO3;
use Database\PDODatabase;

class CategoriesRepository3
{
    /**
     * @var PDODatabase
     */
    private $db;

    /**
     * CategoriesRepository3 constructor.
     * @param PDODatabase $db
     */
    public function __construct(PDODatabase $db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        return $this->db->query('SELECT category_id, category_name FROM categories ORDER BY category_id')
            ->execute()->fetch(CategoryDTO3::class);

    }

}