@extends('layouts.admin2')

@section('content')
<div id="app">
    <router-view name="getstarted"></router-view>
    <router-view></router-view>

</div>
@endsection