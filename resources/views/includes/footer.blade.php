{{-- <footer>
    <div class="contain">
        <div class="flex">
            <!-- Contact Info Section -->
            <div class="col">
                <h5>Contact Info</h5>
                <ul class="lst">
                    <li><a href="mailto:{{ $site_settings->site_email }}">{{ $site_settings->site_email }}</a></li>
                    <li><a href="tel:{{ $site_settings->site_phone }}">{{ $site_settings->site_phone }}</a></li>
                </ul>
                <div class="br"></div>
                <h5>Follow us on</h5>
                <ul class="social_lnks">
                    <li>
                        <a href="{{ $site_settings->site_facebook }}" target="_blank"><img src="{{ asset('assets/images/facebook.svg') }}" alt="Facebook"></a>
                    </li>
                    <li><a href="{{ $site_settings->site_instagram }}" target="_blank"><img src="{{ asset('assets/images/instagram.svg') }}" alt="Instagram"></a></li>
                    <li><a href="{{ $site_settings->site_twitter }}" target="_blank"><img src="{{ asset('assets/images/twitter.svg') }}" alt="Twitter"></a></li>
                    <li><a href="{!! $site_settings->site_discord !!}" target="_blank"><img src="{{ asset('assets/images/linkedin.svg') }}" alt="LinkedIn"></a></li>
                </ul>
            </div>

            <!-- Short Links Section -->
            <div class="col">
                <h5>Short Links</h5>
                <ul class="lst">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('products') }}">Products & Capabilities</a></li>
                    <li><a href="{{ url('careers') }}">Jobs</a></li>
                    <li><a href="{{ url('team') }}">Team Tecvox</a></li>
                    <li><a href="{{ url('blog') }}">Blog</a></li>
                </ul>
            </div>

            <!-- Company Section -->
            <div class="col">
                <h5>Company</h5>
                <ul class="lst">
                    <li><a href="{{ url('about') }}">Company Overview</a></li>
                    <li><a href="{{ url('about#vision') }}">Vision</a></li>
                    <li><a href="{{ url('about#locations') }}">Global Locations</a></li>
                    <li><a href="{{ url('about#manufacturing') }}">Manufacturing</a></li>
                    <li><a href="{{ url('contact') }}">Contact</a></li>
                </ul>
            </div>

            <!-- Newsletter Section -->
            <div class="col">
                <h5>Join our mailing list</h5>
                <form action="{{ url('newsletter') }}" method="post" autocomplete="off" class="frmAjax" id="frmNewsletter" novalidate="novalidate">
                    @csrf
                    <label for="email">Stay up to date with the latest news and deals!</label>
                    <div class="txtGrp relative">
                        <input type="email" name="email" id="email" class="input" placeholder="@ your email address">
                        <button type="submit" class="site_btn">Submit<i class="fi-arrow-right fi-2x"></i> </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer Bottom Section -->
    <div class="copy_right">
        <div class="contain">
            <div class="_inner">
                <p>Copyright©{{ date('Y') }} <a href="/">{{ $site_settings->site_name }}</a>, {{ $site_settings->site_copyright }}</p>
                <ul class="lst">
                    <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                    <li><a href="{{ url('terms-conditions') }}">Terms & Conditions</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer> --}}

<footer>
    <div class="contain">
        <div class="outer">
            <img class="shape2" src="{{asset('images/shape1.webp')}}" alt="">
            <img class="shape3" src="{{asset('images/shape2.webp')}}" alt="">
            
            <div class="footer-top">
                <div class="head">
                    <img src="{{asset('images/code.webp ')}}" alt="">
                    <h2>Ready To Work With Us?</h2>
                </div>
                <a class="webBtn">Explore More</a>
            </div>
            <div class="flex">
                <div class="col">
                    <div class="inner">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/about">About</a></li>
                            <li><a href="/portfolios">Portfolio</a></li>
                            <li><a href="/services">Services</a></li>
                            {{-- <li><a href="">Projects</a></li> --}}
                            {{-- <li><a href="">Blog</a></li> --}}
                            <li><a href="/contact">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="inner">
                        <div class="link">
                            <h2>Let’s Build!</h2>
                            <p><a href="">{{  $site_settings->site_email }}</a></p>
                        </div>
                        <div class="link">
                            <h2>Join The Force!</h2>
                            <p><a href="">Infor@company.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="inner">
                        <div class="link">
                            <h2>Let’s Build!</h2>
                            <p class="address">{{  $site_settings->site_address }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <div class="copyright relative">
            <div class="contain">
                <div class="inner">
                    <p>Copyright © 2024 <a href="?">Code-Analyst</a> All rights reserved.</p>
                </div>
            </div>
        </div> 
    </div>
</footer>
<!-- footer -->

<!-- popups -->
<section class="popup" data-popup="video">

    <div class="tableDv">

        <div class="tableCell">

            <div class="crosBtn"></div>

            <div class="contain">

                <div id="vidBlk" class=" inside">
                    
                    {{-- {!! $sitecontent['playbtnUrl']!!} --}}
                    {!! isset($sitecontent['playbtnUrl']) ? $sitecontent['playbtnUrl'] : null !!}

                    {{-- <iframe width="100%" height="515" src="{{$sitecontent['playbtnUrl']}}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe> --}}


                    </video>

                </div>

            </div>

        </div>

    </div>
</section>



<section class="popup" data-popup="project">
    <div class="container">
        <div class="crosBtn"></div>

        <h1 class="text-center mb-4">PortFolio</h1>
        <div class="crosBtn"></div>
        
        <div class="product_detail">
            <!-- Image Section -->
            <div class="image mb-3">
                <img id="popupImage" src="{{asset('images/code.webp')}}" class="img-fluid rounded" style="max-height: 300px; width: auto;" alt="Product Image">
            </div>

            <!-- Title Section -->
            <h3 id="pro_title" class="fw-bold mb-3" style="margin-top:20px">Title</h3>

            <!-- Description Section -->
            <p id="pro_description" class="text-muted mb-4">Here will be the product description, providing more insight into the features and benefits.</p>
            
            <div class="btn_blk">
                <a href="{{ url('contact') }}" class="btn btn-primary">Click for Contact-US</a>
            </div>
        </div>
    </div>
</section>

<div id="snackbar">We have Recived your Email Thank you..</div>

{{-- <section class="popup" data-popup="project">
    <div class="table_dv">
        <div class="table_cell">
            <div class="_inner">
                {{-- <button class="x_btn"></button> --}}
    {{-- <div class="crosBtn"></div>

                <div class="product_detail">
                    <div class="image">
                        <img src="" alt="">
                    </div>
                    <h3 id="pro_title"></h3>
                    <p></p>
                    <div class="flex">
                        <div class="col">
                            <h3 id="head_1">Key Features</h3>
                            <ul class="key_features">
                                <!-- Content will be dynamically populated -->
                            </ul>
                        </div>
                        <div class="col">
                            <h3 id="head_2">Technical Specifications</h3>
                            <ul class="technical_specs">
                                <!-- Content will be dynamically populated -->
                            </ul>
                        </div>
                    </div>
                    <div class="btn_blk">
                        <a href="{{ url('contact') }}">Click for more information</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
{{-- </section> --}}

    {{-- {{asset('js/owl.carousel.min.js')}} --}}
     {{-- {{asset('js/marquee.js')}} --}}
      {{-- {{asset('js/main.js')}} --}}


    </script>
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-ui.min.js')}} "></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/marquee.js')}}"></script>
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
<!-- Main Js -->
<script>
         
//         function myFunction(mesg) {
//   var x = mesg;
//   x.className = "show";
//   setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
// }

function myFunction(msg) {
  var x = document.getElementById("snackbar");
  x.innerHTML = msg;
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3500);
}

    $(document).ready(function () {
       
        $("#contactform").submit(function (e) {
        e.preventDefault(); // Prevent form from submitting normally
         
        let submitBtn = $("#submitBtn"); // Submit button ka reference
        submitBtn.prop("disabled", true); // Disable button on submit
        
        let formData = new FormData(this); // Convert form data into FormData object

        $.ajax({
            url: "/contact_us",
            type: "POST", 
            data: formData,
            processData: false, // Required for FormData
            contentType: false, // Required for FormData
            // headers: { 
            //     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            // },
            success: function (response) {
                console.log(response);
                   // Check if response.status exists 
    //                console.log("Response Type:", typeof response.status);
    // console.log("Response Value:", response.status);
              if (response.status === '1' || response.status === 1) { 
        myFunction("We have received your message. Thanks for contacting us!");
        $("#contactform")[0].reset();
        submitBtn.prop("disabled", false);
            } else {
        myFunction("Something went wrong, please try again.");
        submitBtn.prop("disabled", false);

    }
                // console.log(response);
                // alert("Form submitted successfully!");
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                alert("Something went wrong!");
            }
        });
    });

    });
</script>
