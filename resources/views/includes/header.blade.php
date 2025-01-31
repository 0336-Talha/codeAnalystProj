{{-- head --}}

<header class="ease">
    <div class="contain">
        <div class="logo ease">
            <a href="{{ url('/') }}">
                <img src="{{ get_site_image_src('images', $site_settings->site_logo) }}" alt="">
                {{-- <img src="images/logo.png" alt=""> --}}

                
            </a>
        </div>
        <div class="toggle"><span></span></div> 
        <nav class="ease">
            <ul id="nav">
                {{-- {{$this->page}} --}}
                {{-- here --}}
                {{-- {{ $site_content['page_title'] == "home" ? 'active' : ''}} --}}
                {{-- {{$site_content['page_title'] }} --}}
                {{-- {{$site_content}} --}}
                {{-- @dd($site_content) --}}
                {{-- @dd($pageName) --}}
                <li 
                class="{{ $pageName == "home" ? 'active' : ''}} "> 
                    <a href="/">Home</a>

                </li>
                <li class="{{ $pageName == "about" ? 'active' : ''}}">
                    <a href="/about">About</a>
                </li>
                <li class=" {{ $pageName == "services" ? 'active' : ''}}">
                    <a href="/services">Services</a>

                </li>
                <li class=" {{ $pageName == "portfolio" ? 'active' : ''}}">
                    <a href="/portfolios">Portfolio</a>

                </li>
                <!-- <li class=" <?php //if ($page == "") {
                               // echo 'active';
                           // } ?>">
                    <a href="blog.php">Blog</a>

                </li> -->
            </ul>
            <ul id="cta">
                <li class="{{ $pageName == "contact" ? 'active' : ''}}">
                    <a href="contact" class="webBtn blackBtn">Contact Us</a>
                </li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </div>
</header>
<!-- header -->