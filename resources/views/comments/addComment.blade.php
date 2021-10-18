@extends('template')

@section('editComment')
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

<form class="allForms" method="post" action="/storeComment" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="columns">Opis</label>
        <div>
            <input type="text" name="description" class="form-control input-lg" />
        </div>
    </div>
    <br>
    <div class="form-group text-right">
        <input type="submit" name="add" class="btn btn-primary input-lg" value="Dodaj komentarz" />
    </div>
</form>
@endsection