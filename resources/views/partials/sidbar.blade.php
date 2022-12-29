<nav id="sidebar" class="active">
            <h1><a href="#" class="logo">FS.Te</a></h1>
            <ul class="list-unstyled components mb-5">
                <li class="active text-center">
                    <a href="#"><span class="fa fa-menu"></span> Menu</a>
                </li>
                @auth
                <div>
                    <li class="border rounded">
                        <a href="#" id="G1" class="text-center"><span class="fa fa-users"></span>RH</a>
                    </li>
                    <li class="" id="G11">
                        <a href="{{ url('/home') }}"  class="text-center text-black"><span class="fa fa-cogs"></span>بطاقة الترقية الموضفين</a>
                        <a href="#"  class="text-center text-black"><span class="fa fa-cogs"></span>Les retraits</a>
                        <a href="#"  class="text-center text-black"><span class="fa fa-cogs"></span>Attestation Travail</a>
                    </li>
                </div>

                <div>
                    <li>
                        <a href="#" id="G2" class="border  rounded text-center"><span class="fa fa-users"></span> G2</a>
                    </li>
                    <li class="" id="G22">
                        <a href="#"  class="text-center text-black"><span class="fa fa-cogs"></span>Service N1</a>
                        <a href="#"  class="text-center text-black"><span class="fa fa-cogs"></span>Service N1</a>
                        <a href="#"  class="text-center text-black"><span class="fa fa-cogs"></span>Service N1</a>
                    </li>
                </div>
                <div>
                    <li>
                        <a href="#" id="G3" class="border rounded text-center"><span class="fa fa-users"></span> G3</a>
                    </li>
                    <li class="" id="G33">
                        <a href="#"  class="text-center text-black"><span class="fa fa-cogs"></span>Service N1</a>
                        <a href="#"  class="text-center text-black"><span class="fa fa-cogs"></span>Service N1</a>
                        <a href="#"  class="text-center text-black"><span class="fa fa-cogs"></span>Service N1</a>
                    </li>
                </div>

                <div>
                    <li>
                        <a href="#" id="G4" class="border rounded text-center"><span class="fa fa-users"></span> G4</a>
                    </li>
                    <li class="" id="G44">
                        <a href="#"  class="text-center text-black"><span class="fa fa-cogs"></span>Service N1</a>
                        <a href="#"  class="text-center text-black"><span class="fa fa-cogs"></span>Service N1</a>
                        <a href="#"  class="text-center text-black"><span class="fa fa-cogs"></span>Service N1</a>
                    </li>
                </div>

                <li>
                    <a href="#" class="border rounded text-center"><span class="fa fa-paper-plane"></span>Contacts</a>
                </li>
                @endauth
            </ul>
            <div class="footer">
                <p>
                    Copyright &copy;<script>document.write(new Date().getFullYear());
                </script> All rights reserved | Created By<i class="icon-heart" aria-hidden="true"></i> by <a href="Akarid_abde" target="_blank"><i class="fa fa-github"></i></a>
                </p>
            </div>
    	</nav>
