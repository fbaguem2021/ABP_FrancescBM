@if (Session::has('error'))
<div class="alert alert-dismissible alert-danger">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    {{ Session::get('error') }}
</div>
{{Session::forget('error')}}
@endif

@if (Session::has('mensaje'))
<div class="alert alert-dismissible alert-success">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    {{ Session::get('mensaje') }}
</div>
{{ Session::forget('mensaje') }}
@endif