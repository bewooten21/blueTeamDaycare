<?php 
class job_db {

    public static function select_all() {
        $db = Database::getDB();

        $query='SELECT * from job JOIN company ON
            job.companyID=company.id
            ORDER by job.id asc'
            ;
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
      
        $statement->closeCursor();

        return $rows;
    }

    public static function get_job_by_id($id) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM job JOIN company ON 
              job.companyID=companyID
              WHERE job.id= :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $value = $statement->fetch();
        
        
        
        $statement->closeCursor();

        return $value;
    }
    
    public static function get_job_by_Companyid($id) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM job JOIN company ON 
              job.companyID=company.id
              WHERE job.companyID= :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $rows = $statement->fetchAll();

        $statement->closeCursor();
        
        foreach ($rows as $value) {
            $job = new job($value[0], $value['companyID'], $value['jobName'], $value['jobDescription'], $value['jobRequirements']);

            $jobs[] = $job;
        }
        
       

        return $jobs;
    }

    public static function get_job($jobId) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM job
              WHERE id= :jobId';

        $statement = $db->prepare($query);
        $statement->bindValue(':jobId', $jobId);
        $statement->execute();
        $value = $statement->fetch();

        $job = new job($value['id'], $value['companyID'], $value['jobName'], $value['jobDescription'], $value['jobRequirements'], $value['applicationSlots']);
        
        $statement->closeCursor();
        
        return $job;
    }

    public static function add_job($id, $compId, $jobT, $jobD, $jobR) {
        $db = Database::getDB();
        $query = 'INSERT INTO job
                 (id, companyID, jobName, jobDescription, jobRequirements)
              VALUES
                 (:id, :compId, :jobT, :jobD, :jobR)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->bindValue(':compId', $compId);
            $statement->bindValue(':jobT', $jobT);
            $statement->bindValue(':jobD', $jobD);
            $statement->bindValue(':jobR', $jobR);
           
            $statement->execute();
            $statement->closeCursor();

           
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function take_application_slot($ID, $applicationSlots) {
        $db = Database::getDB();
        $query = $query = 'UPDATE job
              SET applicationSlots = :applicationSlots
                WHERE ID = :ID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':applicationSlots', $applicationSlots);
            $statement->bindValue(':ID', $ID);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function update_user($ID, $fName, $lName, $email, $uName, $uImage) {
        
        $fileLocation = "images/".$uImage;
        $db = Database::getDB();
        $query = $query = 'UPDATE user
              SET fName = :fName,
                  lName = :lName,
                  email = :email,
                  uName = :uName,
                  uImage = :uImage
                WHERE ID = :ID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':fName', $fName);
            $statement->bindValue(':lName', $lName);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':uName', $uName);
            $statement->bindValue(':image', $fileLocation);
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
        $query = 'DELETE from user WHERE id= :id';
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
