<?php
require_once __DIR__.'../../Data/DatabaseConnection.php';
require_once __DIR__ . "../../Models/AdminModel.php";
session_start();
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
        //hash password
        $hashedPass = password_hash($admin->Password, PASSWORD_DEFAULT);
        $query = "INSERT INTO admins (Username, Password, Name, Surname, Email, Rank) VALUES(?, ?, ?, ?, ?, ?)";
        $result = $this->conn->execute_query($query, [
            $admin->Username,
            $hashedPass,
            $admin->Name,
            $admin->Surname,
            $admin->Email,
            $admin->Rank->value,
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
        $result = ($this->conn->execute_query($query, [$id]))->fetch_assoc();
        return (isset($result)) ? (new AdminModel())->Fill($result) : false;
    }
    //get admin from databse by id
    function GetAdminByUsername(string $username)
    {
        $query = "SELECT * FROM admins WHERE Username = ?";
        $result = ($this->conn->execute_query($query, [$username]))->fetch_assoc();
        return (isset($result)) ? (new AdminModel())->Fill($result) : false;
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
    //login admin
    function LogIn(AdminModel $admin){
        $admin2 = $this->GetAdminByUsername($admin->Username);
        //check user exists
        if(!$admin2) return array(false, "Böyle bir hesap bulunamadı.");
        //check password is true
        if(!password_verify($admin->Password, $admin2->Password)) return array(false, "Şifre yanlış.");
        //is login succesfully
        $_SESSION["Admin"] = serialize($admin2);
        return array(true, "Başarıyla giriş yapıldı!");

    }
    //logout admin
    function LogOut(){
        unset($_SESSION["Admin"]);
    }
    //check is admin logged
    function IsLogged(){
        //check session if admin is set then unserialized AdminModel and return as AdminModel
        if (isset($_SESSION["Admin"]) && is_a(unserialize($_SESSION["Admin"]), "AdminModel")){
           return unserialize($_SESSION["Admin"]);
        }{
            //if not logged return index page
            header("Refresh:3; url=Login.php");
            die('Bu sayfayı görmek için giriş yapmanız lazım.<br>
            3 saniye içinde <a href="Index.php"> giriş sayfası\'na</a> yönlendirileceksiniz.');
        }
    }
    //Check admin has the rank
    function checkAdminRank(AdminModel $admin, Rank $rank){
        if ($admin->Rank != $rank ){
            header("Refresh:3; url=Index.php");
              die('Bu sayfayı görmek için '.($rank->name).' olmanız lazım.<br>
              3 saniye içinde <a href="Index.php"> Ana sayfaya</a> yönlendirileceksiniz.');
          }
    }
}
?>

