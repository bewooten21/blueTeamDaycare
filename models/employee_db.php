<?php 
class employee_db {

    public static function get_employee_by_id($id) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM employee
              WHERE empID= :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $value = $statement->fetch();
        
        $statement->closeCursor();

        return $value;
    }

    public static function get_employees_by_companyID($companyID) {
        $db = Database::getDB();
        $query='SELECT *
            from employee JOIN application ON
            employee.applicationID=application.applicationID
            JOIN job ON
            application.jobID=job.jobID
            JOIN user ON
            application.userID=user.id
            WHERE job.companyID = :companyID
            ORDER by user.lName asc';

        $statement = $db->prepare($query);
        $statement->bindValue(':companyID', $companyID);
        $statement->execute();
        $values = $statement->fetchAll();
        
        $statement->closeCursor();

        return $values;
    }
    
     public static function add_employee($applicationID) {
        $db = Database::getDB();
        $query = 'INSERT INTO employee
                 (applicationID)
              VALUES
                 (:applicationID)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':applicationID', $applicationID);
           
            $statement->execute();
            $statement->closeCursor();

            // Get the last product ID that was automatically generated
            $employee_id = $db->lastInsertId();
            return $employee_id;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }   

    public static function delete_by_ID($id) {
        $db = Database::getDB();
        $query = 'DELETE from employee WHERE empID= :id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
}
