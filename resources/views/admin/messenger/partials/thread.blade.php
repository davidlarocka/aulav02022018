<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<h4>Mensajes</h4>

<div class="media alert {{ $class }}">
    <h4 class="media-heading">
        <a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
        ({{ $thread->userUnreadMessagesCount(Auth::id()) }} sin leer)</h4>
    <p>
        {{ $thread->latestMessage->body }}
    </p>
    <p>
        <small><strong>Creado por:</strong> {{ $thread->creator()->name }} {{ $thread->creator()->primer_apellido }}</small>
    </p>
    <p>
        <small><strong>Participantes:</strong> {{ $thread->participantsString(Auth::id()) }}</small>
    </p>
</div>

