@if (session('success'))

    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>

@endif
@if (session('error'))

    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>

@endif
