<!doctype html>
<html lang="en">

<head>
  <title>Menu</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">

</head>

<style>
    .navbar{
        background-color:#1f1f1f;
    }

    body{
        background-color:#1f1f1f;
        letter-spacing: 0.5px;
        line-height:24px;
        font-size:1em;
        color:#fff;
    }

    label{
        color:#f5c518;
        font-size:20px;
        margin:15px 15px;
    }

    .menu-row {
        margin: 0 10%;
        text-align:start;
        display: grid;
        grid-template-columns: auto auto auto;
    }

    .menu-row a{

        color:#fff;
        text-decoration: none;
    }

    .close{
        right: 15%;
        position:absolute;
        font-size:2em;
    }

    ::-webkit-scrollbar,::-webkit-scrollbar-thumb{
        display: none;
    }


</style>

<body>

    <header>
    <nav class="navbar navbar-expand-sm ">
          <div class="container">
            <a class="navbar-brand" href="#"><img src="{{asset('media/imdb-icon-png.png')}}"></a>
            </div>

    </nav>
    </header>

    <script type="text/javascript">
     function close(){
        console.log('close clicked!')
        let overlay=document.getElementById('menu_overlay');
        overlay.hide();
     }
    </script>

    <main id="menu_overlay">
        <center>
        <div class="row menu-row">

            <div class="menu-list">
                <label><i class="bi bi-film"></i> Movies</label>
                <div class="menu-items"><a href="#">Release Calendar</a></div>
                <div class="menu-items"><a href="#">Top 250 Movies</a></div>
                <div class="menu-items"><a href="#">Most Popular Movies</a></div>
                <div class="menu-items"><a href="#">Browse Movies by Genre</a></div>
                <div class="menu-items"><a href="#">Top Box Office</a></div>
                <div class="menu-items"><a href="#">Showtimes & Tickets</a></div>
                <div class="menu-items"><a href="#">Movie News</a></div>
                <div class="menu-items"><a href="#">India Movie Spotlight</a></div>
            </div>
            <div class="menu-list">
                <label><i class="bi bi-tv"></i> TV Shows</label>
                <div class="menu-items"><a href="#">What's on TV & Streaming</a></div>
                <div class="menu-items"><a href="#">Top 250 TV Shows</a></div>
                <div class="menu-items"><a href="#">Most Popular TV Shows</a></div>
                <div class="menu-items"><a href="#">Browse TV Shows by Gemre</a></div>
            </div>
            <div class="menu-list">
                <label><i class="bi bi-star-fill" ></i> Awards & Events</label>
                <div class="menu-items"><a href="#">Oscars</a></div>
                <div class="menu-items"><a href="#">Emmys</a></div>
                <div class="menu-items"><a href="#">Toronto Int'l Film Festival</a></div>
                <div class="menu-items"><a href="#">Hispanic Heritage Month</a></div>
                <div class="menu-items"><a href="#">STARmeter Awards</a></div>
                <div class="menu-items"><a href="#">Awards Central</a></div>
                <div class="menu-items"><a href="#">Festival Central</a></div>
                <div class="menu-items"><a href="#">All Events</a></div>
            </div>

        </div>

        <div class="row menu-row">

            <div class="menu-list">
                <label><i class="bi bi-people-fill"></i> Celebs</label>
                <div class="menu-items"><a href="#">Born Today</a></div>
                <div class="menu-items"><a href="#">Most Popular Celebs</a></div>
                <div class="menu-items"><a href="#">Celebrity News</a></div>
            </div>

            <div class="menu-list">
                <label><i class="bi bi-collection-play-fill"></i> Watch</label>
                <div class="menu-items"><a href="#">What to watch</a></div>
                <div class="menu-items"><a href="#">Latest Trailers</a></div>
                <div class="menu-items"><a href="#">IMDb Originals</a></div>
                <div class="menu-items"><a href="#">IMDb Picks</a></div>
                <div class="menu-items"><a href="#">IMDb Podcasts</a></div>
            </div>

            <div class="menu-list">
                <label><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe-americas" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484-.08.08-.162.158-.242.234-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z"/>
                  </svg> Community</label>
                <div class="menu-items"><a href="#">Help Center</a></div>
                <div class="menu-items"><a href="#">Contributor Zone</a></div>
                <div class="menu-items"><a href="#">Polls</a></div>
            </div>

        </div>
    </center>
    </main>


  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
