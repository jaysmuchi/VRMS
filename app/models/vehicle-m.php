<?php

class VehicleProfile{
    protected $db;
    protected $table_name = 'vehicles';

    public function __construct(Database $db){
        $this->db = $db;
    }

       // function to read data 
       public function read(){
        // prepare the SQL records to select all query from table
        $result = $this->db->select($this->table_name);
        
        // check if any record where returned
        if ($result && count($result) > 0) {
            return $result;  // return all record as an associative array
        }else {
            echo "No records found!";
            
            return [];
        }
    }

    // function to create data
    public function create($data){
        return $this->db->insert($this->table_name, $data);
    }

    // function to upadate data
    public function update($data, $conditions){
        return $this->db->update($this->table_name, $data, $conditions);
    }

    // function to delete data
    public function delete($conditions){
        return $this->db->delete($this->table_name, $conditions);
    }
}
?>