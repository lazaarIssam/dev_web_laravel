@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- ---------------------------------------------------------- --}}
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">Photo</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                   @php $cnt=1; @endphp
                    @foreach($stars as $star)
                        <tr>
                            <td scope="row text-center">
        <img src="{{asset('storage/'.$star->image)}}" class="img-thumbnail rounded-circle" style="width: 80px;height: 50px;">
                            </td>
                        <input type="hidden" id="idtr{{$cnt}}" value="{{ $star->id }}">
                        <input type="hidden" id="nametr{{$cnt}}" value="{{ $star->nom }}">
                        <input type="hidden" id="teltr{{$cnt}}" value="{{ $star->prenom }}">
                        <input type="hidden" id="emailtr{{$cnt}}" value="{{ $star->description }}">
                            <td scope="row text-center">{{ $tricien->nom }}</td>
                            <td scope="row text-center">{{ $tricien->prenom }}</td>
                            <td scope="row text-center">{{ $tricien->description }}</td>
                            <td>
                            <div class="row">
                            <div class="col-md-4">
                            <button type="button" id="modifier{{$cnt}}" onclick="modifier({{$cnt}})" class="btn btn-warning btn-sm"> Modifier</button>
                            </div>
                            </div>
                            </td>
                        </tr>
                        @php $cnt++; @endphp
                    @endforeach

                </tbody>
            </table>
            {{-- ---------------------------------------------------------- --}}
        </div>
    </div>
</div>
@endsection