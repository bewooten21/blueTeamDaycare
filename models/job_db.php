<?php 
class job_db {

    public static function select_all() {
        $db = Database::getDB();

        $query='SELECT * from job JOIN company ON
            job.companyID=company.id
            ORDER by job.jobID asc'
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
              WHERE job.jobID= :id';

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
        $jobs = [];
        
        
        foreach ($rows as $value) {
            $jobs[$value['jobID']] = new job($value['jobID'], $value['companyID'], $value['jobName'], $value['jobDescription'], $value['jobRequirements'], $value['applicationSlots']);

        }

        $statement->closeCursor();
        
        return $jobs;
    }

    public static function get_job($jobId) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM job
              WHERE jobID= :jobId';

        $statement = $db->prepare($query);
        $statement->bindValue(':jobId', $jobId);
        $statement->execute();
        $value = $statement->fetch();

        $job = new job($value['jobID'], $value['companyID'], $value['jobName'], $value['jobDescription'], $value['jobRequirements'], $value['applicationSlots']);
        
        $statement->closeCursor();
        
        return $job;
    }

    public static function add_job($id, $compId, $jobT, $jobD, $jobR) {
        $db = Database::getDB();
        $query = 'INSERT INTO job
                 (jobID, companyID, jobName, jobDescription, jobRequirements)
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
    
    public static function update_job($id, $jobT, $jobD, $jobR) {
        $db = Database::getDB();
        $query = 'Update job
              Set
                  
                  jobName = :jobT,
                  jobDescription = :jobD,
                  jobRequirements = :jobR
                  WHERE jobID = :id' ;
                 
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            
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
    
    public static function delete_job($id){
        $db = Database::getDB();
        $query = 
                'DELETE from job
                  WHERE jobID = :id';
        
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            
            
           
            $statement->execute();
            $statement->closeCursor();

           
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
                
                
    }

}
