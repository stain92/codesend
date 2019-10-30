<?php


namespace Services;


use Data\UserDTO3;
use Repository\UserRepository3;

class UserServices3
{
    /**
     * @var UserRepository3
     */
    private $user_repository;

    /**
     * UserServices3 constructor.
     * @param UserRepository3 $user_repository
     */
    public function __construct(UserRepository3 $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    public function register(UserDTO3 $user, string $confirm_password)
    {
        $check = $this->user_repository->getOneByName($user->getUsername());
        if($check)
        {
            throw new \Exception('Username already taken');
        }
        if($user->getPassword()!==$confirm_password){
            throw new \Exception('Password miss match');
        }
            $user->setPasswordHash();
            return $this->user_repository->insert($user);

    }

    public function login($username,$password)
    {
        $user=$this->user_repository->getOneByName($username);
        if($user)
        {
            /** @var UserDTO3 $user */
            if(!password_verify($password,$user->getPassword()))
            {
                throw new \Exception('Invalid Password');
            }
            return $user->getUserId();

        }else{
            throw new \Exception('Your username does not exist.You 
            might want to <a href="register.php">register</a> first.');
        }
    }

    public function get_current():?UserDTO3
    {
        if(!isset($_SESSION['user_id']))
        {
            return null;
        }
        return $this->user_repository->getOneById(($_SESSION['user_id']));
    }

}