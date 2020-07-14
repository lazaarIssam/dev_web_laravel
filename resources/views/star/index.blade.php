@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row">
          <div class="col-sm-12">
                <button type="button" class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#exampleModal">Ajouter</button>
            {{-- Model d'ajoute de star --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Nouveau Star</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('star.store') }}" method="post" id="frm" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label for="nom" class="col-form-label">Nom :</label>
                                  <input type="text" class="form-control" name="nom" id="nom1" required>
                                </div>
                                <div class="form-group">
                                  <label for="prenom1" class="col-form-label">Prénom :</label>
                                  <input type="text" class="form-control" name="prenom" id="prenom1" required>
                                </div>
                                <div class="form-group">
                                    <label for="description1" class="col-form-label">Description :</label>
                                    <input type="text" class="form-control" name="description" id="description1">
                                </div>
                                <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Ajouter une image</label>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close</button>
                              <button type="submit" form="frm" class="btn btn-primary"> Submit</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      {{-- Tableau d'affichage/action --}}
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
                            <td scope="row text-center">{{ $star->nom }}</td>
                            <td scope="row text-center">{{ $star->prenom }}</td>
                            <td scope="row text-center">{{ $star->description }}</td>
                            <td>
                            <div class="row">
                            {{-- <div class="col-md-4">
                            <button type="button" id="modifier{{$cnt}}" onclick="modifier({{$cnt}})" class="btn btn-warning btn-sm"> Modifier</button>
                            </div> --}}
                            <div class="col-md-4">
                            <form method="post" action="{{ route('star.destroy', ['id' => $star->id]) }}">
                                @csrf
                                  <button class="btn btn-danger btn-sm">  Supprimer</button>
                            </form>
                            </div>
                            </div>
                            </td>
                        </tr>
                        @php $cnt++; @endphp
                    @endforeach

                </tbody>
            </table>
        </div>
        </div>
</div>

@stop