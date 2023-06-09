<nav id="sidebar" class="active">
            <div class="d-flex justify-content-center"><a href="#" class="logo">
                <img width="70px" height="70px"   src="{{ asset('images/MoonSystem.ico') }}" alt="">
            </a></div>
            <ul class="list-unstyled components mb-5">
                <li class="active text-center">
                    <a href="#"><span class="fa fa-menu"></span> Menu</a>
                </li>
                @auth
                <div>
                    
                    <li class="">
                        <a href="{{ url('/home')}}"  class="text-center text-black"><span class="fa fa-home"></span>Home</a>
                    </li>
                </div>
                <div>
                    <li class="border rounded">
                        <a href="#" id="G1" class="text-center"><span class="fa fa-users"></span>STAGE</a>
                    </li>
                    <li class="" id="G11">
                        <a href="{{ url('/Atravail')}}"  class="text-center text-black"><span class="fa fa-cogs"></span>Attestation de stage</a>
                    </li>
                </div>
                @if (Route::has('register') and Auth::user()->TYPEUSER == 'ADMIN')
                <div>
                    <li>
                        <a href="#" id="G2" class="border  rounded text-center"><span class="fa fa-briefcase"></span> TRAVAIL </a>
                    </li>
                    
                    <li class="" id="G22">
                        <a href="{{ url('/JobAttestation')}}"  class="text-center text-black"><span class="fa fa-cogs"></span>Attestation de Travail</a>
                    </li>
                </div>
                @endif
                @endauth
            </ul>
            <div class="footer">
                <p>
                    Copyright &copy;<script>document.write(new Date().getFullYear());
                </script> All rights reserved | Created By <i class="icon-heart" aria-hidden="true"></i> by <a href="Akarid_abde" target="_blank"><i class="fa fa-github"></i></a>
                </p>
            </div>
    	</nav>
