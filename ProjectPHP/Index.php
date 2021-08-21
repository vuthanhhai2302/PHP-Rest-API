<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/normalize.css">
    <link rel="stylesheet" href="View/mainView.css">
    <script src="https://use.fontawesome.com/b964f53656.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <title>UDPT17</title>
</head>
<body>

    <section class="forum-cover">

        <div class="cover-background"> </div>
        <div class="forum-title">
            <div>
                <h2>Thi Cuối Kỳ Ứng Dụng Phân Tán</h2>
            </div>
        </div>
    
    </section>

    <nav>
        <div class="home">
            <a href="#home" class="home-logo"> Home
            </a>
            
        </div>
        <div class="login-form">
            <a href="#login" class="btn login">Tìm Kiếm</a>
            <a href="#signup" class="btn signup">Thêm Bài Hát Mới</a>
            <a href="#signup" class="btn signup">Thêm Album Mới</a>
        </div>
    </nav>
    
    


    <div class="wrapper">
        <main>
            <section>
                
               
                <div class="sidebar-forum-rule post">
                    <h4> Thể Loại </h4>
                    <table id="genreList"></table>
                </div>
                <br>
                <div class="sidebar post">
                    <h4>Ca Sĩ / Nhóm Nhạc</h4>
                    <table id="artistList"></table>
                </div>
            </section>

            <section class="main-posts">
                <section class = "filter-bar">
                    <input type="text" class="searchbar" id="search_box" placeholder="Search...">
                    <br>
                    <br>
                    <button class="filter-bar-button" id="mySearchButton">Search</button>
                    <button class="filter-bar-button">Ca sĩ</button>
                    <button class="filter-bar-button">Album</button>
                    <button class="filter-bar-button">Bài hát</button>
                </section>
                <div class="main-post post">
                    <span id="search_result"></span>
                </div>
            </section>

            <section>
                <div class="sidebar-forum-rule post">
                    <h3>Đăng Nhập</h3>
                   
                </div>
                <br>

                <div class="sidebar post">
                    <h4>Album Mới</h4>
                    <table id="albumList"></table>
                </div>
            </section>
            
        </main>
    </div>
    
    <div class="footer">
        <p>1712412 - Vũ Thanh Hải</p>
      </div>
    <script src="View/loadGenre.js"></script>
    <script src="View/loadAlbum.js"></script>
    <script src="View/loadArtist.js"></script>
    <script>

        $(function() {
         var _myContentArea = document.getElementById("search_result");
         var _mySearchButton = document.getElementById("mySearchButton");
         _mySearchButton.onclick = getData;
 
         function getData(){
         var _mySearchField = document.getElementById("search_box");
         let data={text:search_box.value}
             $.ajax({
             url: "http://localhost/projectPhP/api/ArtistController/searchArtist.php",
             method: "GET",
             dataType: "json",
             success: function(data) {
                let tab = ``;
                for (let r of data.records) {
                    tab += `<tr> 
                        <td>${r.artisName} </td>        
                        </tr>`;
                }
                document.getElementById("search_result").innerHTML = tab;
                }
             });
         }
 
     });
     </script>
</body>
</html>