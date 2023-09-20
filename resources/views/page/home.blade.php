@extends('page.main')

@section('main-section')

<main focus>

    @if((Session::get('isSearch')=="true") )
    <style>
        #home-section{
            display: none;
        }
    </style>
    
    @endif

    <section id="home-section">

  <div class="trending-india">

    <?php

    if($content_name==null)
    {

        ?>
                                                                        {{--Mystery Section  --}}

<section>

    <h2>@lang('lang.top') : <strong> Mystery</strong></h2>
    <br>


<div class="trend-content-container rounded-2">

    @for ($i=0;$i<count($Array_mystery);$i++)

    @if ($mystery[''.$i.'']['images']['poster_url'])
        <div class="container-card">
            <p class="movie-title" title="{{($mystery[''.$i.'']['info']['title']) ? $mystery[''.$i.'']['info']['title'] :  'N/A'}}">{{$mystery[''.$i.'']['info']['title'] ? $mystery[''.$i.'']['info']['title'] :  'N/A'}}</p>
            <div class="image-card-trend">


                <form action="send_mail.php" method="post" netlify>
                        @csrf
                    <input type="hidden" name="user_name" value="{{Session::get('user_name')}}">
                    <input type="hidden" name="user_mail" value="{{Session::get('user_mail')}}">
                    <input type="hidden" name="imdb_id" value="{{$mystery[''.$i.'']['_id']}}">
                <button class="btn add-btn" href="{{url('/')}}/home/favourite/{{$mystery[''.$i.'']['_id']}}" type="submit">
                    <div class="add-button-container-bookmark">
                        <img src="{{asset('media/bookmark_48px.png')}}" max-width="24" max-height="24" title="add">
                    </div>
                    
                </button>
            </form>
                    <img src={{$mystery[''.$i.'']['images']['poster_url']}}  class="rounded" width="350" height="300" title="poster">
                </div>
                <div class="description">
                    <p><span><i class="bi bi-star-fill" style="color:#FFD700" title="rating"></i></span>&nbsp; {{ $mystery[''.$i.'']['info']['ratingValue'] ? $mystery[''.$i.'']['info']['ratingValue']  :'N/A'}} &nbsp;
                        <span style="color:rgba(159, 155, 155, 0.899)"> | </span>&nbsp; <i class="bi bi-person" title="users rated"></i> &nbsp;{{$mystery[''.$i.'']['info']['ratingCount'] ? $mystery[''.$i.'']['info']['ratingCount'] : 'N/A'}} </p>
                    <p>@lang('lang.duration') : &nbsp;{{($mystery[''.$i.'']['info']['RunTime'])  ? $mystery[''.$i.'']['info']['RunTime'] : 'N/A'}}</p>
                    <a class="button text-white" style="color:#000" href="/movie/get-details/{{$mystery[''.$i.'']['_id']}}" target="_blank" type="button">@lang('lang.more')
                    <i class="bi bi-info-circle more" aria-hidden="true" title="more"></i>
                    </a>
                    <a class="button text-white" style="color:#000" href="{{url('/')}}/videos/playlist/{{$mystery[''.$i.'']['_id']}}" target="_blank" type="button">@lang('lang.trailer')
                    <i class="bi bi-play-fill play" aria-hidden="true" title="Trailer"></i>
                    </a>
                </div>
        </div>
    @endif
@endfor

</div>

</section>
                                                                    {{--Thriller Section  --}}

<section>


    <h2>@lang('lang.top') :  <strong> Thriller </strong></h2>
    <br>

<div class="trend-content-container rounded-2">

    @for ($i=0;$i<count($Array_thriller);$i++)


    @if ($thriller[''.$i.'']['images']['poster_url'])

        <div class="container-card">
            <p class="movie-title" title="{{($thriller[''.$i.'']['info']['title']) ? $thriller[''.$i.'']['info']['title'] :  'N/A'}}">{{($thriller[''.$i.'']['info']['title']) ? $thriller[''.$i.'']['info']['title'] :  'N/A'}}</p>

            <div class="image-card-trend">

                    <form action="send_mail.php" method="post" netlify>
                        @csrf
                        <input type="hidden" name="user_name" value="{{Session::get('user_name')}}">
                        <input type="hidden" name="user_mail" value="{{Session::get('user_mail')}}">
                        <input type="hidden" name="imdb_id" value="{{$thriller[''.$i.'']['_id']}}">

                    <button class="btn add-btn" href="{{url('/')}}/home/favourite/{{$thriller[''.$i.'']['_id']}}" type="submit">
                        <div class="add-button-container-bookmark">
                            <img src="{{asset('media/bookmark_48px.png')}}" max-width="24" max-height="24" title="add">
                        </div>
                    </button>
                    </form>

                        <img src={{$thriller[''.$i.'']['images']['poster_url']}}  class="rounded" width="350" height="300" title="poster">
                </div>

                <div class="description">
                    <p><span><i class="bi bi-star-fill" style="color:#FFD700" title="rating"></i></span>&nbsp; {{ $thriller[''.$i.'']['info']['ratingValue'] ? $thriller[''.$i.'']['info']['ratingValue']  :'N/A'}} &nbsp;<span style="color:rgba(159, 155, 155, 0.899)"> | </span>&nbsp;
                         <i class="bi bi-person" title="users rated"></i> &nbsp;{{$thriller[''.$i.'']['info']['ratingCount'] ? $thriller[''.$i.'']['info']['ratingCount'] : 'N/A'}} </p>
                    <p>@lang('lang.duration') : &nbsp;{{($thriller[''.$i.'']['info']['RunTime'])  ? $thriller[''.$i.'']['info']['RunTime'] : 'N/A'}}</p>
                    <a class="button text-white" style="color:#000" href="/movie/get-details/{{$thriller[''.$i.'']['_id']}}" target="_blank" type="button">@lang('lang.more')
                    <i class="bi bi-info-circle more" aria-hidden="true" title="more"></i>
                    </a>
                    <a class="button text-white" style="color:#000" href="{{url('/')}}/videos/playlist/{{$thriller[''.$i.'']['_id']}}" target="_blank" type="button">@lang('lang.trailer')
                    <i class="bi bi-play-fill play" aria-hidden="true" title="videos"></i>
                    </a>
                </div>
        </div>
    @endif
@endfor

</div>

</section>

                                                                                                                    {{--Crime Section  --}}
<section>

    <h2>@lang('lang.top') : <strong> Crime</strong></h2>
    <br>

<div class="trend-content-container rounded-2">

    @for ($i=0;$i<count($Array_crime);$i++)

    @if ($crime[''.$i.'']['images']['poster_url'])
        <div class="container-card">
            <p class="movie-title" title="{{($crime[''.$i.'']['info']['title']) ? $crime[''.$i.'']['info']['title'] :  'N/A'}}">{{($crime[''.$i.'']['info']['title']) ? $crime[''.$i.'']['info']['title'] :  'N/A'}}</p>
            <div class="image-card-trend">

                <form action="send_mail.php" method="post" netlify>
                    @csrf
                    <input type="hidden" name="user_name" value="{{Session::get('user_name')}}">
                    <input type="hidden" name="user_mail" value="{{Session::get('user_mail')}}">
                    <input type="hidden" name="imdb_id" value="{{$crime[''.$i.'']['_id']}}">
                <button class="btn add-btn" href="{{url('/')}}/home/favourite/{{$crime[''.$i.'']['_id']}}" type="submit">
                    <div class="add-button-container-bookmark">
                        <img src="{{asset('media/bookmark_48px.png')}}" max-width="48" max-height="48" title="add">
                    </div>     
                </button>

            </form>

                    <img src={{$crime[''.$i.'']['images']['poster_url']}}  class="rounded" width="350" height="400" title="poster">
                </div>
                <div class="description">
                    <p><span><i class="bi bi-star-fill" style="color:#FFD700" title="rating"></i></span>&nbsp; {{ $crime[''.$i.'']['info']['ratingValue'] ? $crime[''.$i.'']['info']['ratingValue']  :'N/A'}} &nbsp;<span style="color:rgba(159, 155, 155, 0.899)"> | </span>&nbsp;
                        <i class="bi bi-person" title="users rated"></i> &nbsp;{{$crime[''.$i.'']['info']['ratingCount'] ? $crime[''.$i.'']['info']['ratingCount'] : 'N/A'}} </p>
                    <p>@lang('lang.duration') : &nbsp;{{($crime[''.$i.'']['info']['RunTime'])  ? $crime[''.$i.'']['info']['RunTime'] : 'N/A'}}</p>
                    <a class="button text-white" style="color:#000" href="/movie/get-details/{{$crime[''.$i.'']['_id']}}" target="_blank" type="button">@lang('lang.more')
                    <i class="bi bi-info-circle more" aria-hidden="true" title="more"></i>
                    </a>
                    <a class="button text-white" style="color:#000" href="{{url('/')}}/videos/playlist/{{$crime[''.$i.'']['_id']}}" target="_blank" type="button">@lang('lang.trailer')
                    <i class="bi bi-play-fill play" aria-hidden="true"  title="videos"></i>
                    </a>
                </div>
        </div>
    @endif
@endfor

</div>

</section>

<?php } ?>
                                                                                        {{--Search Result  --}}
  </div>

  </div>

</section>
  </main>

@endsection
