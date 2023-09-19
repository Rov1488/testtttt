<?php
/**
 Класс Model будет работат с БД, с данными, валидация данных, фунуции для оработки данных и т.д.
 */

namespace myfream\base;


use myfream\ConnectDb;
use myfream\Request;
use myfream\Db;
use myfream\libs\Constanse;
use PDO;
use Valitron\Validator;

abstract class Model{

    public $attributes = [];
    public $errors = [];
    public $rules = [];
    public $page;
    public $sort = null;
    public $db;
    private $dbName = 'classicmodels';
    protected $tableName;

    public function __construct(){

        Db::getInstance();//ReadbeanPHP connection

        $instance = ConnectDb::getInstance(); //PDO connection
        $this->db = $instance->getConnection();
        $this->tableName = $this->tableName();

        $request = new Request();
        $this->page = $request->page;
        $this->sort = $request->sort;

    }
    //Connect table
    public function tableName(){
        return '';
    }

    /*method for load data in DB*/
    public function getData($tableName){
        $sql = "select * from {$tableName}";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);

    }
    //Count data
    public function getCount($tableName)
    {
        $count_sql = "SELECT * FROM {$tableName}";
        $count = $this->db->prepare($count_sql);
        $count->execute();
        $totalCount = $count->rowCount();
        return $totalCount;
    }

    //Get data in table with id
    public function getDataBYtableId($id = null)
    {
        if (empty($id)){
            $sql = "SELECT * FROM {$this->tableName}";
        }else{
            $sql = "SELECT * FROM {$this->tableName} where id = :id";
        }
        $sth = $this->db->prepare($sql);
        $sth->bindParam(":id", $id);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_OBJ);
    }
    //Get data in table with columnName
    public function getDataBYtableParams($columnName = null, $columParam = null)
    {
        if (empty($columnName) && empty($columParam)){
            $sql = "SELECT * FROM {$this->tableName}";
        }else{
            $sql = "SELECT * FROM {$this->tableName} where {$columnName} = :columnParam";
        }
        $sth = $this->db->prepare($sql);
        $sth->bindParam(":columnParam", $columParam);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_OBJ);
    }

    //FOR PAGINATION begin
    public function getPageCount()
    {
        $count_sql = "SELECT * FROM {$this->tableName}";
        $count_pr = $this->db->prepare($count_sql);
        $count_pr->execute();
        $totalCount = $count_pr->rowCount();
        return ceil($totalCount / Constanse::LIMIT);
    }

//getListSort
    public function getListSort($offset)
    {
        //$offset = ($page - 1) * Constanse::LIMIT;
        if (is_null($this->sort)){
            $sql = "SELECT * FROM {$this->tableName} limit $offset, ". Constanse::LIMIT;
        }else{
            $sql = "SELECT * FROM {$this->tableName} order by {$this->sort} limit $offset, ". Constanse::LIMIT;
        }
        $sth = $this->db->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }


//FOR PAGINATION
    public function getList()
    {
        $offset = ($this->page - 1) * Constanse::LIMIT;
        $sth = $this->db->prepare("SELECT * FROM {$this->tableName} limit $offset," . Constanse::LIMIT);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }
//FOR PAGINATION end

//Write CRUD functions use PDO
    public function saveData($floor, $roomNumber)
    {
        $sql = "insert into room_table (floor, room_number) 
values (:floor, :roomNumber)";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(":floor", $floor);
        $stm->bindParam(":roomNumber", $roomNumber);

        return $stm->execute();
    }

    public function updateDate($id, $floor, $roomNumber)
    {
        $sql = "update room_table set floor = :floor, room_number = :roomNumber where id=:id";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(":floor", $floor);
        $stm->bindParam(":roomNumber", $roomNumber);
        $stm->bindParam(":id", $id);
        return $stm->execute();
    }

//delete function

    public function deleteData($id, $del){

        if (!empty($del) == "del-item"){

            $sql = "DELETE FROM {$this->tableName} WHERE id = :id";
            $stm = $this->db->prepare($sql);
            $stm->bindParam(":id", $id);
            return $stm->execute();

        }else{
            $error = "Ma'lumoti o'chirishda xatolik";
            return $error;
        }

    }


    //Get column name table
    public function getColumnNames(){
        /* $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = :tableName";
         $sql_1 = "SELECT COLUMN_NAME FROM COLUMNS WHERE TABLE_SCHEMA = 'classicmodels' AND   TABLE_NAME = :tableName";*/
        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = :dbName AND TABLE_NAME = :tableName";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(':dbName', $this->dbName, PDO::PARAM_STR);
            $stm->bindValue(':tableName', $this->tableName, PDO::PARAM_STR);
            $stm->execute();
            $output = [];
            while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                $output[] = $row['COLUMN_NAME'];
            }
            return $output;
        }

        catch(PDOException $pe) {
            trigger_error('Could not connect to database. ' . $pe->getMessage() , E_USER_ERROR);
        }
    }


    //Метод который будет загружат данные из формы регистрации и проверят соответствуюет данные с свойству $attributes

    public function load($data){
        foreach ($this->attributes as $name => $value){
            if (isset($data[$name])){
                $this->attributes[$name] = $data[$name];
            }
        }
    }

    //Метод для сохранения в БД пользовательских данных при регистрации
    public function save($table, $valid = true){
        if ($valid){
            $tbl = R::dispense($table);
        } else{
            $tbl = R::xdispense($table);
        }

        foreach ($this->attributes as $name => $value){
            $tbl->$name = $value;
        }
        return R::store($tbl);
    }

    //Метод для обнавления в БД пользовательских данных

    public function update($table, $id){
        $bean = R::load($table, $id);
        foreach ($this->attributes as $name => $value){
            $bean->$name = $value;
        }
        return R::store($bean);
    }

    //Метод для валидаци и проверки данных
    public function validate($data){
        Validator::langDir(WWW . '/validator/lang');
        Validator::lang('ru');
        $v = new Validator($data);
        $v->rules($this->rules);

        if ($v->validate()){
            return true;
        }
        $this->errors = $v->errors();
        return false;


    }

    //Метод для вывода ошибок
    public function getErrors(){
        $errors = '<ul>';
        foreach ($this->errors as $error){
            foreach ($error as $item){
                $errors .= "<li>$item</li>";
            }

        }
        $errors .= '</ul>';
        $_SESSION['error'] = $errors;
    }



}