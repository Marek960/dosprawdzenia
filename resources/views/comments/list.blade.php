@extends('template')
  @section('listComments')

@if(isset($result))
 <div class="card-columns">
  @foreach($result as $task)
    <div class="card">
      <div class="card-body">
        <a href="{{ url('showComment',$task->id) }}" class="btn btn-primary">Przejdź do komentarza</a>
      </div>
    </div> 
  @endforeach
  </div>
@endif

@endsection