<table class="table table-bordered" id="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach
        @foreach ($project as $pj)
            <tr>
                <td>{{ $pj->name }}</td>
                <td>{{ $pj->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
