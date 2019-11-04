<?php 
class application_db {

    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM application';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $applications = [];

        foreach ($rows as $value) {
            $applications[$value['id']] = new application($value['id'], $value['openingID'], $value['isProcessed'], $value['coverLetter'], $value['resume'], $value['userID']);
        }
        $statement->closeCursor();

        return $applications;
    }

    public static function get_application_by_id($id) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM application
              WHERE ID= :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $value = $statement->fetch();
        
        $applications = new application($value['id'], $value['openingID'], $value['isProcessed'], $value['coverLetter'], $value['resume'], $value['userID']);
        
        $statement->closeCursor();

        return $applications;
    }

    public static function get_application_by_userID($userID) {
        $db = Database::getDB();
        $query = 'SELECT userID
              FROM application
              WHERE userID= :userID';

        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $value = $statement->fetch();

        $applications = new application($value['id'], $value['openingID'], $value['isProcessed'], $value['coverLetter'], $value['resume'], $value['userID']);
        
        $statement->closeCursor();

        return $applications;
    }

    public static function add_user($openingID, $isProcessed, $coverLetter, $resume, $userID) {
        $db = Database::getDB();
        $query = 'INSERT INTO application
                 (openingID, isProcessed, coverLetter, resume, userID)
              VALUES
                 (:openingID, :isProcessed, :coverLetter, :resume, :userID)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':openingID', $openingID);
            $statement->bindValue(':isProcessed', $isProcessed);
            $statement->bindValue(':coverLetter', $coverLetter);
            $statement->bindValue(':resume', $resume);
            $statement->bindValue(':userID', $userID);
           
            $statement->execute();
            $statement->closeCursor();

            // Get the last product ID that was automatically generated
            $application_id = $db->lastInsertId();
            return $application_id;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function update_application($openingID, $isProcessed, $coverLetter, $resume, $userID) {
        $db = Database::getDB();
        $query = $query = 'UPDATE application
              SET openingID = :openingID,
                  isProcessed = :isProcessed,
                  coverLetter = :coverLetter,
                  resume = :resume,
                  userID = :userID
                WHERE ID = :ID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':openingID', $openingID);
            $statement->bindValue(':isProcessed', $isProcessed);
            $statement->bindValue(':coverLetter', $coverLetter);
            $statement->bindValue(':resume', $resume);
            $statement->bindValue(':userID', $userID);
            $statement->bindValue(':ID', $ID);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function delete_by_ID($id) {
        $db = Database::getDB();
        $query = 'DELETE from application WHERE id= :id';
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
