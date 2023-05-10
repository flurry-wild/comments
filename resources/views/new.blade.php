@extends('layouts.app')

@section('content')
    <style>
        body {
            background: #66CD7E;
        }
    </style>
    <script>
        window.userName = '{{ $userName }}';
        window.newId = '{{ $new->id }}';
        window.titleNew = '{{ $new->title }}';
        window.textNew = '{{ $new->text }}';
    </script>
    <div class="row d-flex justify-content-center m-5">
        <div class="col-md-12">
            <div id="app"></div>
        </div>
    </div>

@endsection
