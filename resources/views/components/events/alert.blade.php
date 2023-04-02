@if (session()->get('alert'))
    <div class="alert alert-{{ session()->get('alert')['status'] }} alert-dismissible fade show" role="alert">
        {!! session()->get('alert')['pesan'] !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
