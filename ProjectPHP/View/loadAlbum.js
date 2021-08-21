const api_url = "http://localhost/projectPhP/api/AlbumController/readAlbum.php";
  
async function getapi(url) {
    const response = await fetch(url);
    var data = await response.json();
    console.log(data);
    showAlbum(data);
}


getapi(api_url);

function showAlbum(data) {
    let tab = ``;
    for (let r of data.records) {
        tab += `<tr> 
            <td>${r.AlbumName} </td>        
            </tr>`;
    }
    console.log(tab);
    document.getElementById("albumList").innerHTML = tab;
}