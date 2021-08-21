const apireadGenre_url = "http://localhost/projectPhP/api/GenreController/readGenre.php";
  
async function getapi(url) {
    const response = await fetch(url);
    var data = await response.json();
    console.log(data);
    showGenre(data);
}



getapi(apireadGenre_url);

function showGenre(data) {
    let tab = ``;
    for (let r of data.records) {
        tab += `<tr> 
            <td>${r.genreName} </td>        
            </tr>`;
    }
    console.log(tab);
    document.getElementById("genreList").innerHTML = tab;
}