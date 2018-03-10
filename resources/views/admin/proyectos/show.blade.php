@extends('template_n.main')

@section('title', 'Proyecto')

@section('content')

<div class="title"><h3 class="title" class="">Proyecto de {{ ucfirst($proyecto[0]->nombre_proyecto) }}</h3></div>

<div class="container">
  @include('flash::message')
</div>

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <iframe width="100%" height="350" src="" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
</div>

@endsection