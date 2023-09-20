@extends('page.main')


@section('main-section')

<main>
  {{-- <script> console.log($model); </script> --}}

      @if (Session::get('isAdded')=="true")
      <script>
                  Swal.fire({
                      icon: 'success',
                      title: 'Added to Watchlist'
                  });

          </script>
          @php
              Session::put('isAdded',"false");
          @endphp
      @endif

      @if((Session::get('isSearch')=="true") )
      <style>
          #favourites-section{
              display: none;
          }
      </style>
      
      @endif
<section id="favourites-section">

  <div class="wishlist-section" >

      <div class="grid-container1">
          @foreach ( $model_ar as $data1 )  {{-- For Each Loop --}}

          @if($data1->getattributes()['user_id']==Session::get('user_id'))

          <?php
          $id=$data1->getAttributes()['Imdb_id'];
          $data1= Http::get("https://imdb-api.projects.thetuhin.com/title" ."/". $id);
          ?>

        @if ($id)

        <div class="grid-item">
            <div class="row">
                <div class="col-4">

          <div class="card-view">
            <div class="card-body-part">

                <p class="movie-title" title="{{$data1['title'] ? $data1['title']: 'N/A'}}"><span name="movie_title" class="movie-title">{{$data1['title'] ? $data1['title']: 'N/A'}}
                    &nbsp; <i class="bi bi-film" title="movie"></i>
                </span> <p>{{-- content title --}}

                    <a href="{{url('/')}}/home/favourite/remove/{{$data1['id'] ? $data1['id']: 'N/A'}}" type="button">
                        <i class="bi-trash-fill delete" alt="delete" title="delete" ></i></a>

              <div class="">

                </a>
                <img class="rounded" src="{{$data1['image'] ? $data1['image']: 'N/A'}}" width="300" height="300" loading="lazy" >    {{-- picture --}}
            </div>

              <span>@lang('lang.content') : {{$data1['contentType'] ? $data1['contentType']: 'N/A'}}</span> {{-- content type --}}
              <br>
              <span>@lang('lang.year') : {{$data1['year']}} </span>
              <br>

              <a href="{{url('/')}}/movie/get-details/{{$data1['id']}}" class="btn btn-light" type="buttom" target=_blank >@lang('lang.more')</a> {{-- content link --}}

            </div>
          </div><br>
        </div>
      </div>
        </div>

        @else
            <p>@lang('lang.data_not_loaded')...</p>
            @endif
            @endif
        @endforeach                                 {{-- end for loop for data --}}
        {{-- end for loop for model --}}

      </div>

    </div>
</section>
</main>

@endsection
