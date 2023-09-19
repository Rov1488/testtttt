<?php


namespace myfream;


class Request
{
    public $page = 1;
    public $getSort;
    public $sort = null;//?sort=ustunNomi,desc
    public $sorType = 'asc';

    public function __construct()
    {
        if (isset($_GET['page']) && !empty($_GET['page'])){
            $this->page = $_GET['page'];
        }
//Sorting by title
        if (isset($_GET['sort']) && !empty($_GET['sort'])){
            $this->getSort = $_GET['sort'];
            $s_elements = explode(',',  $this->getSort);
            $s_title = $s_elements[0];
            $s_type = $s_elements[1];
            $this->sorType = $s_type;
            $this->sort = $s_title ." ". $s_type;

        }

    }
}