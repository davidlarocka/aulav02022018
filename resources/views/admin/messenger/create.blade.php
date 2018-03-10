@extends('index')

@section('content')
    <h3>Crear conversación</h3>
    <form action="{{ route('messages.store') }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-6">
            <!-- Subject Form Input -->
            <div class="form-group">
                <label class="control-label">Asunto</label>
                <input type="text" class="form-control" name="subject" placeholder="Asunto"
                       value="{{ old('subject') }}">
            </div>

            <!-- Message Form Input -->
            <div class="form-group">
                <label class="control-label">Mensaje</label>
                <textarea name="message" class="form-control">{{ old('message') }}</textarea>
            </div>
            <input type="hidden" class="form-control" name="id_proyecto" value="{{ $id }}">
            @if($users->count() > 0)
                <div class="checkbox">
                    @foreach($profesores as $profesor)
                        <label title="{{ $profesor->name }} {!!$profesor->primer_apellido!!}">
                        <input type="checkbox" name="recipients[]" value="{{ $profesor->id }}" checked onclick="return false;">Prof. {!!$profesor->name!!} {!!$profesor->primer_apellido!!}</label>
                    @endforeach
                    @foreach($users as $user)
                        <label title="{{ $user->name }} {!!$user->primer_apellido!!}">
                        <input type="checkbox" name="recipients[]" value="{{ $user->id }}" checked>{!!$user->name!!} {!!$user->primer_apellido!!}</label>
                    @endforeach
                </div>
            @endif
    
            <!-- Submit Form Input -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Enviar</button>
            </div>
        </div>
    </form>
@stop