<?php
class Album{
    private $conn;
    private $table_name = "album";
  

    public $albumID;
    public $artistID;
    public $albumTitle;
    public $albumReleaseDate;
  
    public function __construct($db){
        $this->conn = $db;
    }

    function fetchAlbumData(){

        $query = "SELECT a.Title as AlbumName

        FROM " . $this->table_name . " a
        
        ORDER BY a.ReleaseDate DESC LIMIT 20"; 

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
      
        return $stmt;
    }

    function searchByAlbum($condition)
    {
        $query = "SELECT a.Title as AlbumName, count(*) as SoLuongBaiHat, a.ReleaseDate, a.CoverPath
                 FROM 
                 " . $this->table_name . " a
                LEFT JOIN `album_details` s on s.AlbumID = a.AlbumID
                Where a.Title LIKE '%".$condition."%' 
                GROUP BY a.Title"; 

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
      
        return $stmt;
    }
}
?>