<main class="pges">
    <section id="intro">
        <div class="contain">
            <div class="content_center smb">
                <div class="title">
               {{$sitecontent['overview_top_heading']}}
                </div>
                <h2>{{$sitecontent['overview_heading']}}</h2>
            </div>
        </div>
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


    <section id="partners">
        <div class="contain">
            <div class="content_center">
                <h2>{{$sitecontent['brand']}}</h2>
            </div>
            <div class="flex">
                @foreach ($brand as $bar)
                <div class="col">
                    <div class="inner">
                        <div class="image">
                            <img src="{{ asset('/storage/brand/'.$bar->image ) }}" alt="">
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
                <div class="title">{{$sitecontent['sec1_head']}}</div>
                <h2>{{$sitecontent['sec1_dec']}}</h2>
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
                        {{-- {{$sitecontent['image1']}} --}}
                        <img src="{{get_site_image_src('images', !empty($sitecontent['image' .'1']) ? $sitecontent['image' .'1'] : '')}}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>

    </section>


</main>