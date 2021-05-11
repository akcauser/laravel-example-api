@if(session()->has('error'))
<div class="alert alert-danger">
    {{ session()->get('error') }}
</div>
@endif

@if(session()->has('Success'))
<div class="alert alert-success">
    {{ session()->get('Success') }}
</div>
@endif

@if(count($errors) > 0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    * {{ $error }} <br>
    @endforeach
</div>
@endif