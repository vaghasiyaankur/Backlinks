<table class="table table-bordered" id="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $key => $user)
            @foreach ($user as $val)
                <tr data-user="{{$key}}">
                    <td>{{ $val['name']}}</td>
                    <td>{{ $val['email'] }}</td>
                    <td>
                        <a href="{{ route('user.edit',[$val['id'],$key]) }}" class="btn btn-primary">Edit</a>
                        @if (!($key == 'project'))
                            <a href="{{ route('change.password',[$val['id'],$key]) }}" class="btn btn-success">Change Password</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
