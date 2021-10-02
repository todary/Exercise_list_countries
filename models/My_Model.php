<?php

class My_Model
{

    protected $table_name;
    protected $fields = array();
    protected $primary_key;

    protected function get_columns()
    {
        $sql = array();
        foreach ($this->fields as $column) {
            $sql[] = "{$column}='{$this->$column}'";
        }
        return implode(',', $sql);
    }

    protected function get_columns_array()
    {
        $sql = array();
        foreach ($this->fields as $column) {
            $sql[$column] = $this->$column;
        }
        return $sql;
    }

    protected function all_data($fileds =[])
    {
        global $mansDb;

        $dataFiles = "*";
        if (count($fileds)){
            $dataFiles = implode(',',$fileds);
        }

        $reslut = $mansDb->query("select $dataFiles from " . $this->table_name);
        while ($row = mysqli_fetch_assoc($reslut)) {
            $data[] = $row;
        }
        return $data;
    }

    protected function list_id()
    {
        global $mansDb;
        $primary_key = $this->primary_key;
        $reslut = $mansDb->query("select * from " . $this->table_name . " where {$this->primary_key}={$this->$primary_key}");

        while ($row = mysqli_fetch_assoc($reslut)) {
            foreach ($this->fields as $column) {
                $this->$column = $row[$column];

            }
           
        }

        return $row;
    }

    protected function add()
    {
        global $mansDb;
        return $mansDb->query("insert into " . $this->table_name . " set " . $this->get_columns());
    }

    protected function edit()
    {
        global $mansDb;
        $primary_key = $this->primary_key;
        // $primary_key="product_id";
//        echo "update " . $this->table_name . " set " . $this->get_columns() . " where {$this->primary_key}={$this->$primary_key}";
        return $mansDb->query("update " . $this->table_name . " set " . $this->get_columns() . " where {$this->primary_key}={$this->$primary_key}");
    }

    protected function delete()
    {
        global $mansDb;
        $primary_key = $this->primary_key;
        return $mansDb->query("delete  from " . $this->table_name . " where {$this->primary_key}={$this->$primary_key}");
    }

    function search()
    {
        global $mansDb;
        $field_search = $this->field_search;
        $reslut = $mansDb->query("select * from " . $this->table_name . " where {$this->field_search}='{$this->$field_search}'");
        if ($reslut->num_rows) {
            while ($row = mysqli_fetch_assoc($reslut)) {
                foreach ($this->fields as $column) {
                    $this->$column = $row[$column];
                }
            }
            return true;
        } else {
            return false;
        }
    }

}
