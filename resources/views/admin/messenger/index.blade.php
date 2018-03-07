@extends('index')

@section('content')
    @include('admin.messenger.partials.flash')

    @each('admin.messenger.partials.thread', $threads, 'thread', 'admin.messenger.partials.no-threads')

    <a href="{{URL::to('/') }}/admin/messages/create/{{ $id }}"><i class="fa fa-envelope"> Abrir nueva conversación</i>
@stop
