<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('Front/css/style.css') }}">

    <title>
        @yield('page_title')
    </title>
</head>

<body>
    
   

    <main>
        @yield('content')
    </main>


    <!-- Sign Up Modal -->
    <div style="background-color: rgba(0, 0, 0, 0.473);" class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " style="position: absolute; top: 40%; left: 50%; transform: translate(-50% , -50%); width: 50%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-size: 25px;" class="modal-title" id="exampleModalLabel">هل أنت؟</h5>
                </div>
                <div class="modal-body">
                    <div class="row text-center">

                        <div class="col-4">
                            <div style="width: 90%; margin: 0 auto;" class="image">
                                <img style="width: 100%;" src="{{ asset('Front/img/1074556.png') }}" alt="">
                            </div> <br>

                            <button style="background-color: transparent; border: solid 1px #24c2a0; padding: 0 10px; ">
                                <a href="sign.html" style="text-decoration: none; color: black; font-size: x-large;">
                                    بائع
                                </a>
                            </button>
                        </div>

                        <div class="col-4 ">
                            <div style="width: 90%; margin: 0 auto;" class="image">
                                <img style="width: 100%;" src="{{ asset('Front/img/1224503.png') }}" alt="">
                            </div> <br>
                            <button style="background-color: transparent; border: solid 1px #24c2a0; padding: 0 10px; ">
                                <a href="sign.html" style="text-decoration: none; color: black; font-size: x-large;">
                                    مشتري
                                </a>
                            </button>
                        </div>

                        <div class="col-4">
                            <div style="width: 90%; margin: 0 auto;" class="image">
                                <img style="width: 100%;" src="{{ asset('Front/img/1254735.png') }}" alt="">
                            </div> <br>
                            <button style="background-color: transparent; border: solid 1px #24c2a0; padding: 0 10px; ">
                                <a style="text-decoration: none; color: black; font-size: x-large;" href="sign.html">
                                    ديليفري
                                </a>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Login -->
    <div style="background-color: rgba(0, 0, 0, 0.473);" class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " style="position: absolute; top: 40%; left: 50%; transform: translate(-50% , -50%); width: 50%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-size: 25px;" class="modal-title" id="exampleModalLabel">هل أنت؟</h5>
                </div>
                <div class="modal-body">

                        <div class="row text-center">

                            <div class="col-4">
                                <div style="width: 90%; margin: 0 auto;" class="image">
                                    <img style="width: 100%;" src="{{ asset('Front/img/1074556.png') }}" alt="">
                                </div> <br>

                                <button style="background-color: transparent; border: solid 1px #24c2a0; padding: 0 10px; ">
                                    <a href="{{ route('login.select', 'user') }}" style="text-decoration: none; color: black; font-size: x-large;">
                                        بائع
                                    </a>
                                </button>
                            </div>

                            <div class="col-4 ">
                                <div style="width: 90%; margin: 0 auto;" class="image">
                                    <img style="width: 100%;" src="{{ asset('Front/img/1224503.png') }}" alt="">
                                </div>
                                <br>
                                <button style="background-color: transparent; border: solid 1px #24c2a0; padding: 0 10px; ">
                                    <a href="{{ route('login.select', 'customer') }}" style="text-decoration: none; color: black; font-size: x-large;">
                                        مشتري
                                    </a>
                                </button>
                            </div>

                            <div class="col-4">
                                <div style="width: 90%; margin: 0 auto;" class="image">
                                    <img style="width: 100%;" src="{{ asset('Front/img/1254735.png') }}" alt="">
                                </div> <br>
                                <button style="background-color: transparent; border: solid 1px #24c2a0; padding: 0 10px; ">
                                    <a  href="{{ route('login.select', 'delivery') }}" style="text-decoration: none; color: black; font-size: x-large;">
                                        ديليفري
                                    </a>
                                </button>
                            </div>

                        </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js" integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg==" crossorigin="anonymous"></script>
    <script src="{{ asset('Front/js/main.js') }}">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>