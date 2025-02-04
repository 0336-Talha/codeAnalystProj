@extends('layouts.adminlayout')
@section('page_meta')
    <meta name="description" content="{{ !empty($site_settings) ? $site_settings->site_meta_desc : '' }}">
    <meta name="keywords" content="{{ !empty($site_settings) ? $site_settings->site_meta_keyword : '' }}">
    <meta name="author" content="{{ !empty($site_settings->site_name) ? $site_settings->site_name : 'Login' }}">
    <title>Admin - {{ $site_settings->site_name }}</title>
@endsection
@section('page_content')
{!!breadcrumb('Home Page')!!}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="form theme-form" method="post" action="" enctype="multipart/form-data"
id="saveForm">
@csrf
<div class="card">
    <div class="card-body">
        <div class="row">
           
            <div class="row">
                <div class="col">
                    <div>
                        <label class="form-label" for="page_title">Page Title</label>
                        <input class="form-control" id="page_title" type="text" name="page_title"
                                        placeholder=""
                                         value="{{ isset($sitecontent['page_title']) && $sitecontent['page_title'] ? $sitecontent['page_title'] : '' }}"
                                         
                                         >
                    </div>
                </div>
            </div>
             <div class="row">
                 <div class="col">
                     <div>
                         <label class="form-label" for="meta_title">Meta Title</label>
                         <input class="form-control" id="meta_title" type="text" name="meta_title"
                                        placeholder="" value="{{ isset($sitecontent['meta_title']) && $sitecontent['meta_title'] ? $sitecontent['meta_title'] : '' }}">
                     </div>
                 </div>
             </div>
            <div class="row">
                <div class="col">
                    <div>
                        <label class="form-label" for="site_meta_desc">Meta Description</label>
                        <textarea class="form-control" id="meta_description" rows="3" name="meta_description">{{ isset($sitecontent['meta_description']) && $sitecontent['meta_description'] ? $sitecontent['meta_description'] : '' }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                 <div class="col">
                    <div>
                        <label class="form-label" for="meta_keywords">Meta Keywords</label>
                        <textarea class="form-control" id="meta_keywords" rows="3" name="meta_keywords">{{ isset($sitecontent['meta_keywords']) && $sitecontent['meta_keywords'] ? $sitecontent['meta_keywords'] : '' }}</textarea>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="card">

    <div class="card-header">
        <h5>Banner</h5>
    </div>

    <div class="card-body">

    

            <div>
                <div class="row">
                 
                    <div>
                        <div>
                        <label class="form-label" for="banner_typing">Banner Heading</label>
                        <textarea id="banner_typing" name="banner_heading" rows="4" class="editor"> {{ $sitecontent['banner_heading'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
 
            </div>

        </div>
    </div>




<div class="card">

    <div class="card-header">
        <h5>Section 1</h5>
    </div>

    <div class="card-body">
        <div class="col">
            <div>
                <label class="form-label" for="sec1_head">Short heading</label>
                <input class="form-control" id="sec1_head" type="text" name="sec1_head"
                                placeholder=""
                                 value="{{ isset($sitecontent['sec1_head']) && $sitecontent['sec1_head'] ? $sitecontent['sec1_head'] : '' }}"
                                 
                                 >
            </div>
        </div>
  
    
         <div class="col">
             <div>
                 {{-- <label class="form-label" for="meta_title">Meta Title</label>
                 <input class="form-control" id="meta_title" type="text" name="meta_title"
                                placeholder="" value="{{ isset($sitecontent['meta_title']) && $sitecontent['meta_title'] ? $sitecontent['meta_title'] : '' }}"> --}}

                                <label class="form-label"
                                for="sec1_dec">Text
                                </label>
                            <textarea id="sec1_dec" name="sec1_dec" rows="4"
                                class="form-control">{{ !empty($sitecontent['sec1_dec']) ? $sitecontent['sec1_dec'] : "" }}</textarea>

             </div>
         </div>


        <div class="row">
             
            
            <?php $how_block_count = 0; ?>
            @for ($i = 3; $i <= 5; $i++)
                <?php $how_block_count = $how_block_count + 1; ?>
                <div class="col-4">
                    <div class="card">

                        <div class="card-header">
                            <h5>Block {{ $how_block_count }}</h5>
                        </div>
                    
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="card w-100 border position-relative overflow-hidden">
                                        <div class="card-body p-4">
                                        <div class="text-center">
                                        <div class="file_choose_icon">
                                            {{-- {{ get_site_image_src('images', !empty($sitecontent['image1']) ? $sitecontent['image1'] : "") }} --}}

                                            <img src="{{ get_site_image_src('images', !empty($sitecontent['image' . $i]) ? $sitecontent['image' . $i] : '') }}" alt="matdash-img" class="img-fluid " >
                                        </div>
                                            <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                            <input class="form-control uploadFile" name="image{{ $i }}" type="file"
                                                data-bs-original-title="" title="">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label"
                                            for="sec1_heading{{ $i }}">Heading
                                            {{ $how_block_count }}</label>
                                        <input class="form-control"
                                            id="sec1_heading{{ $i }}" type="text"
                                            name="sec1_heading{{ $i }}" placeholder=""
                                            value="{{ !empty($sitecontent['sec1_heading' . $i]) ? $sitecontent['sec1_heading' . $i] : "" }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-2">
                                        <label class="form-label"
                                            for="sec1_text{{ $i }}">Text
                                            {{ $how_block_count }}</label>
                                        <textarea id="sec1_text{{ $i }}" name="sec1_text{{ $i }}" rows="4"
                                            class="form-control">{{ !empty($sitecontent['sec1_text' . $i]) ? $sitecontent['sec1_text' . $i] : "" }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>


</div>
<div class="card">

    <div class="card-header">
        <h5>Section 2</h5>
    </div>

    <div class="card-body">

        <div class="row">
            <div class="col">
                <div class="card w-100 border position-relative overflow-hidden">
                    <div class="card-body p-4">
                      <div class="text-center">
                       <div class="file_choose_icon">
                          <img src="{{ get_site_image_src('images', !empty($sitecontent['image6']) ? $sitecontent['image6'] : "") }}" alt="matdash-img" class="img-fluid " >
                       </div>
                        <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        <input class="form-control uploadFile" name="image6" type="file"
                            data-bs-original-title="" title="">
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="playbtnUrl">Play Button Url Video</label>
                    <input class="form-control" id="playbtnUrl" type="text"
                        name="playbtnUrl" placeholder=""
                        value="{{ !empty($sitecontent['playbtnUrl']) ? $sitecontent['playbtnUrl'] : "" }}">
                </div>

            </div>

            

            <div class="col-md-8">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="sec2_head">Top Heading</label>
                            <input class="form-control" id="sec2_head" type="text"
                                name="sec2_head" placeholder=""
                                value="{{ !empty($sitecontent['sec2_head']) ? $sitecontent['sec2_head'] : "" }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">



                            
                            <label class="form-label"
                            for="sec1_dec">Text Heading
                            </label>
                        <textarea id="sec2_dec" name="sec2_dec" rows="4"
                            class="form-control">{{ !empty($sitecontent['sec2_dec']) ? $sitecontent['sec2_dec'] : "" }}</textarea>
                            
                        
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="section2_text">Text</label>
                            <textarea id="section2_text" name="section2_text" rows="4" class=" editor">{{ !empty($sitecontent['section2_text']) ? $sitecontent['section2_text'] : "" }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="sec2_list1">List bullet 1</label>
                            {{-- <input class="form-control" id="sec2_list1" type="text"
                                name="sec2_list1" placeholder=""
                                value="{{ !empty($sitecontent['sec2_list1']) ? $sitecontent['sec2_list1'] : "" }}"> --}}
                                <textarea id="sec2_list1" name="sec2_list1" rows="4"
                                class="form-control">{{ !empty($sitecontent['sec2_list1']) ? $sitecontent['sec2_list1'] : "" }}</textarea>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">

                            <label class="form-label" for="sec2_list2">List Bullet 2</label>
             

                                <textarea id="sec2_list2" name="sec2_list2" rows="4"
                                class="form-control">{{ !empty($sitecontent['sec2_list2']) ? $sitecontent['sec2_list2'] : "" }}</textarea>

                            {{-- <label class="form-label" for="sec2_list2">list2</label>
                            <select name="sec2_list2" class="form-control" required>
                                @foreach ($all_pages as $key => $page)
                                    <option value="{{ $key }}"
                                        {{ !empty($sitecontent['section2_link_url']) && $sitecontent['section2_link_url'] == $key ? 'selected' : '' }}>
                                        {{ $page }}</option>
                                @endforeach --}}
                            {{-- </select> --}}
                        </div>
                    </div>

                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="sec2_list3">List bullet3</label>
                                <textarea id="sec2_list3" name="sec2_list3" rows="4"
                                class="form-control">{{ !empty($sitecontent['sec2_list3']) ? $sitecontent['sec2_list3'] : "" }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>
<div class="card">

    <div class="card-header">
        <h5>Section 3</h5>
    </div>

    <div class="card-body">

        <div class="row">
            <div class="col">
                {{-- <div class="card w-100 border position-relative overflow-hidden">
                    <div class="card-body p-4">
                      <div class="text-center">
                       <div class="file_choose_icon">
                          <img src="{{ get_site_image_src('images', !empty($sitecontent['image']) ? $sitecontent['image6'] : "") }}" alt="matdash-img" class="img-fluid " >
                       </div>
                        <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        <input class="form-control uploadFile" name="image6" type="file"
                            data-bs-original-title="" title="">
                      </div>
                    </div>
                  </div>
            </div> --}}

            <div class="col">
                <div class="row">
                <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="sec3_head">Top Heading</label>
                            <input class="form-control" id="sec3_head" type="text"
                                name="sec3_head" placeholder=""
                                value="{{ !empty($sitecontent['sec3_head']) ? $sitecontent['sec3_head'] : "" }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="sec3_dec">Heading</label>
                            <input class="form-control" id="sec3_dec" type="text"
                                name="sec3_dec" placeholder=""
                                value="{{ !empty($sitecontent['sec3_dec']) ? $sitecontent['sec3_dec'] : "" }}">
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>


</div>
</div>
<div class="card">

    <div class="card-header">
        <h5>Section 4</h5>
    </div>

    <div class="card-body">

        <div class="row">
            <div class="col-4">
                <div class="card w-100 border position-relative overflow-hidden">
                    <div class="card-body p-4">
                      <div class="text-center">
                       <div class="file_choose_icon">
                          <img src="{{ get_site_image_src('images', !empty($sitecontent['image7']) ? $sitecontent['image7'] : "") }}" alt="matdash-img" class="img-fluid " >
                       </div>
                        <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        <input class="form-control uploadFile" name="image7" type="file"
                            data-bs-original-title="" title="">
                      </div>
                    </div>
                  </div>
            </div>
{{-- yahn py  --}}
{{-- ye --}}
            <div class="col-md-8">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="sec4_head">Top Heading</label>
                            <input class="form-control" id="sec4_head" type="text"
                                name="sec4_head" placeholder=""
                                value="{{ !empty($sitecontent['sec4_head']) ? $sitecontent['sec4_head'] : "" }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">



                            
                            <label class="form-label"
                            for="sec1_dec">Text Heading
                            </label>
                        <textarea id="sec4_dec" name="sec4_dec" rows="4"
                            class="form-control">{{ !empty($sitecontent['sec4_dec']) ? $sitecontent['sec4_dec'] : "" }}</textarea>
                            
                        
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="section4_text">Text</label>
                            <textarea id="section4_text" name="section4_text" rows="4" class=" editor">{{ !empty($sitecontent['section4_text']) ? $sitecontent['section4_text'] : "" }}</textarea>
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="sec4_btnTxt">Button Text</label>
                            <input class="form-control" id="sec4_btnTxt" type="text"
                                name="sec4_btnTxt" placeholder=""
                                value="{{ !empty($sitecontent['sec4_btnTxt']) ? $sitecontent['sec4_btnTxt'] : "" }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="sec4_btnUrl">Link URL</label>
                            <select name="sec4_btnUrl" class="form-control" required>
                                @foreach ($all_pages as $key => $page)
                                    <option value="{{ $key }}"
                                        {{ !empty($sitecontent['sec4_btnUrl']) && $sitecontent['sec4_btnUrl'] == $key ? 'selected' : '' }}>
                                        {{ $page }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

            </div>



        </div>
    </div>


</div>


{{-- section 5 --}}


<div class="card">

    <div class="card-header">
        <h5>Section 5</h5>
    </div>

    <div class="card-body">
        <div class="col">
            <div>
                <label class="form-label" for="sec5_head">Top heading</label>
                <input class="form-control" id="sec5_head" type="text" name="sec5_head"
                                placeholder=""
                                 value="{{ isset($sitecontent['sec5_head']) && $sitecontent['sec5_head'] ? $sitecontent['sec5_head'] : '' }}"
                                 
                                 >
            </div>
        </div>
  
    
         <div class="col">
             <div>
                 {{-- <label class="form-label" for="meta_title">Meta Title</label>
                 <input class="form-control" id="meta_title" type="text" name="meta_title"
                                placeholder="" value="{{ isset($sitecontent['meta_title']) && $sitecontent['meta_title'] ? $sitecontent['meta_title'] : '' }}"> --}}

                                <label class="form-label"
                                for="sec5_dec">Heading
                                </label>
                                <input type="text"  class="form-control" name="sec5_dec" id="sec5_dec" value="{{ isset($sitecontent['sec5_dec']) && $sitecontent['sec5_dec'] ? $sitecontent['sec5_dec'] : '' }}">
                            {{-- <textarea id="sec1_dec" name="sec5_dec" rows="4"
                                class="form-control">{{ !empty($sitecontent['sec1_dec']) ? $sitecontent['sec1_dec'] : "" }}</textarea> --}}

             </div>
         </div>
</div>


        <div class="row">
             
            
            <?php $how_block_count = 0; ?>
            @for ($i = 8; $i <= 11; $i++)
                <?php $how_block_count = $how_block_count + 1; ?>
                <div class="col-3">
                    <div class="card">

                        <div class="card-header">
                            <h5>Block {{ $how_block_count }}</h5>
                        </div>
                    
                        <div class="">
                            <div class="row">
                                <div class="col">
                                    <div class="card w-100 border position-relative overflow-hidden">
                                        <div class="card-body p-4">
                                        <div class="text-center">
                                        <div class="file_choose_icon">
                                            {{-- {{ get_site_image_src('images', !empty($sitecontent['image1']) ? $sitecontent['image1'] : "") }} --}}

                                            <img src="{{ get_site_image_src('images', !empty($sitecontent['image' . $i]) ? $sitecontent['image' . $i] : '') }}" alt="matdash-img" class="img-fluid " >
                                        </div>
                                            <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                            <input class="form-control uploadFile" name="image{{ $i }}" type="file"
                                                data-bs-original-title="" title="">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label"
                                            for="sec5_heading{{ $i }}">Heading
                                            {{ $how_block_count }}</label>
                                        <input class="form-control"
                                            id="sec5_heading{{ $i }}" type="text"
                                            name="sec5_heading{{ $i }}" placeholder=""
                                            value="{{ !empty($sitecontent['sec5_heading' . $i]) ? $sitecontent['sec5_heading' . $i] : "" }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-2">
                                        <label class="form-label"
                                            for="sec1_text{{ $i }}">Text
                                            {{ $how_block_count }}</label>
                                        <textarea id="sec5_text{{ $i }}" name="sec5_text{{ $i }}" rows="4"
                                            class="form-control">{{ !empty($sitecontent['sec5_text' . $i]) ? $sitecontent['sec5_text' . $i] : "" }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
            @endfor
        </div>
    </div>







            {{-- section 6 --}}

            <div class="card">

                <div class="card-header">
                    <h5>Section 6</h5>
                </div>
            
                <div class="card-body">
            
                    <div class="row">
                        <div class="col">
                          
            
                        <div class="col-md-12">
                            <div class="row">
                            <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="sec6_head">Top Heading</label>
                                        <input class="form-control" id="sec6_head" type="text"
                                            name="sec6_head" placeholder=""
                                            value="{{ !empty($sitecontent['sec6_head']) ? $sitecontent['sec6_head'] : "" }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="sec6_dec">Heading</label>
                                        <input class="form-control" id="sec6_dec" type="text"
                                            name="sec6_dec" placeholder=""
                                            value="{{ !empty($sitecontent['sec6_dec']) ? $sitecontent['sec6_dec'] : "" }}">
                                    </div>
                                </div>
                            </div>
                        </div>
            
                    </div>
                </div>
            
            
            </div>
            </div>
            {{-- section 7 --}}
            <div class="card">

                <div class="card-header">
                    <h5>Section 7</h5>
                </div>
            
                <div class="card-body">
            
                    <div class="row">
                        <div class="col">
                            <div class="card w-100 border position-relative overflow-hidden">
                                <div class="card-body p-4">
                                  <div class="text-center">
                                   <div class="file_choose_icon">
                                    <img src="{{ get_site_image_src('images', !empty($sitecontent['image' . $i]) ? $sitecontent['image' . $i] : '') }}" alt="matdash-img" class="img-fluid " >
                                   </div>
                                    <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                    <input class="form-control uploadFile" name="image6" type="file"
                                        data-bs-original-title="" title="">
                                  </div>
                                </div>
                              </div>
                        </div>
            
                        <div class="col-md-8">
                            <div class="row">
                            <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="sec7_head">Top Heading</label>
                                        <input class="form-control" id="sec7_head" type="text"
                                            name="sec7_head" placeholder=""
                                            value="{{ !empty($sitecontent['sec7_head']) ? $sitecontent['sec7_head'] : "" }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="sec7_dec">Heading</label>
                                        <input class="form-control" id="sec7_dec" type="text"
                                            name="sec7_dec" placeholder=""
                                            value="{{ !empty($sitecontent['sec7_dec']) ? $sitecontent['sec7_dec'] : "" }}">
                                    </div>
                                </div>
                            </div>
                        </div>
            
                    </div>
                </div>
            
            
            </div>



            <div class="col-12">
                <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                <button class="btn btn-primary" type="submit">Update Page</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
