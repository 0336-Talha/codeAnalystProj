<main class="pges">
    <section id="intro">
        <div class="contain">
            <div class="content_center smb">
                <div class="title">
    
                    {{$sitecontent['overview_top_heading']}}
                </div>
                <h2>{{$sitecontent['overview_heading']}}</h2>
            </div>
            <div class="flex">
                <div class="col">
                    <div class="image">
                        <img src=" {{ get_site_image_src('images', !empty($sitecontent['image' . '1']) ? $sitecontent['image' . '1'] : '') }}" alt="">
                    </div>
                </div>
                <div class="colr pl">
                    <h2>{{$sitecontent['banner_head']}}</h2>
                    <p>{!! $sitecontent['banner_text'] !!}</p>
                    <a href="{{$sitecontent['banner_btnUrl']}}" class="webBtn">{{$sitecontent['banner_btntext']}}</a>
                </div>
            </div>
            <div class="flex mt">
                <div class="col pr">
                    <h2>{{$sitecontent['banner_dhead']}}</h2>
                    <p>{!! $sitecontent['banner_dtext'] !!}</p> 
                    <a href="{{$sitecontent['banner_dbtnUrl']}}" class="webBtn">{{$sitecontent['banner_dbtntext']}}</a>
                </div>
                <div class="colr">
                    <div class="image">
                        <img src="{{ get_site_image_src('images', !empty($sitecontent['image' . '2']) ? $sitecontent['image' . '2'] : '') }}" alt="">

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="team">
        <div class="contain">
            <div class="content_center">
                <div class="title">{{$sitecontent['section1_head']}}</div>
                <h2>{{$sitecontent['section1_dec']}}</h2>
            </div>
            <div class="flex">
                @foreach ($team as $item)
                    
             
                <div class="col">
                    <div class="inner-box">
                        <div class="image">
                            <img width="292" height="332" src="{{ asset('/storage/team/'.$item->image ) }}" alt="">

                        </div>
                        <div class="lower-content">
                            <h3><a href="3">{{$item->name}}</a></h3>
                            <ul class="social-icons">
                                @if($item->facebook)
                                <li><a href="{{$item->facebook}}"><i class="fab fa fa-facebook"></i></a></li>
                                @endif
                                @if($item->linkdin)
                                <li><a href="{{$item->linkdin}}"><i class="fab fa fa-linkedin"></i></a></li>
                                @endif

                                @if($item->twitter)
                                <li><a href="{{$item->twitter}}"><i class="fab fa fa-twitter"></i></a></li>
                                @endif

                                @if($item->skype)

                                <li><a href="{{$item->skype}}"><i class="fab fa fa-skype"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
        
             
            
            </div>
        </div>
    </section>

    <section id="appointment" style="background-image:  url('{{ get_site_image_src('images', !empty($sitecontent['image' . '3']) ? $sitecontent['image' . '3'] : '') }}');">
        <div class="contain">
            <div class="inner">
                <div class="content"> 
                    <div class="title">{{$sitecontent['section2_head']}}</div>
                    <h2>{{$sitecontent['section2_dec']}}</h2>
                </div>
                <a href="{{$sitecontent['section2_btnUrl']}}" class="webBtn lightBtn">{{$sitecontent['section2_btntext']}} </a>
            </div>
        </div>
    </section>

    <section id="award">
        <div class="contain">
            <div class="outer">
                <div class="flex">
                    <div class="col">
                        <div class="image">
                            <img src="{{ get_site_image_src('images', !empty($sitecontent['image' . '4']) ? $sitecontent['image' . '4'] : '') }}" alt="">
                        </div>
                    </div>
                    <div class="colr">
                        <div class="title">{{$sitecontent['section3_head']}}</div>
                        <h2>
                            {{$sitecontent['section3_dec']}}</h2>
                        <p>{{$sitecontent['section3_text']}}</p>
                        <a href="{{$sitecontent['section3_btnUrl']}}" class="webBtn">{{$sitecontent['section2_btntext']}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="folio">
        <div class="contain">
            <div class="content_center mb">
                <div class="title">{{$sitecontent['section4_head']}}</div>
                <h2>{{$sitecontent['section4_dec']}}</h2>
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
                        <img src="{{get_site_image_src('images', !empty($sitecontent['image' .'5']) ? $sitecontent['image' .'5'] : '')}}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>

    </section>

</main>