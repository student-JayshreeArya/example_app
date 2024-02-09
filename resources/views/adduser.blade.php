<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>Add New User</h1>
                {{-- @if ($errors->all())
                    <ul class="alert alert-danger">        if someone has not fill any of these fills then an alert will show that these fields are reuired to fill same with specific ones also
                        @foreach ($errors->all() as $error)     to show all alert messages at a time so that whether a user passes every detail acoording to tha passes user inplut value
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif --}}  
                <form action="{{ route('addUser') }}" method="POST">
                    @csrf   
                    {{-- csrf -> passes a specific token number to every user --}}
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="username">
                        <span class="text-danger">
                            @error('username')     
                            {{-- to show alert message specifically--}}
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="useremail">
                        <span class="text-danger">
                            @error('username')     
                            {{-- to show alert message specifically so that user can not write anything other than email or using special chars, have to mentio coreect email pattern--}}
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Age</label>
                        <input type="number" class="form-control" name="userage">
                        <span class="text-danger">
                            @error('userage')     
                                {{-- alert message will show that user have to mention a number only --}}
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <select type="text" class="form-control" name="usercity">
                            <option value="delhi">Delhi</option>
                            <option value="gwalior">Gwalio</option>
                            <option value="pune">Pune</option>
                            <option value="indore">Indore</option>
                            <option value="jhansi">Jhansi</option>
                            <option value="bhopal">Bhopal</option>
                            <option value="jaipur">Jaipur</option>
                            <option value="banaras">Banaras</option>
                            <option value="chennai">Chennai</option>
                            <option value="bangalore">Bangalore</option>
                        </select>
                        <span class="text-danger">
                            @error('usercity')     
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>