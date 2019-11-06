<?php 
class job_db {

    public static function select_all() {
        $db = Database::getDB();

        $query='SELECT * from job JOIN company ON
            job.companyID=company.id
            ORDER by job.companyID asc'
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
            $job = new job($value['id'], $value['companyID'], $value['jobName'], $value['jobDescription'], $value['jobRequirements']);

            $jobs[] = $job;
        }
        
       

        return $jobs;
    }

    public static function get_user_by_username($uName) {
        $db = Database::getDB();
        $query = 'SELECT uName
              FROM user
              WHERE uName= :uName';

        $statement = $db->prepare($query);
        $statement->bindValue(':uName', $uName);
        $statement->execute();
        $result = $statement->fetch();

        $statement->closeCursor();
        
        return $result;
    }

    public static function check_user_by_email($email) {
        $db = Database::getDB();
        $query = 'SELECT email
              FROM user
              WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $result = $statement->fetch();

        $statement->closeCursor();

        return $result;
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
    
    public static function add_user_with_image($fName, $lName, $email, $uName, $hashedPW, $fileName) {
        
        $fileLocation = "images/". $fileName;
        $db = Database::getDB();
        $query = 'INSERT INTO user
                 (fName, lName, email, uName, pWord, image)
              VALUES
                 (:fName, :lName, :email, :uName, :pWord, :fileLocation)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':fName', $fName);
            $statement->bindValue(':lName', $lName);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':uName', $uName);
            $statement->bindValue(':pWord', $hashedPW);
            $statement->bindValue(':fileLocation', $fileLocation);
           
            $statement->execute();
            $statement->closeCursor();
            $user_id = $db->lastInsertId();
            return $user_id;
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
    
    public static function validate_user_login($uName) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM user
              WHERE uName= :uName';

        $statement = $db->prepare($query);
        $statement->bindValue(':uName', $uName);
        $statement->execute();
        $value = $statement->fetch();
        
        $theUser = new user($value['id'], $value['fName'], $value['lName'], $value['email'], $value['uName'], $value['pWord'], $value['image']);

        $statement->closeCursor();

        return $theUser;
    }
    public static function update_profile($uName, $fName, $lName, $email, $uImage, $pWord) {
        $db = Database::getDB();
        $query = 'UPDATE user
              SET fName = :fName,
                  lName = :lName,
                  email = :email,
                  image = :image,
                  pWord = :pWord
                WHERE uName = :uName';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':fName', $fName);
            $statement->bindValue(':lName', $lName);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':uName', $uName);
            $statement->bindValue(':image', $uImage);
            $statement->bindValue(':pWord', $pWord);
            $statement->execute();
            $statement->closeCursor();
//            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            var_dump($e);
//            display_db_error($error_message);
        }
    }
    

    public static function make_comment($profileID, $comment, $commenterID, $commenterUserName) {
        $db = Database::getDB();
        $query = 'INSERT INTO comments'
                . '(profileID, comment, commenterID, commenterUserName)'
                . 'VALUES'
                . '(:profileID, :comment, :commenterID, :commenterUserName)';
        
        try {
        $statement = $db->prepare($query);
        $statement->bindValue(':profileID', $profileID);
        $statement->bindValue(':comment', $comment);
        $statement->bindValue(':commenterID', $commenterID);
        $statement->bindValue(':commenterUserName', $commenterUserName);
        $statement->execute();
        $statement->closeCursor();
        $user_id = $db->lastInsertId();
        return $user_id;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            var_dump($e);
            display_db_error($error_message);
        }
    }
       public static function get_user_comments($profileID) {
        $db = Database::getDB();
        $query = 'SELECT *'
                . ' FROM comments'
                . ' WHERE profileID = :profileID';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':profileID', $profileID);
        $statement->execute();
        $rows = $statement->fetchAll();
        $comments = [];

        foreach ($rows as $value) {
            $comments[$value['commentID']] = new comment($value['commentID'], $value['profileID'], $value['comment'], $value['commenterID'], $value['commenterUserName'], $value['commentTime']);
        }
        $statement->closeCursor();

        return $comments;
        
    }
//    public static function newest_users() {
//        $db = Database::getDB();
//        $query = 'SELECT *'
//                . 'FROM user';
//        $statement = $db->prepare($query);
//        $statement->execute();
//        $newest = $statement->fetch();
//
//        $statement->closeCursor();
//
//        return $newest;
//    }
     public static function newest_users() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM user ORDER BY id DESC LIMIT 10 ';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $users = [];

        foreach ($rows as $value) {
            $users[$value['id']] = new user($value['id'], $value['fName'], $value['lName'], $value['email'], $value['uName'], $value['pWord'], $value['image']);
        }
        $statement->closeCursor();

        return $users;
    }
    
    
//put your code here
}
