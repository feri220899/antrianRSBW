<!doctype html>
<html lang="en">

<head>
    <title>Halaman -> @yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <meta http-equiv="refresh" content="10"> --}}

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<style>
    .pricing-card-title {
        font-size: 150px;
        font-weight: 600;
    }

    .display-3 {
        font-size: 80px;
        font-weight: 500;
    }
    a:link, a:visited {
        color: rgb(0, 0, 0);
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }
    a:hover {
        color: rgb(0, 30, 255);
    }
</style>

<body>
    <div class="container-fluid">
        @yield('konten')
    </div>



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.3.1.slim.min.js">
        </script>
        <script src="js/popper.min.js">
        </script>
        <script src="js/bootstrap.min.js">
        </script>

</body>

</html>
