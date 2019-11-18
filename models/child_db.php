<?php

class child_db{
    
    public static function add_child($stuId, $parentId, $fName, $lName, $age) {
        $db = Database::getDB();
        $query = 'INSERT INTO student
                 (studentId, parentId, stuFName, stuLName, age)
              VALUES
                 (:stuId, :parentId, :fName, :lName, :age)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':stuId', $stuId);
            $statement->bindValue(':parentId', $parentId);
            $statement->bindValue(':fName', $fName);
            $statement->bindValue(':lName', $lName);
            $statement->bindValue(':age', $age);
           
            $statement->execute();
            $statement->closeCursor();

           
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function get_children_byParentId($id){
        $db = Database::getDB();
        
        $query = 'SELECT * from student
                WHERE parentId = :id';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        

        if ($statement->rowCount() > 0) {
            $rows = $statement->fetchAll();
        } else{
            $rows=false;
        }
        
       
        $statement->closeCursor();
        return $rows;
       
    }
    
    public static function get_child_byId($id){
        $db = Database::getDB();
        
        $query = 'SELECT * from student 
                WHERE studentId = :id';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $row = $statement->fetch();
        
        return $row;

        
    }
    
}



