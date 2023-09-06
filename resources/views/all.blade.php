<!DOCTYPE html>
<html>
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet"/>
</head>
<body>
    <div class="container">
        <header>
            <h1>Users List</h1>
        </header>
        <main>
            <div class="table-responsive">
                <a href="{{ route('users.create') }}" class="btn btn-success mb-4">Create User</a>
                <table class="table table-bordered table-sm table-striped m-10px">
                    <thead>
                        <tr>

                            <th scope="col" id="col1">image</th>
                            <th scope="col" id="col1">ID</th>
                            <th scope="col" id="col2">First Name</th>
                            <th scope="col" id="col3">Last Name</th>
                            <th scope="col" id="col4">Email</th>
                            <th scope="col" id="col4">Phone</th>
                            <th scope="col" id="col4">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th>
                                <img src="/upload/{{ $user->image }}" width="50px">
                            </th>
                            <th scope="row">{{ $user->id }}</th>
                            <td headers="col1">{{ $user->first_name }}</td>
                            <td headers="col2">{{ $user->last_name }}</td>
                            <td headers="col3 col4">{{ $user->email }}</td>
                            <td headers="col3 col4">{{ $user->phone_number }}</td>
                            <td style="display:flex;">
                                <a href="{{ route("users.edit", $user->id) }}" class="btn btn-info">Edit </a> 
                                <form action="{{ route('users.destroy',$user->id) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>