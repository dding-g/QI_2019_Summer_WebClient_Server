<?php
namespace App\Model;

final class testModel extends BaseModel
{
    public function getByEmail($email) {
        $sql = "SELECT id from customers where email = ?";
        $sth = $this->db->prepare($sql);
        $sth->execute(array($email));
        $results = $sth->fetch();

        return $results;
    }
    
    public function addUser($user) {
        $sql = "INSERT into customers (fname, lname, email) values (?, ?, ?)";
        $sth = $this->db->prepare($sql);
        $sth->execute(array($user['fname'], $user['lname'], $user['email']));
        $last_id = $this->db->lastInsertId();
        
        return $last_id;
    }

}
