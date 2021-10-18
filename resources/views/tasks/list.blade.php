@extends('template')
  @section('listTasks')

@if(isset($result))
 <div class="card-columns">
  @foreach($result as $task)
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{$task->name}}</h5>
        <a href="{{ url('show',$task->id) }}" class="btn btn-primary">Przejdź do zadania</a>
      </div>
    </div> 
  @endforeach
  </div>
@endif

@endsection