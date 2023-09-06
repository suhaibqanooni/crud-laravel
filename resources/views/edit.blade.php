<!DOCTYPE html>
<html>
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet"/>
</head>
<body>
    <div class="container">
        <header>
            <h1>Users Creation</h1>
        </header>
        <main>
            <div class="container">
                <div class="table-responsive">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                <form role="form" method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <fieldset>
                        <legend>User Information</legend>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="firstname" value="{{ old('first_name', $user->first_name) }}" placeholder="First Name" required aria-label="First Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="last_name" value="{{ old('last_name', $user->last_name) }}" placeholder="Last Name" required aria-label="Last Name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" value="{{ old('email', $user->email) }}" name="email" placeholder="Email" required aria-label="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Password" required aria-label="Password">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="form-control" value="{{ old('phone_number', $user->phone_number) }}" id="phone" placeholder="Phone Number" name="phone_number" required aria-label="Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="photo">Profile Photo</label>
                                <input type="file" class="form-control-file" id="photo" name="image" alt="Upload Profile Photo" aria-label="Profile Photo">
                        
                                
                            </div>

                            <div class="col-md-6">
                                <img class="mr-3" alt="image" src="{{asset('upload/'.$user->image)}}" height="100px"/>
                            </div>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>