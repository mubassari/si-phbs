<div class="container">
    <div class="row">
        <div class="col-md-3">
            @php
                $user_data = $user ?? auth()->user();
            @endphp
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center">{{ $user_data->nama }} {!! $user_data->icon_status_verifikasi !!}</h3>
                    <p class="text-muted text-center">{{ $user_data->is_admin ? 'Admin' : 'User' }}</p>
                    @if (!$user_data->status_verifikasi)
                        <div class="alert alert-warning text-center">User belum diverifikasi oleh admin</div>
                    @endif
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>No Telpon</b> <a class="float-right">{{ $user_data->telpon }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>ALamat</b> <a class="float-right">{{ $user_data->alamat }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">{{ $slot }}</div>
    </div>
</div>
