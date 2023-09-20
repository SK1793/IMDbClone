@extends('page.main')

@section('main-section')
@php
$api=Http::get('https://imdb-rest-api.herokuapp.com/api/livescraper/reviews/'.$api_['id']);
$api_2=Http::get('https://imdb-api.projects.thetuhin.com/title/'.$api_['id']);
@endphp

@if((Session::get('isSearch')=="true") )
<style>
    #details-section{
        display: none;
    }
</style>

@endif
<section id="details-section">

<div class=" details-container">
    <div class="dropdown">

        <div class="cnc-container">
            <div id="overlay-cnc"></div>
            <div id="popup-cnc">
                <iframe src="{{url('/')}}/castncrew_overlay/{{$api_['id']}}" id="popup-iframe-cnc"></iframe>
                <a id="close" onclick="this.parentNode.style.display='none'" href="" type="button"><i class="bi bi-x-circle-fill" style="color:#f5c518"></i></a>
            </div>
        </div>
    </div>
    <div class=row>
        <div class="col-6" >

        </div>

    <div class="links-container col-6" id="links-container-row">
        <button class="button btn" onclick="overlay_cnc()" href="" type="button">@lang('lang.castncrew')</button>
        .
        <a class="link" onclick="funReview()">@lang('lang.user_reviews')</a>
        .
        <a class="link" href="#">@lang('lang.trivia')</a>

        <span class="dash">|</span>

        <a href="#"  class="link">
            IMDBPro</a>

        <span class="dash">|</span>

        <a class="button" type="button"><i class="bi bi-grid"></i> @lang('lang.all_topics')</a>

        <span class="dash">|</span>

        <button class="button btn" href="" onclick="share()" ><i class="bi bi-share-fill"></i></button>

    </div>
</div>

    <script>
    function overlay_cnc(){
        let overlay = document.getElementById("overlay-cnc");
        let popup = document.getElementById("popup-cnc");
        let body = document.getElementById("details-section");
        let iframe = document.getElementById("popup-iframe-cnc");
        iframe.width = screen.width;
    iframe.height = screen.height-200;

            overlay.style.display = "block";
            popup.style.display = "block";

            console.log('Overlayed!');
    }
    </script>

<script type="text/javascript">
  </script>

<script>
    function share(){
        let url=location.href;
        console.log("copied the text to Clipboard: "+url);
        navigator.clipboard.writeText(url).then(() => {
        alert('Content copied to clipboard');
        },() => {
        alert('Failed to copy');
        });
}
</script>

<div class="row " id="details-container-row">
    <div class="col-6 ">

    <div class="row " id="content-title" title="{{$api_['title'] ?$api_['title'] :'' }}">
        <p style="font-size:2em;">{{$api_['title'] ?$api_['title'] :'' }}</p>
    </div>

    <div class="row content-title-links">
        <div class="col-6 content-details">
        <a class="link" href="#">{{$api_['year'] ?$api_['year'] :'N/A'}}</a> .
        <a class="link" href="#">{{$api_['rating' ]['star'] ? $api_['rating' ]['star'] :'N/A' }}</a> .
        <span class="runtime">{{$api_['runtime']?$api_['runtime'] :'N/A'}}</span>
        </div>
    </div>
    </div>

    <div class="col-6">
        <table class=" table-detail-rating" >

            <tr>
                <th>IMDB @lang('lang.rating')</th>
                <th>@lang('lang.your_rating')</th>
                <th>@lang('lang.popularity')</th>
           </tr>
           <tr>
                <td>
                 <div >{{$api_['rating' ]['star'] ? $api_['rating' ]['star'] :'N/A' }}/10</div>
                 <div >@if ($api_['rating' ]['count']!=null && $api_['rating' ]['count']>1000)
                    {{round(($api_['rating' ]['count'] ? $api_['rating' ]['count'] :'N/A')/1000 ,'2')}}K
                    @elseif ($api_['rating' ]['count']!=null && $api_['rating' ]['count']<1000)
                    {{$api_['rating' ]['count'] ? $api_['rating' ]['count'] :'N/A' }}</div>
                    @endif
                </td>

                <td style="color:#5799ef"><a href="#"></a><i class="bi bi-star" ></i> @lang('lang.rate')</td>
                <td>

                <p style="font-weight:bold;">
                @if ($api_['rating' ]['star'] ? $api_['rating' ]['star'] :'N/A'  > 6.5)
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 16 16" style="color:green;">
                    <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z"/>
                  </svg>
                @elseif ($api_['rating' ]['star'] ? $api_['rating' ]['star'] :'N/A' < 6.5)
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-down-arrow" viewBox="0 0 16 16" style="color:red;">
                    <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 11.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-1 0v2.6l-3.613-4.417a.5.5 0 0 0-.74-.037L7.06 8.233 3.404 3.206a.5.5 0 0 0-.808.588l4 5.5a.5.5 0 0 0 .758.06l2.609-2.61L13.445 11H10.5a.5.5 0 0 0-.5.5Z"/>
                  </svg>
                @elseif ($api_['rating' ]['star'] ? $api_['rating' ]['star'] :'N/A'  == 6.5)
                <i class="bi bi-dash-lg"></i>
                @endif

                </td>
           </tr>
        </table>
    </div>

</div>
            @php
            $c_user=Session::get('user_id');
            $item_id=$movie::where('user_id',$c_user)->get();
            $isAdded="0";
            @endphp

@foreach($item_id as $item)


    @if($item->getAttributes()['Imdb_id']==$api_['id'] )
    @php
        $isAdded="1";
    @endphp
    @endif

@endforeach
<div class="row" id="media-container-row" >
    <div class="col-auto container-card">
        <div class="image-card-trend">

    @if ( $isAdded!="1")

    <form action="send_mail.php" method="POST" netlify>
        @csrf
        <input type="hidden" name="user_name" value="{{Session::get('user_name')}}">
        <input type="hidden" name="user_mail" value="{{Session::get('user_mail')}}">
        <input type="hidden" name="imdb_id" value="{{$api_['id']}}">
        <button class="btn add-btn" href="{{url('/')}}/home/favourite/{{$api_['id']}}" type="submit">
            <div class="add-button-container-bookmark">
                <img src="{{asset('media/bookmark_48px.png')}}" max-width="48" max-height="48" title="add">
            </div>

        </button>
    </form>
    @endif

            <img src="{{$api_['image'] ? $api_['image'] :'' }}" width="270" height="420" title="poster">
</div>

    </div>


    <div class="col-auto ">   {{-- Video player Part --}}


                <?php
                $V_count=0;
                $playlist=array();
                foreach($trailer_api as $content)
                {

                    array_push($playlist,$content['url']);

                $V_count=$V_count+1;
                ?>


    <?php } ?>

            <script src="https://content.jwplatform.com/libraries/xZ88RwO4.js"></script>
                <script>jwplayer.key="zTEbSn/eAplL0RLXT030FzOcek6qXmtrxju6Jg=="</script>

                <div id="video-player"></div>

                @if ($playlist!=null)


                <script type="text/javascript">

                    jwplayer("video-player").setup({
                        file:"<?php echo $playlist[0] ? $playlist[0] : '' ; ?>",
                        image: " <?php echo $api_['image'] ; ?> ",
                        width:screen.width/3+(screen.width/6),
                        height: "420",
                        primary: "html5"
                    });

                    </script>
                @else

                <p style="position:static;">@lang('lang.video_not_found') &nbsp; <i class="bi bi-exclamation-triangle-fill"></i></p>

                @endif
    </div>

    @php
    $Pcount=0;
    foreach($api_['images'] as $images)
    {
        $Pcount=$Pcount+1;
    }

@endphp

    <div class="col-auto " > {{-- media container --}}

        <div class="row video-container">
            <a class="btn btn-videos" href="{{url('/')}}/videos/playlist/{{$api_['id']}}" type="button">
                <span><i class="bi bi-play-btn-fill" title="videos"></i><br>{{$V_count}} @lang('lang.videos') </span>
            </a>
        </div>

        <div class="row photo-container">

         <a class="btn btn-photos" href="{{url('/')}}/photos/playlist/{{$api_['id']}}" type="button">
            <span><i class="bi bi-image-fill" title="photos"></i><br>{{$Pcount}} @lang('lang.photos') </span>
            </a>

        </div>

    </div>

    <section id="summary">

        <div class="row">
            <div class="col">
                <label>Genre: </label>
                <ul class="genre-list">
                    @foreach($api_2['genre'] as $genre)
                    <div>  <p ><span class="dash-bold">|</span> {{$genre}} <span class="dash-bold">|</span> </p>  </div>
                    @endforeach
                </ul>
        </div>
            <div class="col" style="text-align: center;">
            <label>Content-Rating: </label>
                 <p>{{$api_2['contentRating'] ?? ''}}</p>
            </div>
        </div>

        <div class="row">
                <div class="col"><label>Languages: </label>
                <ul class="language-list">
                    @foreach ($api_2['spokenLanguages'] as $language)
                    <div>  <p><span class="dash-bold">|</span> {{$language['language']}} <span class="dash-bold">|</span></p>  </div>
                    @endforeach
                </ul></div>
                <div class="col" style="text-align: center;">
                    <label>Content-Type: </label>
                         <p>{{$api_2['contentType'] ?? ''}}</p>
                    </div>
            </div>
            <div class="row">
                <div class="col">
                <label>Summary: </label>
                <p>{{$api_2['plot'] ?? ''}}</p>
            </div>

        </div>
    </section>

</div>

</div>

{{-- <p>{{$api_['title']}}</p> --}}

</div>

                                                                {{--Reviews Section  --}}
    <section id="review-section">

        <div class="row" id="review-row" tabindex="1">
            <div class="col-1">
       <label class="form-label">Sort</label> &nbsp;
        <select class="form-select form-select-md" name="sort_select" id="sort_select">
            <option value="" selected>Name(A-Z)</option>
            <option value="">Modified</option>
        </select>
            </div>
        </div>



@foreach ($api['reviews'] as $content)
<div class="container-reviews">

        <div class="grid-container">

               <div class="label grid-container ">

                            <p>"<span>{{$content['short_review'] ? $content['short_review'] : 'N/A'}}</span>"</p>

                            <p>&nbsp;&nbsp;&nbsp;</p>

                            <p><span> {{ $content['review_date']  ? $content['review_date'] : 'N/A' }}</span></p>

               </div>

                <div class="grid-item user-column rounded">
                    <img src="{{asset('media/person.png')}}" title="user picture">
                    <p>{{$content['reviewer_name'] ? $content['reviewer_name'] : 'N/A'}}</p>
                </div>

                <div class="grid-item full-review rounded">
                    @if ($content['full_review'])
                    <p>{{$content['full_review']? $content['full_review'] : 'N/A'}} </p>
                    @else
                    <span>N/A</span>
                    @endif
                </div>

                <div class="grid-item rating">
                    @if ($content['rating_value'])

                    <p>  {{$content['rating_value'] ?$content['rating_value'] :'' }}<span style="color: #fff">~</span> <span><i class="bi bi-star-fill" style="color:#FFD700" title="rating"></i><span></p>
                    @else
                    <span>N/A</span>
                    @endif

                </div>



            </div>
    </div>
    @endforeach
    </section>
    <script>
        function funReview(){
            const review_sel=document.getElementById('review-section');

            review_sel.style.visibility='visible';
            review_sel.style.display='block';
            setTimeout(() => {

                document.getElementById('review-row').focus();
                }, 1000);
            }

    </script>

</div>

</section>

@endsection
