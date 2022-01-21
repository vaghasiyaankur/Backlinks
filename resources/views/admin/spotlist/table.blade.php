<table class="table table-bordered" id="table">
    <thead>
      <tr>
        <th>
          #
        </th>
        <th>
          Spot
        </th>
        <th>
          Prix
        </th>
        <th>
          Ref Domain
        </th>
        <th>
          Trust Flow
        </th>
        <th>
          Citation Flow
        </th>
        <th>
          Majestic Flow
        </th>
        <th>
          Keywords
        </th>
        <th>
          Trafic
        </th>
        <th>
          Gnews
        </th>
        <th>
          Thematic
        </th>
        <th>
          Provider
        </th>
        <th>
          Profile_facebook
        </th>
        <th>
          Action
        </th>

      </tr>
    </thead>
    <tbody>

      @foreach($spotlist as $sl)
      <tr>
        <td>
          {{$sl->id}}
        </td>
        <td>
          {{$sl->spot}}
          @php
            $url = explode('://',$sl->spot);
            if (($url[0] == 'http') || ($url[0] == 'https')) {
                $spot = preg_replace("#^[^:/.]*[:/]+#i", "", $sl->spot);
            }else{
                $spot = preg_replace('/^www\./', '', $sl->spot);
            }
          @endphp
          <a href="{{ 'https://fr.semrush.com/analytics/overview/?searchType=domain&q='.$sl->spot}}" target="_blank"><img class="spotimg" src="{{asset('semrush.ico')}}"/></a>
          <a href="{{ 'https://app.seobserver.com/sites/view/'.$spot}}" target="_blank"><img class="spotimg" src="{{asset('seobserver.ico')}}"/></a>

        </td>
        <td>
          {{$sl->prix}}
        </td>
        <td>
          {{$sl->ref_domain}}
        </td>
        <td>
          {{$sl->trust_flow}}
        </td>
        <td>
          {{$sl->citation_flow}}
        </td>
        <td>
          {{$sl->majestic_flow}}
        </td>
        <td>
          {{$sl->keywords}}
        </td>
        <td>
          {{$sl->trafic}}
        </td>
        <td>
          {{$sl->gnews}}
        </td>
        <td>
         {{$sl->thematic}}
        </td>
        <td>
          {{$sl->provider}}
        </td>
        <td>
          <a href="{{$sl->profile_facebook}}" target="_blank" style="color:#000; text-decoration:none; "> <i class="fa fa-link"></i></a>

        </td>
        <td>
          <a class="btn btn-primary" href="{{ route('admin.list.edit', $sl->id)}}">Edit</a>
          <a class="btn btn-danger" href="{{ route('admin.list.delete', $sl->id)}}">Delete</a>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>
