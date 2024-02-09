<h1>All Citizens Data</h1>
@foreach ($citizens as $data)
    <h3>{{ $data->id }} |
        {{ $data->name }} |
        {{ $data->email }} |
        {{ $data->city_name }} |</h3>
@endforeach