<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
include_once '../config/database.php';
include_once '../objects/Album.php';

$database = new Database();
$db = $database->getConnection();
  
$album = new Album($db);
  
$stmt = $album->fetchAlbumData();
$num = $stmt->rowCount();
  
if($num>0){
    $album_arr=array();
    $album_arr["records"]=array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $album_item=array(
            "AlbumName" => $AlbumName
        );
  
        array_push($album_arr["records"], $album_item);
    }
    http_response_code(200);
    echo json_encode($album_arr);
}
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No artist found.")
    );
}

?>