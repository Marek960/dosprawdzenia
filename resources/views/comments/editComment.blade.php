@extends('template')

@section('addComment')
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
<h2>Edycja komentarza</h2>
<form class="allForms" method="post" action="/editComment" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$data->id}}" />
    <div class="form-group">
        <label class="columns">Opis</label>
        <div>
            <input type="text" name="description" class="form-control input-lg" value="{{$data->description}}"/>
        </div>
    </div>
    <br>
    <div class="form-group text-right">
        <input type="submit" name="add" class="btn btn-primary input-lg" value="Edytuj komentarz" />
    </div>
</form>
@endsection