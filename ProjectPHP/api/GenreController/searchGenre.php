<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
include_once '../config/database.php';
include_once '../objects/Genre.php';

$database = new Database();
$db = $database->getConnection();
  
$genre = new Genre($db);
  
$stmt = $genre->fetchGenreData();
$num = $stmt->rowCount();
  
if($num>0){
  
    $genre_arr=array();
    $genre_arr["records"]=array();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
  
        $genre_item=array(
            "genreID" => $GenreID,
            "genreName" => $TenTheLoai
        );
  
        array_push($genre_arr["records"], $genre_item);
    }
    http_response_code(200);
    echo json_encode($genre_arr);
}
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No genres found.")
    );
}

?>