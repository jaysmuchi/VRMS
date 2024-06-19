<?php

class pubUsers{
    private $db;
    private $table_name = 'users';

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

        // function to read data 
        public function read($user_id){
            // prepare the SQL records to select all query from table
            $condition = ['role' => $user_id];
            $result = $this->db->select('users', $condition, 'id, name, email, role, image, createdAt');
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