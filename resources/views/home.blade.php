@extends('layouts.app')

@section('content')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
      margin: 0;
      font-family: "Lato", sans-serif;
    }
    
    .sidebar {
      margin: 0;
      padding: 0;
      width: 200px;
      background-color: #f1f1f1;
      position: fixed;
      height: 100%;
      overflow: auto;
    }
    
    .sidebar a {
      display: block;
      color: black;
      padding: 16px;
      text-decoration: none;
    }
     
    .sidebar a.active {
      background-color: #4c6faf;
      color: white;
    }
    
    .sidebar a:hover:not(.active) {
      background-color: rgb(172, 172, 172);
      color: white;
    }
    
    div.content {
      margin-left: 200px;
      padding: 1px 16px;
      height: 1000px;
    }
    
    @media screen and (max-width: 700px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      .sidebar a {float: left;}
      div.content {margin-left: 0;}
    }
    
    @media screen and (max-width: 400px) {
      .sidebar a {
        text-align: center;
        float: none;
      }
    }
    </style>
    </head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- Start of code --}}
            <body>
                
                <div class="sidebar">
                    @foreach($list as $star)
                  <a class="active" >{{ $star->nom }} {{ $star->prenom }} </a>
                </div>
                <div class="content">
                    <img src="{{asset('storage/'.$star->image)}}" class="img-thumbnail " style="width: 90px;height: 60px;">
                  <p>{{ $star->description }}</p>
                </div>
                </body>
                @endforeach
                </html>

            {{-- Finish of code --}}
        </div>
    </div>
</div>
@endsection
