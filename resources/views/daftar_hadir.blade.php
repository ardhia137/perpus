<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <title>Document</title>
</head>

<body>
    <h1>ini halaman daftar hadir</h1>
    @if ($message = Session::get('sukses'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('gagal'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('peringatan'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <form action="/action_dh" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="NIP">Nip:</label>
            <input type="number" class="form-control" id="number" placeholder="Masukan NIP" name="nip">
        </div>
        @if($errors->has('nip'))
        <div class="text-danger">
            {{ $errors->first('nip')}}
        </div>
        @endif
        <input type="submit" value="masuk" id="masuk">
    </form>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>
