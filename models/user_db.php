<?php 
class user_db {

    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM user Order By lName asc';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $users = [];

        foreach ($rows as $value) {
            $userRole = role_db::get_role_by_id($value['roleID']);
            $users[$value['id']] = new user($value['id'], $value['fName'], $value['lName'], $value['email'], $value['uName'], $value['pWord'], $value['image'], $userRole, $value['Restricted']);
        }
        $statement->closeCursor();

        return $users;
    }

    public static function get_user_by_id($id) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM user
              WHERE ID= :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $value = $statement->fetch();
        
        $userRole = role_db::get_role_by_id($value['roleID']);
        $users = new user($value['id'], $value['fName'], $value['lName'], $value['email'], $value['uName'], $value['pWord'], $value['image'], $userRole, $value['Restricted']);
        
        $statement->closeCursor();

        return $users;
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

    public static function add_user($fName, $lName, $email, $uName, $hashedPW, $roleID) {
        $db = Database::getDB();
        $query = 'INSERT INTO user
                 (fName, lName, email, uName, pWord, roleID)
              VALUES
                 (:fName, :lName, :email, :uName, :pWord, :roleID)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':fName', $fName);
            $statement->bindValue(':lName', $lName);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':uName', $uName);
            $statement->bindValue(':pWord', $hashedPW);
            $statement->bindValue(':roleID', $roleID);
           
            $statement->execute();
            $statement->closeCursor();

            // Get the last product ID that was automatically generated
            $user_id = $db->lastInsertId();
            return $user_id;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function add_user_with_image($fName, $lName, $email, $uName, $hashedPW, $fileName, $roleID) {
        
        $fileLocation = "images/". $fileName;
        $db = Database::getDB();
        $query = 'INSERT INTO user
                 (fName, lName, email, uName, pWord, image, roleID)
              VALUES
                 (:fName, :lName, :email, :uName, :pWord, :fileLocation, :roleID)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':fName', $fName);
            $statement->bindValue(':lName', $lName);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':uName', $uName);
            $statement->bindValue(':pWord', $hashedPW);
            $statement->bindValue(':fileLocation', $fileLocation);
            $statement->bindValue(':roleID', $roleID);
           
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
    
    public static function update_user_role($id, $roleID) {
        
        $db = Database::getDB();
        $query = $query = 'UPDATE user
              SET roleID = :roleID
                WHERE id = :id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':roleID', $roleID);
            $statement->bindValue(':id', $id);
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
        
        $userRole = role_db::get_role_by_id($value['roleID']);
        $theUser = new user($value['id'], $value['fName'], $value['lName'], $value['email'], $value['uName'], $value['pWord'], $value['image'], $userRole, $value['Restricted']);

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
            $userRole = role_db::get_role_by_id($value['roleID']);
            $users[$value['id']] = new user($value['id'], $value['fName'], $value['lName'], $value['email'], $value['uName'], $value['pWord'], $value['image'], $userRole, $value['Restricted']);
        }
        $statement->closeCursor();

        return $users;
    }
    
    public static function get_user_company($id) {
        $db = Database::getDB();
        $query = 'SELECT companyID
              FROM user
              WHERE ID= :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $value = $statement->fetch();
        
        $companyID = $value;
        
        $statement->closeCursor();
        
        return $comopanyID;
    }
    
    public static function restrictUser($id){
        $db = Database::getDB();
        $query = 'update user set restricted = 1 where ID = :id';
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
    
    public static function removeRestriction($id){
        $db = Database::getDB();
        $query = 'update user set restricted = 0 where ID = :id';
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
    
    public static function adminUpdateUser($fn, $ln, $roleId, $userId) {
        $db = Database::getDB();
        $query = 'UPDATE user
              SET fName = :fn,
                  lName = :ln,
                  roleID = :roleId
                
                WHERE id = :userId';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':fn', $fn);
            $statement->bindValue(':ln', $ln);
            $statement->bindValue(':roleId', $roleId);
            $statement->bindValue(':userId', $userId);
           
            $statement->execute();
            $statement->closeCursor();

        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            var_dump($e);
//            display_db_error($error_message);
        }
    }

}
