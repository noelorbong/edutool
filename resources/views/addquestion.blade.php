@extends('layouts.admin2')

@section('content')
<div id="app">
    <router-view name="AddQuestion"></router-view>
    <router-view></router-view>

</div>
@endsection