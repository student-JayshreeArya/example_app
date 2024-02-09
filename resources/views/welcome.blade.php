<h1>My name is Jayshree Arya</h1>

{{-- <a href="/post">Hello</a>
<a href="{{ route('happy')}}">About</a> --}}

{{6 + 9}}

<br><br>

{{"Jayshree Arya"}}

<br><br>

{{"<h1>Jaysree Arya</h1>"}}

<br><br>

{!!"<h1>Jaysree Arya</h1>"!!}

{{-- {!!"<script> alert('are you in') </script>"!!} --}}

@php
    $names = ["Salman Khan", "Shahrukh Khan", "Shahid Kapoor", "Salman Khan", "Shahrukh Khan", "Shahid Kapoor"
];
    $user = "Jayshree Arya";
@endphp

<ul>
    @foreach ($names as $n)
    @if ($loop->even)
        <li style="color: red">{{$n }}</li>
        @else
        <li>
            {{$n }}
        </li>
    @endif
       
    @endforeach
</ul>

<ul>
    @foreach ($names as $n)
    @if ($loop->first)
        <li style="color: green">{{$n }}</li>
        @else
        <li>
            {{$n }}
        </li>
    @endif
       
    @endforeach
</ul>

<h1>
    Welcome to Sagar Paradise, {{$name = "sagar"}}
</h1>
@if ($name == "")
    {{"Name is empty"}}
    @elseif ($name == "para")
    {{"Name is correct"}}
    @else
    {{"Name is incorrect"}}
@endif


<h1>
    @isset($name)
    welcome {{"$name"}}
    @endisset
</h1>
    

@{{$user}}

<ul>
    @foreach ($names as $n)
    @if ($loop->last)
        <li style="color: green">{{$n }}</li>
        @else
        <li>
            {{$n }}
        </li>
    @endif
       
    @endforeach
</ul>



@@if()

<div class="container">
    @for ($i = 1; $i < 10; $i++)
        {{"The number value is: $i"}} <br>
    @endfor

    <br>

    @for ($o = 1; $o < 10; $o++)
        @if ($o == 5)
            @continue
        @endif 
        {{$o}}
    @endfor
</div>


@php
    $arr = [5,48,2,28,20,20,73,7,8]
@endphp
@foreach ($arr as $a)
    {{$a}}
@endforeach


