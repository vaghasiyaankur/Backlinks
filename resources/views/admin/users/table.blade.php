<table class="table table-bordered" id="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Change password</th>
            <th>Verified</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><a title="verify" href="{{ route('change.password',[$user->id]) }}" class="btn btn-primary">Change Password</a></td>
                <td>
                    @if ($user->verify_status == 0)
                        <a title="verify" href="{{ route('verified',[$user->id]) }}" class="btn btn-danger"> Unverified </a>
                    @else
                        <a title="verify" href="{{ route('verified',[$user->id]) }}" class="btn btn-success"> Verified </a>
                    @endif
                </td>
                <td><a href="{{ route('user.delete',[$user->id]) }}" class="btn"><i class="fa fa-trash text-primary"></i></a></td>
            </tr>
        @empty

        @endforelse
    </tbody>
</table>
