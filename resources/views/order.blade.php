<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>
        .container {
            margin-top: 100px
        }

    </style>

</head>
<body>
<div class="container">

    @if (session()->has('flash_notification.message'))
        <div class="alert alert-{{ session('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            {!! session('flash_notification.message') !!}
        </div>
    @endif
    <form action="/orders" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="form-group">
                    <label>Choose which boxes you would like</label>
                    <br/>
                    <select class="form-control" name="boxes">
                        <option value="0" selected>I don't mind which box...</option>
                        @foreach($boxes as $box)
                            <option value="{{$box->id}}">{{ $box->description }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="form-group">
                    <label>First name</label>
                    <input type="text" class="form-control" name="first_name">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="form-group">
                    <label>Surname</label>
                    <input type="text" class="form-control" name="surname">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="city">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="form-group">
                    <label>Postcode</label>
                    <input type="text" class="form-control" name="postcode">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Send order">
                </div>
            </div>
        </div>
    </form>
</div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</html>
@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
