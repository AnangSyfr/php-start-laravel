@extends('layouts.app')

@section('content')
    <div class="container-fluid my-3">
        <div class="card p-3">
            <h2 class="text-black-20">You are logged in! </h2>
            <h5>Access Level : {{ $level }}</h5>
        </div>

        <div class="card p-3">
            <div class="card-title">All Users</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('json_users') }}",
        columns: [
            { render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }
            },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
        ]
    });
});
</script>
@endpush
