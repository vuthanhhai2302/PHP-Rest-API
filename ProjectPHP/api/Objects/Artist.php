<?php
class Artist{
    private $conn;
    private $table_name = "artist";
  

    public $artistID;
    public $artistName;
    public $artistCountry;
    public $artistDOB;
  
    public function __construct($db){
        $this->conn = $db;
    }
    function fetchArtistData(){

        $query = "SELECT DISTINCT a.Name AS ArtistName, count(*) AS SoLuongBaiHat
                 FROM 
                 " . $this->table_name . " a
                INNER JOIN 
                    `song` s ON s.ArtistID =a.ArtistID
                GROUP BY  a.Name
                ORDER BY  `SoLuongBaiHat` DESC LIMIT 20"; 

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