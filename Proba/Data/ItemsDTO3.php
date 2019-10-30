<?php


namespace Data;


class ItemsDTO3
{

    private const TITLE_MIN_LENGTH=4;
    private const TITLE_MAX_LENGTH=255;

    private const PRICE_MIN_LENGTH=4;
    private const PRICE_MAX_LENGTH=255;

    private const DESCRIPTION_MIN_LENGTH=4;
    private const DESCRIPTION_MAX_LENGTH=255;

    private const IMAGE_MIN_LENGTH=4;
    private const IMAGE_MAX_LENGTH=255;

    /**
     * @var int
     */
    private $item_id;
    /**
     * @var string
     */
    private $title;
    /**
     * @var float
     */
    private $price;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $image;
    /**
     * @var int
     */
    private $category_id;
    /**
     * @var int
     */
    private $user_id;

    /**
     * @return int
     */
    public function getItemId(): int
    {
        return $this->item_id;
    }

    /**
     * @param int $item_id
     */
    public function setItemId(int $item_id): void
    {
        $this->item_id = $item_id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @throws \Exception
     */
    public function setTitle(string $title): void
    {
        DTOValidator3::validate(self::TITLE_MIN_LENGTH,self::TITLE_MAX_LENGTH,
            $title,'text','Title');
        $this->title = $title;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }


    public function setPrice($price): void
    {
        DTOValidator3::validate(self::PRICE_MIN_LENGTH,self::PRICE_MAX_LENGTH,
            $price,'number','Price');
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        DTOValidator3::validate(self::DESCRIPTION_MIN_LENGTH,self::DESCRIPTION_MAX_LENGTH,
            $description,'text','Description');
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        DTOValidator3::validate(self::IMAGE_MIN_LENGTH,self::IMAGE_MAX_LENGTH,
            $image,'text','Image');
        $this->image = $image;
    }

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
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }


}