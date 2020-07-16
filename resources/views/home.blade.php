@extends('layouts.app')

@section('content')
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.collapsible {
  background-color: rgb(223, 223, 223);
  color: black;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  font-weight: bold;
  outline: none;
  border-radius: 5px;
  font-size: 15px;
  margin: 5px
}

.active, .collapsible:hover {
  background-color: rgb(212, 212, 212);
}

img {
  float: left;
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width:170px;
  height:170px;
  margin-right:15px;
}

.content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  font: normal;
  margin: 5px;
  background-color: #f1f1f1;
}
    </style>
    </head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Pofile Browser</h1>
            {{-- Start of code --}}
            @foreach($list as $star)
            <button type="button" class="collapsible">{{ $star->nom }} {{ $star->prenom }}</button>
            <div class="content">
            <h2>{{ $star->nom }} {{ $star->prenom }}</h2>
            <img src="{{asset('storage/'.$star->image)}}">
            <p>{{ $star->description }}.</p>
            </div>
            @endforeach
            {{-- Finish of code --}}
        </div>
    </div>
</div>
<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;
    
    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
          content.style.display = "none";
        } else {
          content.style.display = "block";
        }
      });
    }
</script>
@endsection
