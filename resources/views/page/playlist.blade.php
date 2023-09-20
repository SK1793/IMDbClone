@extends('page.main')


@section('main-section')

<main>

    @if((Session::get('isSearch')=="true") )
    <style>
        #playlist-section{
            display: none;
        }
    </style>

    @endif

    <section id="playlist-section">

  @if ($selected=="video" & $trailer_api!=null )

  <div class="playlist-container">

      <div class=" video-player-container">

        <script src="https://content.jwplatform.com/libraries/xZ88RwO4.js"></script>
            <script>jwplayer.key="zTEbSn/eAplL0RLXT030FzOcek6qXmtrxju6Jg=="</script>

                <?php
                $looper=0;
                foreach($trailer_api as $content)
                {
                  ?>
          <br>

          <table>
            <tr>
              <td>
                <div id="video-player"></div>
                {{-- <p>{{$content['url']}}</p> --}}

                @if ($looper==0)
                    <script type="text/javascript">

                    jwplayer("video-player").setup({
                        file:"<?php echo $content['url'] ? $content['url'] : '' ; ?>",
                        image: " <?php echo $api_['image'] ; ?> ",
                        width: screen.width,
                        height: screen.height-200,
                        primary: "html5",
                        auto:'true'
                    }).focus();
                    </script>
                @endif

                </td>
            </tr>
            <tr>
                <td>
                <p>@lang('lang.below_video') &nbsp;<span>{{$content['displayName']['value']}}</span></p>

                <video  width="400" height="350" poster="{{$api_['image']}}" controls>
                <source src={{$content['url']}} type={{$content['mimeType']}}>
                <video>


              </td>
            </tr>
          </table>
                <?php $looper+=1; } ?>

              </div>
            </div>    {{-- video playlist --}}


  @elseif ($selected=="video" && $trailer_api==null)

  <p style="position:static;">@lang('lang.videos_not_found') &nbsp; <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" color="yellow" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg>  </p>

  @endif


  @if ($selected=="photo" && $api_['images']!=null )

  <div class="photo-player" >

  <div class="photo-player-container">



      {{-- carousel bootstrap --}}

      <!-- Carousel -->
      <div id="carousel" class="carousel slide"  data-bs-ride="carousel" onload="carousel_start()">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
          @php
            $i=0;
          @endphp


          @foreach ( $api_['images'] as $image1  )
           @php $i=$i+1; @endphp
            <button type="button" data-bs-target="#demo" data-bs-slide-to={{$i}}></button>
            @endforeach
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src={{$api_['images']['0']}} alt="{{$api_['title']}} Snapshot" class="d-block w-100" @endphp  loading="lazy">
                </div>


                @foreach ( $api_['images'] as $image1 )
                @if ($image1)

                <div class="carousel-item">
                    <img src={{$image1}} alt="{{$api_['title']}} Snapshot" class="d-block w-100" @endphp  loading="lazy">
                </div>
                @endif

                @endforeach
        </div>


  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
<br>
<section>
      <script>

        function carousel_start(){

            $('#carousel').carousel(){
                interval:2000;
            }
            $('#carousel').width=screen.width;
            $('#carousel').height=window.innerHeight;

        }
        </script>

</section>
<br>
<section>

    <div class="playlist-photo-container">

        <table id="table playlist-photo-table">
            <tr>
                <td>

                    @foreach ( $api_['images'] as $image1 )

                @if ($image1)
                    <img src={{$image1}} width="450" height="450" loading="lazy">
                @endif
                @endforeach

              </td>
            </tr>
        </table>
    </div>

</section>

     {{-- <img src={{$image}} width="420" height="420" loading="lazy"> --}}



    </div>
  </div>    {{-- photo playlist --}}

  @elseif ($selected=="photo" && $api_['images']==null)

  <p style="position:static;">@lang('lang.photos_not_found')! &nbsp; <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" color="yellow" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg>
  </p>
  @endif
</section>
</main>

@endsection
