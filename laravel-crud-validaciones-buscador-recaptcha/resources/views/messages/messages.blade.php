@if(Session::has('created'))
<div class="alert alert-success text-center">
  <strong>Success!</strong> {{ Session::get('created') }}
</div>
@endif

@if(Session::has('updated'))
<div class="alert alert-info text-center">
  <strong>Success!</strong> {{ Session::get('updated') }}
</div>
@endif

@if(Session::has('removed'))
<div class="alert alert-danger text-center">
  <strong>Success!</strong> {{ Session::get('removed') }}
</div>
@endif
