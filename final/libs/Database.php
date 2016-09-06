<?php

class Database extends PDO {

    public function __construct() {
        parent::__construct(DB_TYPE . ':host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }
    
    /**
     * @param type $sql An SQL String
     * @param type $array Parameters to bind
     * @param type constant $fetchMode A PDO Fetch mode
     * @return mixed 
     */
    public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC){
        $sth = $this->prepare($sql);
        foreach($data as $key => $value){
            $sth->bindValue(":$key", $value);
        }
        $sth->execute();
        return $sth->fetchAll($fetchMode);
        
        
        //Example
//        public function userList(){
//            return $this->db->select("SELECT id, login, role FROM users WHERE id = :id", array('id' => $id));
//        }
    }
    
    /**
     * 
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     */
    public function insert($table, $data){
        
        //sort the associative array
        ksort($data);
        $fieldNames = implode("`, `", array_keys($data));
        $fieldValues = ":" . implode(", :", array_keys($data));
        
        
        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
        
        foreach($data as $key => $value){
            $sth->bindValue(":$key", $value);
        }
            
        $sth->execute();
        
        
//Example
//       function create($data){
//            $this->db->insert("users", array(
//                'login' => $data['login'],
//                'password' => HASH::create('md5', $data['password'], HASH_PASSWORD_KEY),
//                'role' => $data['role']
//            ));
//        }
   
    }
    
    /**
     * 
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     * @param string $where the WHERE query part
     */
    public function update($table, $data, $where){
        //sort the associative array
        ksort($data);
        // looping through the array to find which data needs to set 
        $fieldDetails = null;
        foreach($data as $key => $value){
            $fieldDetails .= "`$key`=:$key, ";
        }
        $fieldDetails = rtrim($fieldDetails, ',');
        
        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        
        foreach($data as $key => $value){
            $sth->bindValue(":$key", $value);
        }
            
        $sth->execute();
        
        //Example
//       function create($data){
//            $this->db->update("users", array(
//                'login' => $data['login'],
//                'password' => HASH::create('md5', $data['password'], HASH_PASSWORD_KEY),
//                'role' => $data['role']
//            ), "`id` = {$data['id']}");
//        }
    }
    
    /**
     * 
     * @param string $table
     * @param string $where
     * @param integer $limit
     * @return integer Affected Rows
     */
    public function delete($table, $where, $limit){
       return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
       //Example 
//       public function deleteUser($id){
//           $this->db->delete('user', "id = '$id'");
//       }
       
       
    }
    
}

