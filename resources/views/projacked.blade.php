@extends('layouts.app')
@section('content')
<keep-alive>
    <router-view></router-view>
</keep-alive>
<div id="mount-point"></div>
@endsection