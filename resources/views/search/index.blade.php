
{{$search}}
<br>
<br>
@foreach($boats as $boat)
{{ $boat->boat_name}}
{{ $boat->boat_marina}}
<br>
@endforeach
<br>

<br>
@foreach($clients as $client)
{{ $client->client_name}}
{{ $client-client_email}}
<br>
@endforeach
