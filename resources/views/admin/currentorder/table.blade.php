<table class="table table-bordered" id="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>URL</th>
            <th>Ancre</th>
            <th class="url_spot">Url Spot</th>
            <th>Prestataire</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach($project_data as $key => $val)
        @foreach($val as $data)
        <tr>
            @if($loop->first)<th>{{ $key }}</th>@else <th></th> @endif
                <td>
                    {{ $data->url }}
                </td>
                <td>
                    {{ $data->ancre }}
                </td>
                <td>
                    {{ $data->url_spot }}
                </td>
                <td>
                    {{ $data->prestataire }}
                </td>
                <td>
                    {{ $data->price }}
                </td>
            </tr>
                @endforeach
        @endforeach

        </tr>
    </tbody>
</table>
