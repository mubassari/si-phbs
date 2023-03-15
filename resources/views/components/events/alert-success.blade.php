@if (session()->get('alert-success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Sukes!</h5>
    {{ session()->get('alert-success') }}
</div>
@endif