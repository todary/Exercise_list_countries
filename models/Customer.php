<?php

class Customer extends My_Model
{

    protected $table_name = "customer";
    protected $primary_key = "id";
    public $id;
    public $name;
    public $username;
    public $password;
    protected $fields = array("name", "phone");

//    public $fields2 = array("title", "test", "image");

    public function __construct($id = -1)
    {
        if ($id != -1) {
            $this->id = $id;
            $result = $this->list_data_id();
        }
    }




    function list_data($fileds=[])
    {
        return $this->all_data($fileds);
    }


    function list_data_id()
    {
//        $this->fields=array("id");
//        $this->list_id();
        return $this->list_id();
    }

    function insert_data()
    {
        return $this->add();
    }

    function update_data()
    {
        return $this->edit();
    }

    function delete_data()
    {
        return $this->delete();
    }

    function getCount()
    {
        global $mansDb;
        $reslut = $mansDb->query("SELECT COUNT(id) AS customers  from " . $this->table_name);
        return mysqli_fetch_assoc($reslut);

    }



}
