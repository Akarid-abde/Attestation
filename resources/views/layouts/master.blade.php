<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet FS Tetouan</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script>
            $(document).ready(function(){
                $('#G1').click(function(){
                    $("#G11").toggle('slow');
                });
                $('#G2').click(function(){
                    $("#G22").toggle('slow');
                });
                $('#G3').click(function(){
                    $("#G33").toggle('slow');
                });
                $('#G4').click(function(){
                    $("#G44").toggle('slow');
                });
    
                
            });
    </script>
    <style>
        #G11,#G22,#G33,#G44{
            display:none;
        }
        #form{
            display:none;   
        }
    </style>

</head>
<body>

    <!-- Navbar with SideBar -->
    <div class="wrapper d-flex align-items-stretch">
        
        @include('partials.sidbar')
        
        <!-- Page Content  -->
        <div id="content" class="">
            @include('partials.navbar')

            <div class="container">
                @yield('content')
            </div>

        </div>

	</div>

    @include('partials.footer')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>



    
</body>
</html>