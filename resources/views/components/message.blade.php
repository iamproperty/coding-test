@if(session('sessionStatus'))
    <div class="alert @if(session('sessionStatus') == 'error') alert-danger @else alert-success @endif" role="alert">
        {{ session('statusMessage') }}
    </div>
@endif
