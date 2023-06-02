<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIgn In</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords"
        content="Online Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
    <script type="application/x-javascript">
       addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
      function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <!-- Meta tag Keywords -->
    <!-- css files -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('administrator/dist/css/stylelogin2.css') }}">
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //css files -->
    <!-- online-fonts -->
    <link
        href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet" />
    <link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext"
        rel="stylesheet" />
    <!-- //online-fonts -->
</head>

<body>
    <!-- main -->
    <div class="center-container">
        <!--header-->
        
        <!--//header-->
        <div class="main-content-agile">
            <div class="sub-main-w3">
                <div class="wthree-pro">
                    <h2>Login Quick</h2>
                </div>
                <form class="login-form" action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="pom-agile">
                        <input type="email" name="email" class="user" placeholder="email" required
                            value="{{ old('email') }}" />
                    </div>
                    <div class="pom-agile">
                        <input type="password" name="password" class="pass" required placeholder="password" />
                    </div>

                    <div class="sub-w3l">
                        <div class="right-w3l">
                            <input type="submit" value="Login"/>
                            @if (Session::has('error'))
                                <p style="color:aliceblue" class="alert alert-danger">{{ Session::get('error') }}</p>
                            @endif
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <!--//main-->
        <!--footer-->
      
        <!--//footer-->
    </div>
</body>

</html>
