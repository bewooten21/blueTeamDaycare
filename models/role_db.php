<?php 
class role_db {

    public static function select_all() {
        $db = Database::getDB();

        $queryRoles = 'SELECT * FROM role';
        $statement = $db->prepare($queryRoles);
        $statement->execute();
        $rows = $statement->fetchAll();
        $roles = [];

        foreach ($rows as $value) {
            $roles[$value['id']] = new role($value['id'], $value['type']);
        }
        $statement->closeCursor();

        return $roles;
    }

    public static function get_role_by_id($id) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM role
              WHERE ID= :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $value = $statement->fetch();
        
        $role = new role($value['id'], $value['type']);
        
        $statement->closeCursor();

        return $role;
    }

}
