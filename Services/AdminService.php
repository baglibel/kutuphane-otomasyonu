<?php
require __DIR__ . "../../Models/AdminModel.php";

class AdminService
{
    protected $conn;
    public function __construct()
    {
        //get connection
        $conn = new DatabaseConnection();
        $this->conn = $conn->conn;
    }
    //add admin to database from AdminModel
    function AddAdmin(AdminModel $admin)
    {
        $query = "INSERT INTO admins (Username, Password, Name, Surname, Email, Rank) VALUES(?, ?, ?, ?, ?, ?)";
        $result = $this->conn->execute_query($query, [
            $admin->Username,
            $admin->Password,
            $admin->Name,
            $admin->Surname,
            $admin->Email,
            $admin->Rank,
        ]);
        return $result;
    }
    //delete admin from database by id
    function DeleteAdminByID(int $id)
    {
        $query = "DELETE FROM admins WHERE ID = ?";
        $result = $this->conn->execute_query($query, [$id]);
        return $result;
    }

    //update admin from database by id with AdminModel
    function UpdateAdminByID(int $id, AdminModel $admin)
    {
        $query = "UPDATE admins SET Username = ?, Password = ?, Name = ?, Surname = ?, Email = ?, Rank = ? WHERE ID = ?";
        $result = $this->conn->execute_query($query, [
            $admin->Username,
            $admin->Password,
            $admin->Name,
            $admin->Surname,
            $admin->Email,
            $admin->Rank,
            $id
        ]);
        return $result;
    }
    //get admin from databse by id
    function GetAdminByID(int $id)
    {
        $query = "SELECT * FROM admins WHERE ID = ?";
        $result = $this->conn->execute_query($query, [$id]);
        return (new AdminModel())->Fill($result->fetch_assoc());
    }
    //get admins from databse, array of AdminModel
    function GetAdmins()
    {
        $admins = array();
        $query = "SELECT * FROM admins";
        $result = $this->conn->execute_query($query);
        while ($user = $result->fetch_assoc()) {
           array_push($admins, (new AdminModel())->Fill($user));
        }
        return $admins;
    }
}
?>

