@extends('template')

@section('front')

<div id="titleTable">Tablica zadań</div>
<div id="table">
  <div class="block"  id="todo">
    <h2>Do zrobienia</h2>
    @foreach($data as $task)
    @if($task->status === 'todo')
      <div class="item">
        <h5 class="title">{{$task->name}}</h5>
        {{-- <div>  Dodano przez: {{ $task->users[0]->name }} </div> --}}
        <a href="{{ url('show',$task->id) }}" class="btn">Przejdź do zadania</a>
      </div>
    @endif
    @endforeach
  </div>

  <div class="block" id="doing">
    <h2>W trakcie</h2>
    @foreach($data as $task)
    @if($task->status === 'doing')
      <div class="item">
        <h5 class="title">{{$task->name}}</h5>
        {{-- <div>  Dodano przez: {{ $task->users[0]->name }} </div> --}}
        <a href="{{ url('show',$task->id) }}" class="btn">Przejdź do zadania</a>
      </div>
    @endif
    @endforeach
  </div>

  <div class="block" id="stoping">
    <h2>Wstrzymane</h2>
    @foreach($data as $task)
    @if($task->status === 'stoping')
      <div class="item">
        <h5 class="title">{{$task->name}}</h5>
        {{-- <div>  Dodano przez: {{ $task->users[0]->name }} </div> --}}
        <a href="{{ url('show',$task->id) }}" class="btn">Przejdź do zadania</a>
      </div>
    @endif
    @endforeach
  </div>

  <div class="block" id="done">
    <h2>Zrobione</h2>
    @foreach($data as $task)
    @if($task->status === 'done')
      <div class="item">
        <h5 class="title">{{$task->name}}</h5>
        {{-- <div>  Dodano przez: {{ $task->users[0]->name }} </div> --}}
        <span><a href="{{ url('show',$task->id) }}" class="btn">Przejdź do zadania</a></span>
      </div>
    @endif
    @endforeach
  </div>
</div>
@endsection