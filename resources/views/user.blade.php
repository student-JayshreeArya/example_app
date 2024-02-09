<h1>Users Page</h1>

{{-- <h2> Hello {{$user}}</h2>

<h2>City : {{!empty($city) ? $city : 'No City'}}</h2> --}}

@foreach ($user as $id => $u)
    <h3>{{$id}} | {{ $u['name'] }} | {{ $u['phone'] }} | {{ $u['city']}}
    <a href="{{ route('view.user', $id)}}">Show</a>
    </h3>
@endforeach