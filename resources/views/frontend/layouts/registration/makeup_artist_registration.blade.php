<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Icons font CSS-->
    <link href="https://colorlib.com/etc/regform/colorlib-regform-4/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="https://colorlib.com/etc/regform/colorlib-regform-4/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="https://colorlib.com/etc/regform/colorlib-regform-4/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="https://colorlib.com/etc/regform/colorlib-regform-4/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="https://colorlib.com/etc/regform/colorlib-regform-4/css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">

        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <h2 class="title">Sign up</h2>
                    <!-- Form -->
                    <form action="{{route('create_artist')}}" method="post" enctype="multipart/form-data">
                        @csrf
                       
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Name</label>
                                    <input class="input--style-4" type="text" name="name" id="name">
                                </div>
                            </div>
                            <div class=" col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" id="email">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone</label>
                                    <input class="input--style-4" type="tel" name="phone" id="phone">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Address</label>
                                    <input class="input--style-4" type="text" name="address" id="address">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Password</label>
                            <input class="input--style-4" type="password" name="password" id="password">
                        </div>

                        <div class="input-group custom-file">
                            <label class="label custom-file-label">Profile Picture</label>
                            <input class="input--style-4 custom-file-input" type="file" name="image" id="image">
                        </div>
                        <div class="input-group custom-file">
                            <label class="label custom-file-label">Professional Document</label>
                            <input class="input--style-4 custom-file-input" type="file" name="doc" id="doc">
                        </div>

                        <div class="p-t-15 text-center">
                            <button class="btn btn--radius-2 btn--blue m-3"type="submit">Submit</button>
                            <p>Already have an account? <a href="{{route('makeup_artist_login')}}">Sign in</a></p>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="https://colorlib.com/etc/regform/colorlib-regform-4/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="https://colorlib.com/etc/regform/colorlib-regform-4/vendor/select2/select2.min.js"></script>
    <script src="https://colorlib.com/etc/regform/colorlib-regform-4/vendor/datepicker/moment.min.js"></script>
    <script src="https://colorlib.com/etc/regform/colorlib-regform-4/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="https://colorlib.com/etc/regform/colorlib-regform-4/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->