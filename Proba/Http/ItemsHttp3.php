<?php


namespace Http;


use Core\DataBinding3;
use Core\Template3;
use Data\EditItemDTO3;
use Data\ItemsDTO3;
use Data\UserDTO3;
use Services\CategoriesServices3;
use Services\ItemsServices3;
use Services\UserServices3;

class ItemsHttp3 extends HttpAbstracts3
{
    /**
     * @var Template3
     */
    private $template;
    /**
     * @var UserServices3
     */
    private $user_services;

    /**
     * @var CategoriesServices3
     */
    private $category_services;
    /**
     * @var DataBinding3
     */
    private $data_binder;
    /**
     * @var ItemsServices3
     */
    private $items_services;

    /**
     * ItemsHttp3 constructor.
     * @param Template3 $template
     * @param UserServices3 $user_services
     */
    public function __construct(Template3 $template, UserServices3 $user_services,
                                CategoriesServices3 $category_services, DataBinding3 $data_binder,
                                ItemsServices3 $items_services)
    {
        $this->data_binder=$data_binder;
        $this->items_services=$items_services;
        $this->category_services=$category_services;
        $this->template = $template;
        $this->user_services = $user_services;
    }

    public function check()
    {
        if(isset($_SESSION['user_id']))
        {
            return true;
        }else
        {
            $this->redirect('login.php');
        }
    }

    /**
     * ItemsHttp3 constructor.
     * @param Template3 $template
     */


    public function profile(){
        $this->check();
        $user=$this->user_services->get_current();
        if($user)
        {
            $this->template->render('profile',$user);
        }else{
            $this->redirect('login.php');
        }

    }

    /**
     * @param array $data
     * @throws \ReflectionException
     */
    public function add_item(array $data=[])
    {
        $this->check();
        if(isset($data['add']))
        {
            try {
                $item=$this->data_binder->bind($data,ItemsDTO3::class);
               $this->items_services->add($item);
               $this->redirect('my_items.php');
            }catch (\Exception $ex)
            {
                $this->template->render('add_item',$this->category_services->getAll(),[$ex->getMessage()]);
            }

        }
        $this->template->render('add_item', $this->category_services->getAll());
    }

    public function my_items()
    {
        $this->check();
        $this->template->render('my_items',$this->items_services->myItems($_SESSION['user_id']));
    }

    public function all_items()
    {
        $this->template->render('all_items',$this->items_services->allItems());
    }

    /**
     * @param int $item_id
     * @throws \ReflectionException
     */
    public function edit_items(int $item_id, array $datas=[])
    {
        $this->check();
        if(isset($datas['edit']))
        {
            try {
                /** @var ItemsDTO3 $item $item */
                $item=$this->data_binder->bind($datas,ItemsDTO3::class);

                    $item->setItemId($item_id);
                    $this->items_services->update_item($item, $item_id);
                    $this->redirect('my_items.php');
            }catch (\Exception $ex)
            {
                /** @var ItemsDTO3 $data $data */
                $data = $this->items_services->getOneByItemID($item_id);
                $item = new EditItemDTO3();
                /** @var EditItemDTO3 $item $item */
                $item->setItemId($item_id);
                $item->setTitle($data->getTitle());
                $item->setPrice($data->getPrice());
                $item->setDescription($data->getDescription());
                $item->setImage($data->getImage());
                $item->setUserId($_SESSION['user_id']);
                $item->setCategories($this->category_services->getAll());
                $item->setCategoryId($data->getCategoryId());
                $this->template->render('edit_item',$item,[$ex->getMessage()]);
            }
        }else {
            /** @var ItemsDTO3 $data $data */
            $data = $this->items_services->getOneByItemID($item_id);
            if($data->getUserId()==$_SESSION['user_id']) {
                /** @var EditItemDTO3 $item $item */
                $item = new EditItemDTO3();
                $item->setItemId($item_id);
                $item->setTitle($data->getTitle());
                $item->setPrice($data->getPrice());
                $item->setDescription($data->getDescription());
                $item->setImage($data->getImage());
                $item->setUserId($_SESSION['user_id']);
                $item->setCategories($this->category_services->getAll());
                $item->setCategoryId($data->getCategoryId());

                $this->template->render('edit_item', $item);
            }else{
                $this->redirect('profile.php');
            }
        }
    }

    public function delete_item(int $item_id)
    {
        $this->check();
        /** @var ItemsDTO3 $item $item */
        $item=$this->items_services->getOneByItemID($item_id);
        if($item->getUserId()==$_SESSION['user_id'])
        {
            $this->items_services->delete($item_id);
            $this->redirect('my_items.php');
        }else{
            $this->redirect('profile.php');
        }

    }

    public function view (int $item_id)
    {

    }



}