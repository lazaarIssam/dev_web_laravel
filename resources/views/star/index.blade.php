@extends('layouts.app')

@section('content')

<div class="container">
  @include('partials._messages')
        <div class="row">
          <div class="col-sm-12">
                <button type="button" class="btn btn-outline-success float-right mb-2" data-toggle="modal" data-target="#exampleModal">Ajouter</button>
                {{-- Modal for Adding Star || Modal pour l'ajout des stars --}}
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
                                  <label for="prenom1" class="col-form-label">Prenom :</label>
                                  <input type="text" class="form-control" name="prenom" id="prenom1" required>
                                </div>
                                <div class="form-group">
                                    <label for="description1" class="col-form-label">Description :</label>
                                    <textarea type="text" class="form-control" name="description" id="description1"> </textarea>
                                </div>
                                <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image1" name="image">
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

                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel1">Modifier star</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('star.update') }}" method="post" id="frm1" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="idm" name="id">
                                <div class="form-group">
                                  <label for="nom" class="col-form-label">Nom :</label>
                                  <input type="text" class="form-control" name="nom" id="nom" required>
                                </div>
                                <div class="form-group">
                                  <label for="prenom1" class="col-form-label">Prenom :</label>
                                  <input type="text" class="form-control" name="prenom" id="prenom" required>
                                </div>
                                <div class="form-group">
                                    <label for="description1" class="col-form-label">Description :</label>
                                    <textarea type="text" class="form-control" name="description" id="description"></textarea>
                                </div>
                                <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Ajouter une image</label>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close</button>
                              <button type="submit" form="frm1" class="btn btn-primary"> Update</button>
                            </div>
                          </div>
                        </div>
                      </div>


            <table class="table table-striped" >
                <thead>
                <tr>
                    <th scope="col">Photo</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                   @php $cnt=1; @endphp
                    @foreach($stars as $star)
                        <tr style="white-space: wrap;overflow: hidden;">
                            <td scope="row text-center">
        <img src="{{asset('storage/'.$star->image)}}" class="img-thumbnail " style="width: 90px;height: 60px;">
                            </td>
                        <input type="hidden" id="idtr{{$cnt}}" value="{{ $star->id }}">
                        <input type="hidden" id="nomtr{{$cnt}}" value="{{ $star->nom }}">
                        <input type="hidden" id="prenomtr{{$cnt}}" value="{{ $star->prenom }}">
                        <input type="hidden" id="descriptiontr{{$cnt}}" value="{{ $star->description }}">
                            <td scope="row text-center">{{ $star->nom }}</td>
                            <td scope="row text-center">{{ $star->prenom }}</td>
                            <td scope="row text-center" style="max-width: 300px;max-height: 10px">{{ $star->description }}</td>
                            <td>
                            <div class="row">
                            <div class="col-md-4">
                            <button type="button" id="modifier{{$cnt}}" onclick="modifier({{$cnt}})" class="btn btn-outline-primary btn-sm"> Modifier</button>
                            </div>
                            <div class="col-md-4">
                            <form method="post" action="{{ route('star.destroy', ['id' => $star->id]) }}">
                                @csrf
                                  <button class="btn btn-outline-danger btn-sm"> Supprimer</button>
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
<script>
  function modifier(params) {
      //alert(params);
     $('#idm').val($('#idtr'+params).val());
                 $('#nom').val($('#nomtr'+params).val());
                 $('#prenom').val($('#prenomtr'+params).val());
                 $('#description').val($('#descriptiontr'+params).val());
                 $('#exampleModal1').modal();
  }
 </script>
@endsection