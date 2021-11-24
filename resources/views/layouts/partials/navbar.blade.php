<header class="p-3 bg-dark text-white">
    <div class="row">
        <div class="d-flex align-items-center justify-content-center" style="width:100%;">
            <div class="col-md-6">
                <ul class="nav row me-lg-auto mb-2 mb-md-0">
                    <div class="col-md-2">
                        <li><a href="{{ route('home.index') }}" class="nav-link px-2 text-secondary">HOME</a></li>
                    </div>
                    <div class="col-md-2">
                        <li><a href="{{ route('users.index') }}" class="nav-link px-2 text-white">USERS</a></li>
                    </div>
                    <div class="col-md-2">
                        <li><a href="#" class="nav-link px-2 text-white">PRICING</a></li>
                    </div>
                    <div class="col-md-2">
                        <li><a href="#" class="nav-link px-2 text-white">FAQS</a></li>
                    </div>
                    <div class="col-md-2">
                        <li><a href="#" class="nav-link px-2 text-white">ABOUT</a></li>
                    </div>
                </ul>
            </div>
            <div class="col-md-4">
                <form style="float:right;">
                    <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                </form>
            </div>

            <div class="col-md-2">
                @auth
                    {{auth()->user()->name}}
                    <div class="text-end">
                        <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
                    </div>
                @endauth
            
                @guest
                    <div class="text-end" style="float:right;">
                        <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
                        <a href="{{ route('register.perform') }}" class="btn btn-warning" style="margin-left:10px;">Sign-up</a>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</header>