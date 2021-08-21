const apireadArtist_url = "http://localhost/projectPhP/api/ArtistController/readArtist.php";
  
async function getapi(url) {
    const response = await fetch(url);
    var data = await response.json();
    console.log(data);
    showArtist(data);
}


getapi(apireadArtist_url);


function showArtist(data) {
    let tab = ``;
    for (let r of data.records) {
        tab += `<tr> 
            <td>${r.ArtistName} </td>        
            </tr>`;
    }
    console.log(tab);
    document.getElementById("artistList").innerHTML = tab;
}
