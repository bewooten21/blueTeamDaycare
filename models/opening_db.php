<?php 
class opening_db {

    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM company
                       WHERE  childCapacity - childrenEnrolled > 0'
                ;
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        

        return $rows;
    }
    
    public static function select_allApproved() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM company JOIN companyapproval ON
                        company.companyID= companyapproval.companyID
                       WHERE  company.childCapacity - company.childrenEnrolled > 0 && companyapproval.isProcessed =1'
                ;
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        

        return $rows;
    }
    public static function get_opening_by_id($id) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM opening
              WHERE ID= :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $value = $statement->fetch();
        
        $openings = new opening($value['id'], $value['companyID'], $value['type'], $value['openingName'], $value['instanceOfTypeID'], $value['description'], $value['availableCount']);
        
        $statement->closeCursor();

        return $openings;
    }

    public static function get_opening_by_companyID($companyID) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM opening
              WHERE companyID= :companyID';

        $statement = $db->prepare($query);
        $statement->bindValue(':companyID', $companyID);
        $statement->execute();
        $value = $statement->fetch();

        $openings = new opening($value['id'], $value['companyID'], $value['type'], $value['openingName'], $value['instanceOfTypeID'], $value['description'], $value['availableCount']);
        
        $statement->closeCursor();

        return $openings;
    }
    
    public static function add_opening($companyID, $type, $openingName, $instanceOfTypeID, $description, $availableCount) {
        $db = Database::getDB();
        $query = 'INSERT INTO opening
                 (companyID, type, openingName, instanceOfTypeID, description, availableCount)
              VALUES
                 (:companyID, :type, :openingName, :instanceOfTypeID, :description, :availableCount)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':companyID', $companyID);
            $statement->bindValue(':type', $type);
            $statement->bindValue(':openingName', $openingName);
            $statement->bindValue(':instanceOfTypeID', $instanceOfTypeID);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':availableCount', $availableCount);
           
            $statement->execute();
            $statement->closeCursor();

            // Get the last product ID that was automatically generated
            $opening_id = $db->lastInsertId();
            return $opening_id;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function update_opening($ID, $companyID, $type, $openingName, $instanceOfTypeID, $description, $availableCount) {
        $db = Database::getDB();
        $query = $query = 'UPDATE opening
              SET companyID = :companyID,
                  type = :type,
                  openingName = :openingName,
                  instanceOfTypeID = :instanceOfTypeID,
                  description = :description
                  availableCount = :availableCount
                WHERE ID = :ID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':companyID', $companyID);
            $statement->bindValue(':type', $type);
            $statement->bindValue(':openingName', $openingName);
            $statement->bindValue(':instanceOfTypeID', $instanceOfTypeID);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':availableCount', $availableCount);
            $statement->bindValue(':ID', $ID);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function delete_opening_by_ID($id) {
        $db = Database::getDB();
        $query = 'DELETE from opening WHERE id= :id';
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
