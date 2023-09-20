@include('page.header')

<body>


    <section>

        <div class="row">
            <div class="col-1">
       <label class="form-label">Sort</label> &nbsp;
        <select class="form-select form-select-md" name="sort_select" id="sort_select">
            <option value="" selected>Name(A-Z)</option>
            <option value="">Modified</option>
        </select>
            </div>
        </div>

        @php
            $api=Http::get('https://imdb-rest-api.herokuapp.com/api/livescraper/reviews/tt9179430');
        @endphp

@foreach ($api['reviews'] as $content)
<div class="container-reviews">

        <div class="grid-container">

               <div class="grid-item label">
                <p>"<span>{{$content['short_review'] ? $content['short_review'] : 'N/A'}}</span>" &nbsp;  {{ $content['review_date']  ? $content['review_date'] : 'N/A' }}</p>
               </div>

                <div class="grid-item user-column rounded">
                    <img src="{{asset('media/person.png')}}">
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

                    <p>  {{$content['rating_value']}}<span style="color: #fff">~</span> <span><i class="bi bi-star-fill" style="color:#FFD700"></i><span></p>
                    @else
                    <span>N/A</span>
                    @endif


                </div>

            </div>
    </div>
    @endforeach
    </section>


</body>

</html>
