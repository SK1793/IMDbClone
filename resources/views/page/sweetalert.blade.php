@extends('page.main')


@section('main-section')

        <style>
             .footer-container{
                 display: grid;
                 grid-template-columns: auto auto auto;
                }
                .footer-container .row{
                    display:block;
                }

        </style>
@php
    $api_1=Http::get("https://imdb-api.projects.thetuhin.com/title/tt9603212");
    $content_name="";
@endphp

<div class="container">
    <p>Content type: {{$api_1['contentType']}}</p>
    <p>Plot: {{$api_1['plot']}}</p>
    <p>Status: {{$api_1['productionStatus']}}</p>
    <p>Awards-won: {{$api_1['award']['wins']}}</p>
    <p>Awards-nominated: {{$api_1['award']['nominations']}}</p>
    <p>contentRating: {{$api_1['contentRating']}}</p>

    <p>released Location: {{$api_1['releaseDetailed']['releaseLocation']['country']}}</p>
    @foreach ($api_1['actors'] as $actor)
    
    @endforeach()
    <ol>actors:<li> {{$actor}}</li></ol>
    <div>
    <ul>Languages
    @foreach ($api_1['spokenLanguages'] as $language)
    <li>
    <p> {{$language['language']}}</p></li>
    @endforeach
    </ul></div>
</div>

<div class="row">
    <div class="col-6"></div>
    <div class="col-6"></div>
</div>

@endsection

