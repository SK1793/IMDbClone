<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>

<body id="body">

    <style>
        .close{
        right: 15%;
        position:absolute;
        font-size:2em;
        }
    </style>



    <header>

    </header>

    <main>
        @php
    $api_1=Http::get("https://imdb-api.projects.thetuhin.com/title/".$imdb_id);
    $content_name="";
@endphp

<section class="cnc_section" id="cnc_section">
    <table class="cnc_table">
        <tbody>

            <tr>

                <td rowspan="5">
                    <div class="col content_image" ><img src={{$api_1['image'] ?? ""}} width="280" height="340"></div>
                </td>
                <tr>
                    <td><label for="contentType">Content type : </label><p id="contentType"> {{$api_1['contentType']}}</p></td>
                </tr>
                <tr>
                    <td><label for="status">Status : </label><p id="status">{{$api_1['productionStatus'] ?? "N/A"}}</p></td>
                </tr>
                <tr>
                    <td><label for="year">Year : </label><p id="year">{{$api_1['year'] ?? 'N/A'}}</p></td>
                </tr>
                <tr>
                    <td><label for="Rating">Rating : </label><p id="Rating"><i class="bi bi-star-fill" style="color:#f5c518"> </i> {{$api_1['rating']['star']}}<span> <i class="bi bi-person-fill" style="color:#f5c518"> </i> {{$api_1['rating']['count']}}</span></p></td>
                </tr>

                <td></td>

            </tr>
        </tbody>
    </table>
</section>

<div class="container">
    <label for="title">Title:</label>
    <p id="title"> {{$api_1['title'] ?? "N/A"}}</p>

    <p> <label for="">Plot: </label>{{$api_1['plot'] ?? "N/A"}}</p>

    <p> <label for="">Awards-won: </label>{{$api_1['award']['wins'] ?? "N/A"}}</p>
    <p> <label for="">Awards-nominated: </label>{{$api_1['award']['nominations'] ?? "N/A"}}</p>
    <p> <label for="">contentRating: </label> {{$api_1['contentRating'] ?? "N/A"}}</p>
    <p> <label for=""> released Location: </label>{{$api_1['releaseDetailed']['releaseLocation']['country'] ?? "N/A"}}</p>

@foreach ($api_1['actors'] as $actor)

@endforeach()
  <label>Credits: </label>
  @if ($api_1['top_credits'])
      
  @foreach ($api_1['top_credits'] as $credits )
  <ul><p><strong>{{$credits['name'] ?? "N/A"}}</strong> :</p>
    <div>
        <ul class="actor-list">
            @foreach ($credits['value'] as $value)
            <div><p><span> {{$value ?? "N/A"}} </span></p> </div>
            @endforeach</ul>
            
        </div></ul>
        @endforeach
        @endif
<p></p></li>
<div class=""><label for="">Languages</label>
    <ul class="language-list">

        @foreach ($api_1['spokenLanguages'] as $language)
        <div>
        <p> {{$language['language'] ?? "N/A"}}</p></div>
        @endforeach
    </ul>
</div>
</div>

<div class="row">
    <div class="col-6"></div>
    <div class="col-6"></div>
</div>
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
