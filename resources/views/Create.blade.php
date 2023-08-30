<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>User Form</h2>
        <form action="{{ route('user.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                @if ($errors->has('name'))
                    <span class="invalid feedback" style='color: red'
                        role="alert">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                @if ($errors->has('email'))
                    <span class="invalid feedback" style='color: red'
                        role="alert">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                @if ($errors->has('password'))
                    <span class="invalid feedback" style='color: red'
                        role="alert">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number:</label>
                <input type="text" class="form-control" id="contact_number" placeholder="Enter Contact Number" name="contact_no">
                @if ($errors->has('contact_number'))
                    <span class="invalid feedback" style='color: red'
                        role="alert">{{ $errors->first('contact_number') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" name="address"></textarea>
                @if ($errors->has('address'))
                    <span class="invalid feedback" style='color: red'
                        role="alert">{{ $errors->first('address') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="fiel">Files:</label>
                <input type="file" class="form-control" name="files[]" multiple>
                @if ($errors->has('files'))
                    <span class="invalid feedback" style='color: red'
                        role="alert">{{ $errors->first('files') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select name="role" class="form-control">
                    <option value=" ">Please Select Role</option>
                    <option value="suppliers">Suppliers</option>
                    <option value="resellers">Resellers</option>
                </select>
                @if ($errors->has('role'))
                    <span class="invalid feedback" style='color: red'
                        role="alert">{{ $errors->first('role') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

</body>

</html>
