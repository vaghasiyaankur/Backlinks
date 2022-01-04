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
      </tr>
      @endforeach
     
    </tbody>
  </table>