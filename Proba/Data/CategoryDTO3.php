<?php


namespace Data;


class CategoryDTO3
{

    private const CATEGORY_NAME_MIN_LENGTH=4;
    private const CATEGORY_NAME_MAX_LENGTH=255;
    /**
     * @var int
     */
    private $category_id;
    /**
     * @var string
     */
    private $category_name;

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    /**
     * @param int $category_id
     */
    public function setCategoryId(int $category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @return string
     */
    public function getCategoryName(): string
    {
        return $this->category_name;
    }

    /**
     * @param string $category_name
     */
    public function setCategoryName(string $category_name): void
    {
        DTOValidator3::validate(self::CATEGORY_NAME_MIN_LENGTH,self::CATEGORY_NAME_MAX_LENGTH,$category_name,
            'text','Category Name');
        $this->category_name = $category_name;
    }

}