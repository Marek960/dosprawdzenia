@extends('template')

@section('addTask')
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

<form class="allForms" method="post" action="/store" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="columns">Nazwa</label>
        <div>
            <input type="text" name="name" class="form-control input-lg" />
        </div>
    </div>
    <div class="form-group">
        <label class="columns">Opis</label>
        <div>
            <input type="text" name="description" class="form-control input-lg" />
        </div>
    </div>
    <div class="form-group">
        <label class="columns">Planowany czas</label>
        <div>
            <input type="text" name="planning_time" class="form-control input-lg" />
        </div>
    </div>
    <div class="form-group">
        <label class="columns">Czas wykonania</label>
        <div>
            <input type="text" name="doing_time" class="form-control input-lg" />
        </div>
    </div>
    <div class="form-group">
        <label class="columns">Branch</label>
        <div>
            <input type="text" name="branch" class="form-control input-lg" />
        </div>
    </div>
    <div class="form-group">
        <label class="columns">Status</label>
        <div>
            <select class="form-control" name="status">
                <option value="todo">todo</option>
                <option value="doing">doing</option>
                <option value="stoping">stoping</option>
                <option value="done">done</option>
           </select>
        </div>
    </div>
    <br>
    <br>
    <div class="form-group text-right">
        <input type="submit" name="add" class="btn btn-primary input-lg" value="Dodaj zadanie" />
    </div>
</form>
@endsection