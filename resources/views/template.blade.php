<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Project Management</title>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css'); }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css'); }}">
    </head>
    <body>
        <div id="container">
            <div id="navigation">
                <div class="blocksNavigation" id="logo"><a href="#"><img src="#"/>logo</a></div>
                <div class="blocksNavigation" id="weather"><a href="#"><img src="#"/>Pogoda</a></div>
                <div class="blocksNavigation" id="title">Management System</div>
                <div class="blocksNavigation"><a href="{{ url('create') }}">Dodaj zadanie</a></div>
                <div class="blocksNavigation"><img src=""/>Avatr uzyt</div>
           </div>

           @yield('taskList')
           @yield('front')
           @yield('addTask')
           @yield('task')
           @yield('editTask')
           @yield('listTasks')
           @yield('addComment')
           @yield('comment')
           @yield('editComment')
           @yield('listComments')

        </div> 
        <script src="{{URL::asset('js/main.js')}}"></script>
    </body>
</html>