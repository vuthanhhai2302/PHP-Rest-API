<?php
class Song{
    private $conn;
    private $table_name = "Song";
  
    public $songID;
    public $artistID;
    public $titleID;
    public $songLength;
    public $songPath;
    public $songReleaseDate;
  
    public function __construct($db){
        $this->conn = $db;
    }

    function searchBySong($condition)
    {
        $query = "SELECT t.Title, a.Name , a.ArtistID, g.GenreName, s.Length
                    FROM " . $this->table_name ." s
                    LEFT join `title` t ON s.TitleID = t.TitleID
                    LEFT join `artist` a ON a.ArtistID = s.ArtistID
                    LEFT join `genre` g ON g.GenreID = t.GenreID
                    Where t.Title LIKE '%".$condition."%' "; 

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
      
        return $stmt;
    }
}
?>