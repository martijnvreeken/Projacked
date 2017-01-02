@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="page-header">Dashboard</h1>
    <div class="row">
        <div class="col-xs-12 col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Klanten</h2></div>
                <div class="panel-body"><a class="btn btn-primary">Ga naar &gt;&gt;</a></div>
            </div>
        </div>
    </div>
    <!-- Modal Trigger -->
    <a class="waves-effect waves-light btn" href="#modal1">Modal</a>

    <!-- Modal Structure -->
    <div id="modal1" class="modal">
      <div class="modal-content">
        <h4>Modal Header</h4>
        <p>A bunch of text</p>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
      </div>
    </div>
    <clients></clients>
</div>
@endsection