@extends('template')

@section('editTask')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<div>
    <a href="{{url('/')}}" class="btn btn-primary">Wróć</a>
</div>
<h2>Edycja zadania</h2>

<form class="allForms" method="post" action="/edit" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$data->id}}" />
    <div class="form-group">
        <label class="columns">Nazwa</label>
        <div>
            <input type="text" name="name" class="form-control input-lg" value="{{$data->name}}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="columns">Opis</label>
        <div>
            <input type="text" name="description" class="form-control input-lg" value="{{$data->description}}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="columns">Planowany czas</label>
        <div>
            <input type="text" name="planning_time" class="form-control input-lg" value="{{$data->planning_time}}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="columns">Czas wykonania</label>
        <div>
            <input type="text" name="doing_time" class="form-control input-lg" value="{{$data->doing_time}}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="columns">Branch</label>
        <div>
            <input type="text" name="branch" class="form-control input-lg" value="{{$data->branch}}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="columns">Status</label>
        <div>
            <select class="form-control" name="status">
                <option value="{{$data->status}}" selected>{{$data->status}}</option>
                <option value="todo">todo</option>
                <option value="doing">doing</option>
                <option value="stoping">stoping</option>
                <option value="done">done</option>
           </select>
        </div>
    </div>

    <div class="form-group">
        <label class="columns">Przypisz zadanie użytkownikowi</label>
        <div>
            <select class="form-control" name="assignUser">
                @foreach ($data->users as $user)
                    <option value="{{$user->id}}" selected>
                            {{$user->name}}
                    </option>
                @endforeach
                @foreach ($users as $key => $user)
                    <option value="{{ $key }}">{{ $user }}</option>
                @endforeach
           </select>
        </div>
    </div>
    <br>
    <br>

    <div class="form-group text-right">
        <input type="submit" name="add" class="btn btn-primary input-lg" value="Edytuj zadanie" />
    </div>
</form>
@endsection