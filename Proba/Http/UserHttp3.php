<?php


namespace Http;


use Core\DataBinding3;
use Core\Template3;
use Data\UserDTO3;
use Services\UserServices3;

class UserHttp3 extends  HttpAbstracts3
{
    /**
     * @var DataBinding3
     */
    private $data_bind;
    /**
     * @var Template3
     */
    private $template;
    /**
     * @var UserServices3
     */
    private $user_services;

    /**
     * UserHttp1 constructor.
     * @param DataBinding3 $data_bind
     * @param Template3 $template
     * @param UserServices3 $user_services
     */
    public function __construct(DataBinding3 $data_bind, Template3 $template, UserServices3 $user_services)
    {
        $this->data_bind = $data_bind;
        $this->template = $template;
        $this->user_services = $user_services;
    }

    public function check()
    {
        if(isset($_SESSION['user_id']))
        {
            $this->redirect('profile.php');
        }
    }


    public function register(array $data=[])
    {
        $this->check();
        if(isset($data['register']))
        {
                try {
                    $user = $this->data_bind->bind($data, UserDTO3::class);

                    $full_name = $this->user_services->register($user, $data['confirm_password']);
                    setcookie('full_name', $full_name, time() + 5, "/");
                    $this->redirect('login.php');
                }
                catch (\Exception $ex){
                   $this->template->render('register',null,[$ex->getMessage()]);
                }
        }else{
            $this->template->render('register');
        }
    }

    public function login(array $data=[])
    {
        if(isset($data['login']))
        {
            try {
                $user_id = $this->user_services->login($data['username'], $data['password']);
                $_SESSION['user_id'] = $user_id;

                $this->redirect('profile.php');
            }catch(\Exception $ex){
                $this->template->render('login',null,[$ex->getMessage()]);
            }
        }else{
            $this->template->render('login');
        }
    }


}