<table class="table table-bordered" id="table">
    <thead>
        <tr>
            <th>
                #
            </th>
            <th>
                URL
            </th>
            <th>
                Ancre
            </th>
            <th class="url_spot">
                Url Spot
            </th>
            <th>
                Prestataire
            </th>
            <th>
                Price
            </th>
            <th>
                Edit
            </th>
            {{-- <th>
            save
            </th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach($projectdata as $index => $pd)
        <tr class="project_data">
            <td class="id">{{$pd->id}}</td>
            <td>
                {{$pd->url}}
            </td>
            <td>
            {{$pd->ancre}}
            </td>
            <td class="url_spot spot_{{$index}}"></td>
            <td>
                {{$pd->prestataire}}
            </td>
            <td>
                {{$pd->price}}
            </td>
            <td>
                <a class="btn btn-primary" href="{{ route('admin.edit.data', [$id, $month,$pd->id])}}">Edit</a>
                <a class="btn btn-danger" href="{{ route('admin.delete.data', [$id, $month,$pd->id])}}">Delete</a>
                <a class="btn btn-primary" href="{{ route('admin.show.data', [$id, $month,$pd->id])}}">View</a>
                <a class="btn btn-primary validate_row" data-href="{{ route('admin.show.validate', [$id, $month,$pd->id])}}">Ok</a>
            </td>
            {{-- <a class="btn btn-primary" href="{{ route('admin.project.show', [$pl->id])}}">Show</a> --}}
            {{-- <td>
                <a class="btn btn-success" href="#">save</a> --}}
                {{-- <a class="btn btn-primary" href="{{ route('admin.project.show', [$pl->id])}}">Show</a> --}}
                {{-- </td> --}}
        </tr>
        @endforeach

    </tbody>
</table>
