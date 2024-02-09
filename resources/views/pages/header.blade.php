<!DOCTYPE html>
<html lang="en">
<head>
    @stack('title')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<h1>Header Page</h1>

{{-- @foreach ($name as $key => $n)
<p>{{$key}} is the value of {{$n}}</p>
@endforeach --}}

{{-- if we want check if the condition whether our array is empty or not --}}
@forelse ($name as $key => $n)
<p>{{$key}} is the value of {{$n}}</p>
@empty
<p>No value found</p>    
@endforelse


{{-- <p>{{$name}}</p> --}}