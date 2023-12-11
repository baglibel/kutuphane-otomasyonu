<?php
require __DIR__ . '../../Models/BookModel.php';

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
        return (new BookModel())->Fill($result->fetch_assoc());
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
    //Give book to user -todo
    function GiveBookToUser(int $userID, int $bookID, int $responsibleID){
        //$result = $this->conn->execute_query("UPDATE books SET IsFree = ? WHERE ID = ?", [false, $bookID]);
        //$result = $this->conn->execute_query("INSERT INTO history (BookID, UserID, EndDate, ResponsibleID)", [false, $bookID]);
    }
}
?>

