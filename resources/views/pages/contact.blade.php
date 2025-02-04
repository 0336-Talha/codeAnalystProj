<main class="pges">
    <section id="intro" class="mls">
        <div class="contain">
            <div class="content_center smb">
                <div class="title">
                    {{$sitecontent['overview_top_heading']}}
                </div>
                <h2>{{$sitecontent['overview_heading']}}</h2>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="contain">
            <div class="flexRow flex">
                <div class="col col1">
                    <div class="image">
                        <img src="{{ get_site_image_src('images', !empty($sitecontent['image' . '1']) ? $sitecontent['image' . '1'] : '') }}" alt="">
                    </div>
                </div> 
                <div class="col col2">
                    <div class="outer">
                        <h3>Fill The Form Below</h3>
                        
                        <form  id="contactform" method="post">
                            @csrf
                            <div class="form_row row">
                                <div class="col-xs-6">
                                    <div class="form_blk">
                                        <input type="text" name="name" id="name" class="txtBox"
                                            placeholder="First Name" >
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form_blk">
                                        <input type="text" name="lname" id="lname" class="txtBox"
                                            placeholder="Last Name" >
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form_blk">
                                        <input type="text" name="email" id="email" class="txtBox"
                                            placeholder="Email" >
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form_blk">
                                        <input type="tel" name="phone" id="phone" class="txtBox"
                                            placeholder="Phone No" >
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form_blk">
                                        <input type="text" name="webemail" id="webemail" class="txtBox" 
                                            placeholder="Your Website">
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form_blk">
                                        <textarea class="txtBox"  name="msg" id="msg"
                                            placeholder="Coments...."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="bTn">
                                <button type="submit" id="submitBtn" class="webBtn"> 
                                    <i class="spinner hidden"></i> Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    
        </div>
    </section>





</main>