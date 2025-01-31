@extends('layouts.adminlayout')
@section('page_meta')
    <meta name="description" content="{{ !empty($site_settings) ? $site_settings->site_meta_desc : '' }}">
    <meta name="keywords" content="{{ !empty($site_settings) ? $site_settings->site_meta_keyword : '' }}">
    <meta name="author" content="{{ !empty($site_settings->site_name) ? $site_settings->site_name : 'Login' }}">
    <title>Admin - {{ $site_settings->site_name }}</title>
@endsection
@section('page_content')
{!!breadcrumb('Portfolio Page')!!}

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
                                placeholder="" value="{{ !empty($sitecontent['page_title']) ? $sitecontent['page_title'] : "" }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div>
                            <label class="form-label" for="meta_title">Meta Title</label>
                            <input class="form-control" id="meta_title" type="text" name="meta_title"
                                placeholder="" value="{{ !empty($sitecontent['meta_title']) ? $sitecontent['meta_title'] : "" }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div>
                            <label class="form-label" for="site_meta_desc">Meta Description</label>
                            <textarea class="form-control" id="meta_description" rows="3" name="meta_description">{{ !empty($sitecontent['meta_description']) ? $sitecontent['meta_description'] : "" }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div>
                            <label class="form-label" for="meta_keywords">Meta Keywords</label>
                            <textarea class="form-control" id="meta_keywords" rows="3" name="meta_keywords">{{ !empty($sitecontent['meta_keywords']) ? $sitecontent['meta_keywords'] : "" }}</textarea>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
  
<div class="card">

    <div class="card-header">
        <h5>Overview Section</h5>
    </div>

    <div class="card-body">

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="overview_top_heading">Top Heading</label>
                            <input class="form-control" id="overview_top_heading" type="text"
                                name="overview_top_heading" placeholder=""
                                value="{{ !empty($sitecontent['overview_top_heading']) ? $sitecontent['overview_top_heading'] : "" }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="overview_heading">Heading</label>
                            <input class="form-control" id="overview_heading" type="text"
                                name="overview_heading" placeholder=""
                                value="{{ !empty($sitecontent['overview_heading']) ? $sitecontent['overview_heading'] : "" }}">
                        </div>
                    </div>
                   
                </div>
                
            </div>


     

        
            
            
       
            {{-- <div class="col-12">
                <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                <button class="btn btn-primary" type="submit">Update Page</button>
                </div>
            </div> --}}
        </div>
    </div>



<div class="card-body">
    <div class="card-header">
        <h5>Section 1</h5>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="sec1_head">Top Heading</label>
                        <input class="form-control" id="sec1_head" type="text"
                            name="sec1_head" placeholder=""
                            value="{{ !empty($sitecontent['sec1_head']) ? $sitecontent['sec1_head'] : "" }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="sec1_dec">Heading</label>
                        <input class="form-control" id="sec1_dec" type="text"
                            name="sec1_dec" placeholder=""
                            value="{{ !empty($sitecontent['sec1_dec']) ? $sitecontent['sec1_dec'] : "" }}">
                    </div>
                </div>
               
            </div>
            
        </div>

        <div class="col">
            <div class="card w-100 border position-relative overflow-hidden">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="file_choose_icon">
                            <img src="{{ get_site_image_src('images', !empty($sitecontent['image1']) ? $sitecontent['image1'] : "") }}" alt="matdash-img" class="img-fluid ">
                        </div>
                        <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        <input class="form-control uploadFile" name="image1" type="file"
                            data-bs-original-title="" title="">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label" for="sec1_btnTxt">Button Text</label>
                    <input class="form-control" id="sec1_btnTxt" type="text"
                        name="sec1_btnTxt" placeholder=""
                        value="{{ !empty($sitecontent['sec1_btnTxt']) ? $sitecontent['sec1_btnTxt'] : "" }}">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label class="form-label" for="sec1_btnUrl">Link URL</label>
                    <select name="sec1_btnUrl" class="form-control" required>
                        @foreach ($all_pages as $key => $page)
                            <option value="{{ $key }}"
                                {{ !empty($sitecontent['sec1_btnUrl']) && $sitecontent['sec1_btnUrl'] == $key ? 'selected' : '' }}>
                                {{ $page }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>


 

    
        
        
   
        {{-- <div class="col-12">
            <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
            <button class="btn btn-primary" type="submit">Update Page</button>
            </div>
        </div>
    </div> --}}
</div>

<div class="card-body">
    <div class="card-header">
        <h5>Section 2</h5>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="sec2_head">Top Heading</label>
                        <input class="form-control" id="sec2_head" type="text"
                            name="sec2_head" placeholder=""
                            value="{{ !empty($sitecontent['sec2_head']) ? $sitecontent['sec2_head'] : "" }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="sec2_dec">Heading</label>
                        <input class="form-control" id="sec2_dec" type="text"
                            name="sec2_dec" placeholder=""
                            value="{{ !empty($sitecontent['sec2_dec']) ? $sitecontent['sec2_dec'] : "" }}">
                    </div>
                </div>
               
            </div>
            
        </div>

        <div class="col">
            <div class="card w-100 border position-relative overflow-hidden">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="file_choose_icon">
                            <img src="{{ get_site_image_src('images', !empty($sitecontent['image2']) ? $sitecontent['image2'] : "") }}" alt="matdash-img" class="img-fluid ">
                        </div>
                        <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        <input class="form-control uploadFile" name="image2" type="file"
                            data-bs-original-title="" title="">
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






   



 

   

     
          
{{-- yahn py  --}}
{{-- ye --}}
    



        

{{-- section 5 --}}










@endsection