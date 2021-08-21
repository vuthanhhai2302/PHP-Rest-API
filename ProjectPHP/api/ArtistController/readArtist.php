<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
include_once '../config/database.php';
include_once '../objects/Artist.php';

$database = new Database();
$db = $database->getConnection();
  
$artist = new Artist($db);
  
$stmt = $artist->fetchArtistData();
$num = $stmt->rowCount();
  
if($num>0){
  
    $artist_arr=array();
    $artist_arr["records"]=array();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
  
        $artist_item=array(
            "ArtistName" => $ArtistName//,
            //"SoLuongBaiHat" => $SoLuongBaiHat
        );
  
        array_push($artist_arr["records"], $artist_item);
    }
    http_response_code(200);
    echo json_encode($artist_arr);
}
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No artist found.")
    );
}

?>