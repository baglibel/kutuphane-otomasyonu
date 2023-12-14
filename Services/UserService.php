<?php
require_once __DIR__.'../../Data/DatabaseConnection.php';
require_once __DIR__ . "../../Models/UserModel.php";

class UserService
{
    protected $conn;
    public function __construct()
    {
        //get connection
        $conn = new DatabaseConnection();
        $this->conn = $conn->conn;
    }
    //add user to database from UserModel
    function AddUser(UserModel $user)
    {
        $query =
            "INSERT INTO users (Name, Surname) VALUES(?, ?)";
        $result = $this->conn->execute_query($query, [
            $user->Name,
            $user->Surname
        ]);

        return $result;
    }
    //delete user from database by id
    function DeleteUserByID(int $id)
    {
        $query = "DELETE FROM users WHERE ID = ?";
        $result = $this->conn->execute_query($query, [$id]);
        return $result;
    }

    //update user from database by id with UserModel
    function UpdateUserByID(int $id, UserModel $user)
    {
        $query =
            "UPDATE users SET Name = ?, Surname = ? WHERE ID = ?";
        $result = $this->conn->execute_query($query, [
            $user->Name,
            $user->Surname,
            $id
        ]);
        return $result;
    }
    //get user from databse by id
    function GetUserByID(int $id)
    {
        $query = "SELECT * FROM users WHERE ID = ?";
        $result = $this->conn->execute_query($query, [$id]);
        $result = $result->fetch_assoc();
        return ($result) ? (new UserModel())->Fill($result) : false;
    }
    //get users from databse, array of UserModel
    function GetUsers()
    {
        $users = array();
        $query = "SELECT * FROM users";
        $result = $this->conn->execute_query($query);
        while ($user = $result->fetch_assoc()) {
           array_push($users, (new UserModel())->Fill($user));
        }
        return $users;
    }
    //get user count
    function GetUserCount(){
        $result = $this->conn->execute_query("SELECT COUNT(*) FROM users");
        return $result->fetch_row()[0];
    }
}
?>

