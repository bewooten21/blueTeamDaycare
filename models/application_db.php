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
            $applications[$value['applicationID']] = new application($value['applicationId'], $value['jobID'], $value['isProcessed'], $value['isApproved'],$value['coverLetter'], $value['resume'], $value['userID']);
        }
        $statement->closeCursor();

        return $applications;
    }

    public static function get_application_by_id($id) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM application
              WHERE applicationID= :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $value = $statement->fetch();
        
        $applications = new application($value['applicationID'], $value['jobID'], $value['isProcessed'], $value['isApproved'],$value['coverLetter'], $value['resume'], $value['userID']);
        
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

        $applications = new application($value['applicationID'], $value['jobID'], $value['isProcessed'], $value['isApproved'],$value['coverLetter'], $value['resume'], $value['userID']);
        
        $statement->closeCursor();

        return $applications;
    }
    
    public static function get_applications_by_companyID($companyID, $jobID) {
        $db = Database::getDB();
        $query='SELECT *
            from application JOIN job ON
            application.jobID=job.id
            JOIN user ON
            application.userID=user.id
            WHERE job.companyID = :companyID AND job.id = :jobID AND application.isProcessed = 0
            ORDER by job.id asc';

        $statement = $db->prepare($query);
        $statement->bindValue(':companyID', $companyID);
        $statement->bindValue(':jobID', $jobID);
        $statement->execute();
        $value = $statement->fetchAll();
        
        $statement->closeCursor();

        return $value;
    }

    public static function check_for_duplicate($jobId, $userId) {
        $db = Database::getDB();
        $query = 'SELECT jobID, userID
              FROM application
              WHERE jobID= :jobId AND userID= :userId AND isProcessed = 0';

        $statement = $db->prepare($query);
        $statement->bindValue(':jobId', $jobId);
        $statement->bindValue(':userId', $userId);
        $statement->execute();
        $result = $statement->fetch();

        $statement->closeCursor();
        
        return $result;
    }
    
    public static function add_application($jobID, $isProcessed, $isApproved, $coverLetter, $resume, $userID) {
        $db = Database::getDB();
        $query = 'INSERT INTO application
                 (jobID, isProcessed, isApproved, coverLetter, resume, userID)
              VALUES
                 (:jobID, :isProcessed, :isApproved, :coverLetter, :resume, :userID)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':jobID', $jobID);
            $statement->bindValue(':isProcessed', $isProcessed);
            $statement->bindValue(':isApproved', $isApproved);
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
    
    public static function process_application($applicationId, $isProcessed) {
        $db = Database::getDB();
        $query = $query = 'UPDATE application
              SET isProcessed = :isProcessed
              WHERE applicationID = :applicationID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':isProcessed', $isProcessed);
            $statement->bindValue(':applicationID', $applicationId);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function approve_application($applicationId, $isApproved) {
        $db = Database::getDB();
        $query = $query = 'UPDATE application
              SET isApproved = :isApproved
              WHERE applicationID = :applicationId';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':isApproved', $isApproved);
            $statement->bindValue(':applicationId', $applicationId);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function process_and_approve_application($applicationId, $isProcessed, $isApproved) {
        $db = Database::getDB();
        $query = $query = 'UPDATE application
              SET isProcessed = :isProcessed,
                  isApproved = :isApproved
              WHERE applicationID = :applicationId';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':isProcessed', $isProcessed);
            $statement->bindValue(':isApproved', $isApproved);
            $statement->bindValue(':applicationId', $applicationId);
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
        $query = 'DELETE from application WHERE applicationID= :id';
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
