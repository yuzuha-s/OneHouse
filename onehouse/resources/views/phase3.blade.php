@extends('layout.nav')

@section('ttitle', 'phase3')

@section('content')

@endsection

@section('aside')

    <div class="marker-edit wrapper">
        <div class="list">

            <div id="chart-app"></div>
            <script>
                window.profileId = {{ auth()->user()->profile->id ?? '' }}
            </script>

            @vite('resources/js/app.js')

        </div>
    </div>
@endsection
