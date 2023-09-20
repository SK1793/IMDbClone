<!doctype html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <!-- Latest compiled and minified CSS -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <title>IMDb: Ratings, Reviews, and Where to Watch the Best Movies & TV Shows</title>
  <link rel="icon" href="{{asset('media/imdb-icon.png')}}" type="image/png" >

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    {{-- video js --}}
    <link href="//vjs.zencdn.net/8.3.0/video-js.min.css" rel="stylesheet">
    <script src="//vjs.zencdn.net/8.3.0/video.min.js"></script>

    <script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css" rel="stylesheet">
    {{--    <link rel="stylesheet" href="{{asset('scss/app.scss')}}">
    <script  src="{{asset('js/app.js')}}">     --}}


            <link rel="stylesheet" href="{{asset('css/app.css')}}">   {{-- Manual --}}
            <script href="{{asset('js/app.js')}}"></script>
            @php
            Session::put('isSearch',"false");
        @endphp
</head>

<body >
    {{-- <h1>@lang('lang.welcome')</h1> --}}

  <header id="header">

        <nav class="navbar navbar-expand-sm navbar-dark ">
            <!-- place navbar here -->
            <div class="logo nav-item1">
        <a href="{{route('movie.home')}}"><img src="{{asset('media/imdb-icon-png.png')}}" class="Imdb-icon" ></a>
    </div>

    <a class="button nav-link dropdown-toggle " href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('lang.menu')</a>
    <div class="nav-item1 dropdown " >
            <div class="dropdown-menu " aria-labelledby="dropdownId">

                <div id="overlay-menu"></div>
                <div id="popup-menu">
                    <iframe src="{{url('/')}}/menu_overlay" id="popup-iframe-menu"></iframe>
                    <span id="close" onclick="this.parentNode.style.display='none'" href="" type="button"><i class="bi bi-x-circle-fill" style="color:#f5c518"></i></span>
                </div>
            </div>
        </div>

        {{-- <script>
              $('dropdown').on('click',function(){
        $('.navbar .collapse').collapse('hide');})
        </script> --}}

        <script>
            const button = document.getElementById("dropdownId");
            const overlay = document.getElementById("overlay-menu");
            const popup = document.getElementById("popup-menu");

            var iframe = document.getElementById("popup-iframe-menu");
            iframe.width = screen.width;
            iframe.height = screen.height-200;

            button.addEventListener("click", function () {
            overlay.style.display = "block";
            popup.style.display = "block";
            });

        </script>

          <div class="container nav-item1">

            <form action="" method="" class="d-flex ">
            @csrf
                <div class="search-option">
                    <select class="form-select" name="search_option" id="">
                        <option selected>Title</option>
                        <option value="celebs"  @if (old('celebs')) selected @endif >@lang('lang.celebs')</option>
                        <option value="episode" @if (old('episode')) selected @endif>@lang('lang.episode')</option>
                        <option value="company" @if (old('company')) selected @endif>@lang('lang.company')</option>
                    </select>
                </div>

                <div class="search-input ">
            <input name="search" class="search-input form-control " type="text" placeholder="@lang('lang.search')" value={{$content_name ?? ""}}>
                </div>
            {{-- <button  class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> --}}
        </form>

                <a class="button navbar-brand nav-item1" href="#popup_Imdbpro" >Imdb<span style="color:aqua;">Pro</span></a>

                <div id="popup_Imdbpro" class="overlay">                               {{-- on hover Display Popup --}}
                    <div class="popup">
                        <h2>ImdbPro Subscription</h2>
                        <a class="close" href="#">&times;</a>
                        <div class="content"><p>
                            <span style="color:red">*</span>This Service will Soon be Available </p>
                        </div>
                    </div>
                </div>

                <span class="dash-bold" >|</span>

            <button class="button navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse nav-item dots" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="button nav-link active" href="#" aria-current="page">@lang('lang.home') <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a  class="button nav-link wishlist" href="{{route('movie.favourites')}}">@lang('lang.watchlist') &nbsp;<i class="bi bi-plus-square"></i></a>
                    </li>

                        <li class="nav-item " >
                        <div id="profile-overlay" class="overlay ">
                            @if (Session::get('user_name'))

                            <ul id="profile-options-list" >
                                <a id="close" onclick="this.parentNode.parentNode.style.display='none'" href="" type="button"><i class="bi bi-x-circle-fill" style="color:#f5c518"></i></a>
                                <li><a href class="link" type="button">@lang('lang.your_activity')</a></li>
                                <li><a class="link" href="{{url('/')}}/favourite" type="button">@lang('lang.your_watchlist')</a></li>
                                <li><a class="link" type="button" diabled>@lang('lang.your_ratings')</a></li>
                                <li><a class="link" type="button">@lang('lang.your_lists')</a></li>
                                <li><a class="link" type="button">@lang('lang.account_setting')</a></li>
                                <li><a href="{{url('/')}}/logout" class="link" type="button">@lang('lang.sign_out')</a></li>

                            </ul>
                            @else
                            <ul id="profile-options-list">
                                <li><a href="{{url('/')}}/login" class="link" type="button">@lang('lang.login')</a></li>
                                {{-- <span href="" onclick="this.parentNode.parentNode.style.display='none'"><span class="close">&times;</span></span> --}}
                                <a id="close" onclick="this.parentNode.parentNode.style.display='none'" href="" type="button"><i class="bi bi-x-circle-fill" style="color:#f5c518"></i></a>
                            </ul>
                            @endif
                        </div>
                        <a class="button text-white" href="#profile-overlay" onclick="profile_list()" type="button"><i class="bi bi-person-circle"></i>@if (Session::get('user_name'))# @endif {{Session::get('user_name') ?? 'Signin'}}</a>
                    </li>

                    <li class="nav-item">

                            <select class="form-select " title="Language" name="lang_selected" id="language-selection"  onChange="window.open(this.options[this.selectedIndex].value)">
                            <p>Fully Supported</p>
                            <a >
                            <option value="{{url('/')}}/language/en"@php if((old('lang_selected')=="{{url('/')}}/language/en") || Session::get('lang')=='en' ) {echo "selected";}@endphp selected>en(English)</option>
                            </a>
                            <div>Partially Supported</div>

                            <a >
                                <option value="{{url('/')}}/language/fra"  @php if(old('lang_selected')=="{{url('/')}}/language/fra" || Session::get('lang')=='fra') {echo "selected";} @endphp >france(Français)</option>
                            </a>
                             <a >
                                 <option value="{{url('/')}}/language/hin" @php if(old('lang_selected')=="{{url('/')}}/language/hin" || Session::get('lang')=='hin') {echo "selected";} @endphp >हिंदी(भारत)</option>
                            </a>
                             <a >
                                 <option value="{{url('/')}}/language/ita" @php if(old('lang_selected')=="{{url('/')}}/language/ita" || Session::get('lang')=='ita') {echo "selected";} @endphp>Italiano(Italia)</option>
                            </a>

                        </select>

                    </li>

                </ul>

            </div>
      </div>

    </nav>

    <script>
        function profile_list()
        {
            const profile=document.getElementById('profile-options-list');

            profile.style.display='block';
            profile.focus();
        }
        </script>

  </header>

                                                    {{-- search --}}


@if ($content_name!=null)

<section>

<h1 style="text-align:center;color:#f5c518">{{$api_search['message'] ? $api_search['message'] : ''}}</h1>  {{-- search result message --}}

  <h2> <?php $content_array=$api_search['results']; ?> </h2>

<div class="grid-container search" >
    <div class="row">

      @foreach ($content_array as $content)                               {{-- items display for each loop --}}
    @php
                $api_=Http::get('https://imdb-rest-api.herokuapp.com/api/livescraper/reviews/'.$content['id']);
    @endphp
        <div class="col-auto search">

                <div class="container-card search">

                          <p class="movie-title" title="{{$content['title'] ? : 'N/A'}}">

                            <span name="movie_title">{{$content['title'] ? : 'N/A'}}&nbsp;<i class="bi bi-film" aria-hidden="true" title="movie"></i>
                          </span>
                          </p>                                                     {{-- content title --}}

                          <div class="image-card">

                              <form action="send_mail.php" method="POST" netlify>

                                  <input type="hidden" name="user_name" value={{Session::get('user_name')}}>
                                  <input type="hidden" name="user_mail" value={{Session::get('user_mail')}}>
                                  <input type="hidden" name="imdb_id" value="{{$content['id']}}">

                                  <button class="btn add-btn" href="{{url('/')}}/home/favourite/{{$content['id']}}" type="submit">
                                    <div class="add-button-container">
                                      <img src="{{asset('media/bookmark_48px.png')}}" max-width="48" max-height="48" title="add">
                                    </div>
                                </button>
                            </form>

                            <img class="rounded" src="{{$content['image']}} ?? '' " width="400" height="450" loading="lazy" title="poster">
                          </div>

                              <div class="description">

                                <span> @lang('lang.content')  : {{$content['type'] ?$content['type'] : 'N/A'}}</span> {{-- content type --}}
                                <br>
                                <span> @lang('lang.year')  : {{$content['year'] ?? ''}} </span><br>
                                <a href="{{url('/')}}/movie/get-details/{{$content['id']}}" class="btn btn-light" type="buttom" target=_blank>@lang('lang.more') </a> {{-- content link --}}
                            </div>

          </div>

        </div>
        <br>
      @endforeach
    </div>
    @php
    Session::put('isSearch',"true");
    @endphp
</section>

    @endif







