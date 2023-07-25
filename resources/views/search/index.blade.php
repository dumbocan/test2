
{{$search}}
<br>
<br>
@foreach($boats as $boat)
{{ $boat->boat_name}}
<br>
{{ $boat->boat_marina}}
<br>
@endforeach
<br>

<br>
@foreach($clients as $client)
{{ $client->client_name}}
<br>
{{ $client->client_email}}
<br>
@endforeach

<br>
@foreach($projects as $project)
{{ $project->project_descriptiondesc}}
<br>
{{ $project->project_comments}}
<br>
@endforeach
