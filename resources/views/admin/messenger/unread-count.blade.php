<?php $count = Auth::user()->newThreadsCount(); ?>
@if($count > 0)
    {{ $count }}
@endif
