<h2>Nuevo mensaje</h2>
<form action="{{ route('messages.update', $thread->id) }}" method="post">
    {{ method_field('put') }}
    {{ csrf_field() }}
        
    <!-- Message Form Input -->
    <div class="form-group">
        <textarea name="message" class="form-control">{{ old('message') }}</textarea>
    </div>

    @if($users->count() > 0)
        <div class="checkbox">
            @foreach($profesores as $profesor)
                <label title="{{ $profesor->name }}">
                    <input type="checkbox" name="recipients[]" value="{{ $profesor->id }}" checked onclick="return false;">Prof. {{ $profesor->name }} {{ $profesor->primer_apellido }}
                </label>
            @endforeach
            @foreach($users as $user)
                <label title="{{ $user->name }}">
                    <input type="checkbox" name="recipients[]" value="{{ $user->id }}" checked>{{ $user->name }} {{ $user->primer_apellido }}
                </label>
            @endforeach
        </div>
    @endif

    <!-- Submit Form Input -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary form-control">Enviar</button>
    </div>
</form>