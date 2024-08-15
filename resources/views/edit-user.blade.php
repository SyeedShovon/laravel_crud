<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Add New User
            </div>
            @if(Session::has('fail'))
                <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
            @endif
            <div class="card-body">
                <form action="{{ route('EditUser')}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$user->id}}" name="user_id">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full name</label>
                        <input type="text" name="full_name" class="form-control" id="full_name" value="{{$user->name}}" placeholder="Enter Full name">
                        @error('full_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}" placeholder="Enter Email">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Phone number</label>
                        <input type="number" name="number" class="form-control" id="number" value="{{$user->number}}" placeholder="Enter Phone number">
                        @error('number')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>