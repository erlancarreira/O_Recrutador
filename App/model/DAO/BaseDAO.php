<?php
include_once("config.php");

abstract class BaseDAO 
{
   
    private $connect;

    public function __construct()
    {
        $this->connect = Database::getConnection();
    }

    public function select($sql) 
    {
       
        if(!empty($sql))
        {
            
            return $this->connect->query($sql);
                
        }
    }

    public function insert($table, $cols, $values, $lastInsert = false) 
    {
        if(!empty($table) && !empty($cols) && !empty($values))
        {
            $parametros    = $cols;
            $colunas       = str_replace(":", "", $cols);

            $stmt = $this->connect->prepare("INSERT INTO $table ($colunas) VALUES ($parametros)");
            $stmt->execute($values);
            if($lastInsert) {
               return $stmt->lastInsetId = $this->connect->lastInsertId(); 
            }
            return $stmt->rowCount();
        }else{
            return false;
        }
    }

    public function update($table, $cols, $values, $where=null) 
    {
        // print_r($table); 
        // print_r($cols);
        // print_r($values);
        // print_r($where); 
        if(!empty($table) && !empty($cols) && !empty($values))
        {
            
            if($where)
            {
                $where = " WHERE $where ";
            }

            $stmt = $this->connect->prepare("UPDATE $table SET $cols $where");
            $stmt->execute($values);
            
            if($stmt->rowCount()) { 
                
                return $stmt->rowCount();
            }
        }
        else{
            return false;
        }
    }
    
    public function delete($table, $where=null) 
    {
        if(!empty($table))
        {
            /*
                DELETE usuario WHERE id = 1
            */

            if($where)
            {
                $where = " WHERE $where ";
            }

            $stmt = $this->connect->prepare("DELETE FROM $table $where");
            $stmt->execute();

            return $stmt->rowCount();
        }else{
            return false;
        }
    }
}