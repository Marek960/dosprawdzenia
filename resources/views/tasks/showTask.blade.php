@extends('template')
@section('task')
<div>
  <a href="{{url('/')}}" class="btn btn-primary">Wróć</a>
</div>

<div id="cardTask" class="card">
  <div class="card-body">
    <h2 class="card-title">{{$data->name}}</h2>
    <p class="card-text">Opis:<br>{{$data->description}}</p>
    <p class="card-text">Planowany czas: {{$data->planning_time}}</p>
    <p class="card-text">Czas wykonania: {{$data->doing_time}}</p>
    <p class="card-text">Branch: {{$data->branch}}</p>
    <p class="card-text">{{ $branchStatus == 1 ? 'Utworzony w repozytorium' : 'Nie utworzony w repozytorium' }}</p>
    <p class="card-text">Status: {{$data->status}}</p>
    <a href="{{ url('delete',$data->id) }}" onclick="return confirm('Czy na pewno usunąć?')" class="btn btn-primary management">Usuń</a>
    <a href="{{ url('edit',$data->id) }}" class="btn btn-primary management">Edytuj</a>
  </div>
  <div id="comments">
  <h3>Komentarze:</h3>
  @foreach ($data->comments as $comment)
  <div>{{ $comment->created_at }}</div>
  <div>{{ $comment->author }}</div>
  <div>{{ $comment->description }}</div>
  <a href="{{ url('deleteComment',$comment->id) }}" onclick="return confirm('Czy na pewno usunąć?')" class="btn btn-primary management">Usuń</a>
  <a href="{{ url('editComment',$comment->id) }}" class="btn btn-primary management">Edytuj</a>
  @endforeach
  <form class="allForms" method="post" action="{{route('comment.store', $data->id)}}" enctype="multipart/form-data">
    @csrf
    <div class="">
        <label class="">Komentarz</label>
        <div>
            <input type="text" name="description" class="fieldComment" />
        </div>
    </div>
    <br>
    <div class="">
        <input type="submit" name="add" class="" value="Dodaj komentarz" />
    </div>
  </form>
</div>
</div>
@endsection