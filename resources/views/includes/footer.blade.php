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
                <a class="webBtn" href="/about">Explore More</a>
            </div>
            <div class="flex">
                <div class="col">
                    <div class="inner">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/about">About</a></li>
                            <li><a href="/portfolios">Portfolio</a></li>
                            <li><a href="/services">Services</a></li>
                            <li><a href="/contact">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="inner">
                        <div class="link">
                            <h2>Let’s Build!</h2>
                            <p><a href="mailto:{{  $site_settings->site_email }}">{{  $site_settings->site_email }}</a></p>
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

            <div class="image">
                <img id="popupImage" style="height: 400px; border-radius: 40px;" src="{{asset('images/code.webp')}}" alt="">
            </div>
           
           
            <!-- Title Section -->
            <h3 id="pro_title" class="fw-bold mb-3" style="margin-top:20px">Title</h3>

            <!-- Description Section -->
            <p id="pro_description" class="text-muted mb-4">Here will be the product description, providing more insight into the features and benefits.</p>
            
            <div class="btn_blk" style="display: flex; justify-content: center; align-items: center;">
                <a href="{{ url('contact') }}" class="webBtn">Click for Contact-US</a>
            </div>
        </div>

        </div>
    </div>
</section>

<div id="snackbar">We have Recived your Email Thank you..</div>
<div id="snackbaring">Error</div>


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
function myFunctioning(msg) {
  var x = document.getElementById("snackbaring");
  x.innerHTML = msg;
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3500);
}


    $(document).ready(function () {
       
        $("#contactform").submit(function (e) {
                    // Reset all error messages
         e.preventDefault(); // Prevent form from submitting normally

        $('.error').remove();
        
        var isValid = true;
        
        // Validate name (required)
        if ($('#name').val() === '') {
            isValid = false;
            $('#name').after('<span class="error">First name is required</span>');
        }

        // Validate last name (required)
        if ($('#lname').val() === '') {
            isValid = false;
            $('#lname').after('<span class="error">Last name is required</span>');
        }

        // Validate email (required & format)
        var email = $('#email').val();
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (email === '') {
            isValid = false;
            $('#email').after('<span class="error">Email is required</span>');
        } else if (!emailPattern.test(email)) {
            isValid = false;
            $('#email').after('<span class="error">Please enter a valid email address</span>');
        }

        // Validate phone (required)
        if ($('#phone').val() === '') {
            isValid = false;
            $('#phone').after('<span class="error">Phone number is required</span>');
        }

        // Validate message (required)
        if ($('#msg').val() === '') {
            isValid = false;
            $('#msg').after('<span class="error">Message is required</span>');
        }

        if ($('#webemail').val() === '') {
            isValid = false;
            $('#webemail').after('<span class="error">Message is required</span>');
        }

        if (isValid) {

        $('.spinner').removeClass('hidden');
         
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
        $('.spinner').addClass('hidden');

                   // Check if response.status exists 
    //                console.log("Response Type:", typeof response.status);
    // console.log("Response Value:", response.status);
              if (response.status === '1' || response.status === 1) { 
        myFunction("We have received your message. Thanks for contacting us!");
        $("#contactform")[0].reset();
        submitBtn.prop("disabled", false);
            } else {
        $('.spinner').addClass('hidden');

      
        submitBtn.prop("disabled", false);
        myFunctioning("Something went wrong, please try again.")
        

    }
                // console.log(response);
                // alert("Form submitted successfully!");
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                // alert("Something went wrong!");
                myFunctioning("Something went wrong!")
            }
        });
    }
    });


        // On change, remove error message
        $('#name, #lname, #email, #phone, #msg , #webemail').on('change', function() {
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; // Email regex pa

        if ($(this).val() !== '') {
            $(this).next('.error').remove(); // Remove the error message when input is changed

            if ($(this).attr('id') === 'email') {
            var emailValue = $(this).val();
            if (!emailPattern.test(emailValue)) {
                // Add error message if email format is invalid
                $(this).after('<span class="error">Please enter a valid email address</span>');
                $(this).addClass('error-border'); // Add yellow border if invalid
            } else {
                $(this).removeClass('error-border'); // Remove yellow border if valid
            }
        }

        
        }

      
    });

    // var email = $('#email').val();
    //     var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    //     if (email === '') {
    //         isValid = false;
    //         $('#email').after('<span class="error">Email is required</span>');
    //     } else if (!emailPattern.test(email)) {
    //         isValid = false;
    //         $('#email').after('<span class="error">Please enter a valid email address</span>');
    //     }



    });
</script>
