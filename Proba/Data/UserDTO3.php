<?php


namespace Data;


class UserDTO3
{
    private const USERNAME_MIN_LENGTH=4;
    private const USERNAME_MAX_LENGTH=255;

    private const PASSWORD_MIN_LENGTH=4;
    private const PASSWORD_MAX_LENGTH=255;

    private const FULL_NAME_MIN_LENGTH=5;
    private const FULL_NAME_MAX_LENGTH=255;

    private const LOCATION_MIN_LENGTH=4;
    private const LOCATION_MAX_LENGTH=255;
    /**
     * @var int
     */
    private $user_id;
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $full_name;
    /**
     * @var string
     */
    private $location;

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @throws \Exception
     */
    public function setUsername(string $username)
    {
        DTOValidator3::validate(self::USERNAME_MIN_LENGTH,self::USERNAME_MAX_LENGTH,
        $username,'text','Username');
            $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $password
     * @throws \Exception
     */
    public function setPassword($password)
    {
        DTOValidator3::validate(self::PASSWORD_MIN_LENGTH,self::PASSWORD_MAX_LENGTH,$password,
                                   'text','Password');
        $this->password = $password;
    }

    public function setPasswordHash(){
        $this->password=password_hash($this->password,PASSWORD_DEFAULT);
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->full_name;
    }

    /**
     * @param string $full_name
     */
    public function setFullName($full_name)
    {
        DTOValidator3::validate(self::FULL_NAME_MIN_LENGTH,self::FULL_NAME_MAX_LENGTH,$full_name,
            'text','FullName');
        $this->full_name = $full_name;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation($location)
    {
        DTOValidator3::validate(self::LOCATION_MIN_LENGTH,self::LOCATION_MAX_LENGTH,$location,
            'text','Location');
        $this->location = $location;
    }


}