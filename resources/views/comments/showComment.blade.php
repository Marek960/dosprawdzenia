@extends('template')
@section('comment')
<div>
  <a href="{{url('/')}}" class="btn btn-primary">Wróć</a>
</div>

<div id="cardrecipe" class="card">
  <div class="card-body">
    <p class="card-text">Opis:<br> {{$data->description}}</p>
    <a href="{{ url('deleteComment',$data->id) }}" onclick="return confirm('Czy na pewno usunąć?')" class="btn btn-primary management">Usuń</a>
    <a href="{{ url('editComment',$data->id) }}" class="btn btn-primary management">Edytuj</a>
  </div>
</div>
@endsection