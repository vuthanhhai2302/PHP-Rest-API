<?php
class Genre{
  
    // database connection and table name
    private $conn;
    private $table_name = "genre";
  
    // object properties
    public $genreID;
    public $genreName;
  
    public function __construct($db){
        $this->conn = $db;
    }

    function fetchGenreData(){
        $query = "SELECT
                    GenreID, GenreName as TenTheLoai
                FROM
                    " . $this->table_name . " p ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
      
        return $stmt;
    }

    function searchByArtist($condition)
    {
        $query = "SELECT a.Name AS ArtistName
                 FROM 
                 " . $this->table_name . " a
                Where a.Name LIKE '%".$condition."%' "; 

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
      
        return $stmt;
    }
}
?>