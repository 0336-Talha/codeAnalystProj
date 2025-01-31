

<main>
  
    <section id="banner">
        <div class="social_contacts">
            <a href=""><i class="fas fa-envelope"></i>{{$site_settings->site_email == Null ? "NoEmail" : $site_settings->site_email }}</a>
            <a href=""><i class="fas fa-phone"></i>{{$site_settings->site_phone == Null ? "NoPhone" : $site_settings->site_phone }}</a>    
        </div>
        <div class="contain">
            <div class="content_center">
                {{-- <h1>We Design <span>Brands &</span> Websites Plus Exceptional <span>software</span> Platforms</h1> --}}
            {!! $sitecontent['banner_heading'] !!}

            </div>

        </div>
        <!-- <img class="shape1" src="images/shape3.webp" alt=""> -->
        <img class="shape2" src="{{asset('images/shape1.webp')}}" alt="">
        <img class="shape3" src="{{asset('images/shape2.webp')}}" alt="">
    </section>

    <section id="slider">
        <div class=""> 
            <div class="owl-carousel banner-carousel">
                @foreach($services as $serv)
                    {{-- <h4>{{$serv->name}}</h4> --}}
             
                <div class="item">
                    <div class="inner">
                        <div class="image">
                            {{-- images/b2.webp --}}
                            {{-- {{ get_site_image_src('services', !empty($serv['image']) ? $serv['image'] : '') }} --}}
                        {{-- {{$serv->image}} --}}
                            {{-- <img src="{{asset($serv['image'])}}" alt=""> --}}
                            <img src="{{ asset('/storage/service/'.$serv->image ) }}" alt="">
                            <div class="content">
                                <div class="left">
                                    <h6>Generation of Wealth</h6>
                                    <h3>{{$serv->name}}</h3>
                                </div>
                                <div class="right">
                                    <a href="" class="arrow-btn webBtn">
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
               
          
                {{-- <div class="item">
                    <div class="inner">
                        <div class="image">
                            <img src="images/b3.webp" alt="">
                            <div class="content">
                                <div class="left">
                                    <h6>Generation of Wealth</h6>
                                    <h3>Social Marketing</h3>
                                </div>
                                <div class="right">
                                    <a href="" class="arrow-btn webBtn">
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <section id="why_choose_us">
        <div class="contain">
            <div class="flex">
                <div class="content_center mb">
                    <div class="title"> {{ $sitecontent['sec1_head'] }}</div>
                    <h2>{{$sitecontent['sec1_dec']}}</h2>
                </div>
                <div class="flex">
                    @for($i=3; $i<=5; $i++)
                    <div class="col">
                        <div class="inner">
                            <div class="icon">
                                {{-- <img src="images/ch1.png" alt=""> --}}
                               
                                <img src=" {{ get_site_image_src('images', !empty($sitecontent['image' . $i]) ? $sitecontent['image' . $i] : '') }}" alt="">

                            </div>
                            <h3>{{$sitecontent['sec1_heading' . $i]}}</h3>
                            <p>{{$sitecontent['sec1_text' . $i]}} </p>
                        </div>
                    </div>
                    @endfor
                  
                   
                </div>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="contain">
            <div class="flex">
                <div class="col">
                    <div class="title">{{$sitecontent['sec2_head']}}</div>
                    <h2>{{$sitecontent['sec2_dec']}}</h2>
                    <p>{!! $sitecontent['section2_text'] !!}</p>
                    <ul> 
                        <li>{{$sitecontent['sec2_list1']}}</li>
                        <li>{{$sitecontent['sec2_list2']}}</li>
                        <li>{{$sitecontent['sec2_list3']}}</li>
                    </ul>
                </div>
                <div class="colr">
                    <div class="image">
                        <img src="{{ get_site_image_src('images', !empty($sitecontent['image' .'6']) ? $sitecontent['image' .'6'] : '') }}" alt="">
                        <a data-popup="video" class="video-btn popBtn">
                            <i class="fa-solid fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="editors">
        <div class="contain">
            <div class="content_center mb">
                <div class="title">{{$sitecontent['sec3_head']}}</div>
                <h2>{{$sitecontent['sec3_dec']}}</h2>
            </div>
            <div class="flex">
                @foreach($languages as $langu)
                <div class="col">
                    <div class="inner">
                        <div class="icon">
                            
                            <img src="{{asset('/storage/lang/'.$langu->image)}}" alt="">
                        </div>
                        <p>{{$langu->name}}</p>
                    </div>
                </div>
                @endforeach
               
              
               
            
              
                
              
               
              
               
            
                
            </div>
        </div>
    </section>


    <section id="creative">
        <div class="contain">
            <div class="flex">
                <div class="col">
                    <div class="image">
                        <img src="{{ get_site_image_src('images', !empty($sitecontent['image' .'7']) ? $sitecontent['image' .'7'] : '') }}" alt="">
                    </div>
                </div>
                <div class="colr">
                    
                    <div class="title">{{$sitecontent['sec4_head']}}</div>
                    <h2>{{$sitecontent['sec4_dec']}}</h2>
                    <p>{!! $sitecontent['section4_text'] !!}

                    </p>

                    <a href="{{$sitecontent['sec4_btnUrl']}}" class="webBtn">{{$sitecontent['sec4_btnTxt']}}</a>
                </div>
            </div>
        </div>
    </section>

    <section id="counter">
        <div class="contain">
            <div class="content_center mb">
                <div class="title">{{$sitecontent['sec5_head']}}</div>
                <h2>{{$sitecontent['sec5_dec']}}</h2>
            </div>
            <div class="flex">
                @for($i=8; $i<=11; $i++)
                <div class="col">
                    <div class="inner">
                        <div class="icon">
                            <img style="width: 100px;  
                            height: auto; padding:10px" src="{{get_site_image_src('images', !empty($sitecontent['image' .$i]) ? $sitecontent['image' .$i] : '')}}" alt="SVG Image">    
                          
                        </div>
                        <h3>{{$sitecontent['sec5_heading'.$i]}}</h3> 
                        <p>{{$sitecontent['sec5_text'.$i]}}</p>
                    </div>
                </div>
                @endfor
             
               
            </div>
        </div>
    </section>

    <section id="projects">
        <div class="contain">
            <div class="content_center mb">
                <div class="title">{{$sitecontent['sec6_head']}}</div>
                <h2>{{$sitecontent['sec6_dec']}}</h2>
            </div>
            <div class="flex">
                @foreach ($portfolio as $key=>$port )
                    
              
                <div class="col">
                    <div class="inner">
                        <div class="image">
                            <img src="{{asset('/storage/portfolio/'.$port->image)}}" alt="">
                            <a class="bttn popBtn"
                             data-popup="project"
                             data-id={{$port->id}}
                             
                             ><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="content">
                            <span class="number">{{$key+1 < 10 ? "0".$key+1 : $key+1 }}</span>
                            <h3><a href="" class="cs-btn">{{$port->heading}}</a></h3>
                        </div>
                    </div>
                </div>
                @endforeach
           
                
            </div>

        </div>
    </section>

    <section id="folio">
        <div class="contain">
            <div class="content_center mb">
                <div class="title">{{$sitecontent['sec7_head']}}</div>
                <h2>{{$sitecontent['sec7_dec']}}</h2>
            </div>
            {{-- image12 --}}
            <div class="flex"> 
                <div class="colr">
                    <div class="owlBlock">
                        <div id="owl-folio" class="owl-carousel owl-theme testi-carousel">
                            @foreach($testimonial as $testi)
                            <div class="item">
                                <div class="inner">
                                    <div class="content">
                                        <div class="ico"><img
                                                src="{{asset('/storage/testinomial/'.$testi->image)}}"
                                                alt="">
                                        </div>
                                        <p>
                                        <p>{!! $testi->discription !!}</p>
                                        </p>
                                        <div class="icoBlk">
                                            <h5>{{$testi->name}}<span>{{$testi->city_region}}</span></h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                           
                           
                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="image">
                        <img src="{{get_site_image_src('images', !empty($sitecontent['image' .'12']) ? $sitecontent['image' .'12'] : '')}}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">portfolio Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Product Image" class="img-fluid">
                <h5 class="mt-3" id="modalTitle"></h5>
                <p id="modalDescription"></p>
            </div>
        </div>
    </div>
</div>
    <!-- popups -->
{{--  --}}

</main>