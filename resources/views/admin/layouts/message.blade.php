@if(!empty(session('success')))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(!empty(session('error')))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@if(!empty(session('payment-error')))
<div class="alert alert-error">
    {{ session('error') }}
</div>
@endif

@if(!empty(session('warning')))
<div class="alert alert-warning">
    {{ session('error') }}
</div>
@endif

@if(!empty(session('info')))
<div class="alert alert-info">
    {{ session('error') }}
</div>
@endif

@if(!empty(session('secondary')))
<div class="alert alert-secondary">
    {{ session('error') }}
</div>
@endif

@if(!empty(session('primary')))
<div class="alert alert-primary">
    {{ session('error') }}
</div>
@endif

@if(!empty(session('light')))
<div class="alert alert-light">
    {{ session('error') }}
</div>
@endif


