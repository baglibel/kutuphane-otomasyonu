<?php
require_once __DIR__.'../../Data/DatabaseConnection.php';
require_once __DIR__ . '../../Models/BookModel.php';
require_once 'UserService.php';

class BookService
{
    protected $conn;
    public function __construct()
    {
        //get connection
        $conn = new DatabaseConnection();
        $this->conn = $conn->conn;
    }
    //add book to database from BookModel
    function AddBook(BookModel $book)
    {
        $query = "INSERT INTO books (Name, Writer, Cover, Description, NumberOfPages, Publisher, IsFree) VALUES(?,?,?,?,?,?,?)";
        $result = $this->conn->execute_query($query, [
            $book->Name,
            $book->Writer,
            $book->Cover,
            $book->Description,
            $book->NumberOfPages,
            $book->Publisher,
            $book->IsFree,
        ]);

        return $result;
    }
    //delete book from database by id
    function DeleteBookByID(int $id)
    {
        $query = "DELETE FROM books WHERE ID = ?";
        $result = $this->conn->execute_query($query, [$id]);
        return $result;
    }

    //update book from database by id with BookModel
    function UpdateBookByID(int $id, BookModel $book)
    {
        $query = "UPDATE books SET Name = ?, Writer = ?, Cover = ?, Description = ?, NumberOfPages = ?, Publisher = ?, IsFree = ? WHERE ID = ?";
        $result = $this->conn->execute_query($query, [
            $book->Name,
            $book->Writer,
            $book->Cover,
            $book->Description,
            $book->NumberOfPages,
            $book->Publisher,
            $book->IsFree,
            $id
        ]);
        return $result;
    }
    //get book from databse by id
    function GetBookByID(int $id)
    {
        $query = "SELECT * FROM books WHERE ID = ?";
        $result = $this->conn->execute_query($query, [$id]);
        $result = $result->fetch_assoc();
        return ($result) ? (new BookModel())->Fill($result) : false;
    }
    //get books from databse, array of BookModel
    function GetBooks()
    {
        $books = array();
        $query = "SELECT * FROM books";
        $result = $this->conn->execute_query($query);
        while ($book = $result->fetch_assoc()) {
           array_push($books, (new BookModel())->Fill($book));
        }
        return $books;
    }
    //give book to user
    function GiveBookToUser(int $bookID, int $userID, int $responsibleID){
        $this->conn->execute_query("UPDATE books SET IsFree = ? WHERE ID = ?", [false, $bookID]);
        $this->conn->execute_query("INSERT INTO history (BookID, UserID, ResponsibleID) VALUES (?, ?, ?)", [$bookID, $userID, $responsibleID]);
    }
    //take book from user
    function TakeBookFromUser(int $bookID){
        $this->conn->execute_query("UPDATE books SET IsFree = ? WHERE ID = ?", [true, $bookID]);
        $this->conn->execute_query("UPDATE history SET EndDate = ? WHERE BookID = ? AND EndDate is null", [date("Y-m-d H:i:s"), $bookID]);
    }
    //get book user
    function GetBookUser(int $bookID){
        $result = $this->conn->execute_query("SELECT UserID FROM history WHERE BookID = ? AND EndDate is null", [$bookID])->fetch_assoc();
        if ($result){
            $userService = new UserService();
            $user = $userService->GetUserByID($result["UserID"]);
            return $user;
        }else{
            return false;
        }
    }
    //get book count
    function GetBookCount(){
        $result = $this->conn->execute_query("SELECT COUNT(*) FROM books");
        return $result->fetch_row()[0];
    }
    function GetAlerts(){
        $alerts = array();
        $query = "SELECT * FROM history WHERE EndDate is null";
        $result = $this->conn->execute_query($query);
        while ($alert = $result->fetch_assoc()) {
            $today = new DateTime();
            $startDate =(new DateTime())->createFromFormat("Y-m-d H:i:s", $alert["StartDate"]);
            $potentielEndDate = $startDate->modify("+7 days");
            if($today > $potentielEndDate){
                $userService = new UserService();
                $user = $userService->GetUserByID($alert["UserID"]);
                $book = $this->GetBookByID($alert["BookID"]);
                $time = $potentielEndDate->diff($today);
                array_push($alerts, "$user kullanıcısı \"$book->Name - $book->Writer\" kitabını $time->days gün geciktirdi.");

            }
        }
        return $alerts;
    }
}
?>

