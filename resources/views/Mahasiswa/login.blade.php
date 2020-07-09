<!DOCTYPE html>
<html lang="en">

<head>
    <!-- import header-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Login Mahasiswa</title>

    <!-- CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/costum.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <!-- isi content  disini-->
            <div class="content-login">
                <div class="card text-white bg-dark mb-3" style="width: 400px;">
                    <div class="card-header title-login">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body bg-light text-dark">
                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <form action="{{URL::to('/mahasiswa/valid')}}" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                            </div>
                            <div class="form-group pb-md-4">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-dark" style="width: 100%;">Login</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- import javascript -->
    <script src="/js/jquery-3.5.1.slim.min.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.bundle.js"></script>

</body>

</html>