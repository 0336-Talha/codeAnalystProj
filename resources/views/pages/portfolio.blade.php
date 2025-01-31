<main class="pges">
    <section id="intro" class="mbl">
        <div class="contain">
            <div class="content_center smb">
                <div class="title">
                  {{$sitecontent['overview_top_heading']}}
                </div>
                <h2>
                  {{$sitecontent['overview_heading']}}

                </h2>
            </div>
        </div>
    </section>


    <section id="projects">
        <div class="contain">
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
    </section>


    <section id="appointment" style="background-image:  url('{{ get_site_image_src('images', !empty($sitecontent['image' . '1']) ? $sitecontent['image' . '1'] : '') }}');">
        <div class="contain">
            <div class="inner">
                <div class="content"> 
                    <div class="title">{{$sitecontent['sec1_head']}}</div>
                    <h2>{{$sitecontent['sec1_dec']}}</h2>
                </div>
                <a href="{{$sitecontent['sec1_btnUrl']}}" class="webBtn lightBtn">{{$sitecontent['sec1_btnTxt']}} </a>
            </div>
        </div>
    </section>
    <section id="folio">
        <div class="contain">
            <div class="content_center mb">
                <div class="title">{{$sitecontent['sec2_head']}}</div>
                <h2>{{$sitecontent['sec2_dec']}}</h2>
            </div>
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
                        <img src="{{get_site_image_src('images', !empty($sitecontent['image' .'2']) ? $sitecontent['image' .'2'] : '')}}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>

    </section>


</main>