@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@else
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif