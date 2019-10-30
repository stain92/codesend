<?php


namespace Repository;


use Data\UserDTO3;
use Database\PDODatabase;

class UserRepository3
{
    /**
     * @var PDODatabase
     */
    private $db;

    /**
     * UserRepository1 constructor.
     * @param PDODatabase $db
     */
    public function __construct(PDODatabase $db)
    {
        $this->db = $db;
    }

    public function insert(UserDTO3 $user){
        $stm = $this->db->query('INSERT INTO users(username,password,full_name,location)
                                   VALUES(:username,:password,:full_name,:location)');
        $stm->execute(['username'=>$user->getUsername(),
                        'password'=>$user->getPassword(),
                        'full_name'=>$user->getFullName(),
                        'location'=>$user->getLocation()]);
        return $user->getFullName();
    }

    public function getOneById(int $id):?UserDTO3
    {
        $stm=$this->db->query('SELECT user_id,username,password,full_name,location 
                                FROM users WHERE user_id=:user_id');
        $result= $stm->execute(['user_id'=>$id]);
        return $result->getOne(UserDTO3::class);
    }

    public function getOneByName(string $username)
    {
        $stm=$this->db->query('SELECT user_id,username,password,full_name,location 
                                FROM users WHERE username=:username');
         return  $stm->execute(['username'=>$username])->getOne(UserDTO3::class);

    }

}