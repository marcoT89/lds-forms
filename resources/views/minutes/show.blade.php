@extends('layouts.app')

@section('content')
    <div class="container">
        <minute-view :minute="{{ $minute }}"></minute-view>
    </div>
@endsection
