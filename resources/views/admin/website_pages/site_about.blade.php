@extends('layouts.adminlayout')
@section('page_meta')
    <meta name="description" content="{{ !empty($site_settings) ? $site_settings->site_meta_desc : '' }}">
    <meta name="keywords" content="{{ !empty($site_settings) ? $site_settings->site_meta_keyword : '' }}">
    <meta name="author" content="{{ !empty($site_settings->site_name) ? $site_settings->site_name : 'Login' }}">
    <title>Admin - {{ $site_settings->site_name }}</title>
@endsection
@section('page_content')
{!!breadcrumb('About Page')!!}

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

                <div class="col-md-8">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="banner_head">Banner Heading</label>
                               
                                <input class="form-control" id="banner_head" type="text"
                                name="banner_head" placeholder=""
                                value="{{ !empty($sitecontent['banner_head']) ? $sitecontent['banner_head'] : "" }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="banner_text">Banner Text</label>
                                <textarea id="banner_text" name="banner_text" rows="4" class="editor">{{ !empty($sitecontent['banner_text']) ? $sitecontent['banner_text'] : "" }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
              
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="banner_btntext">Button Text</label>
                        <input class="form-control" id="banner_btntext" type="text"
                            name="banner_btntext" placeholder=""
                            value="{{ !empty($sitecontent['banner_btntext']) ? $sitecontent['banner_btntext'] : "" }}">

                        </div>
                    </div>
               
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="banner_btnUrl">Link URL</label>
                            <select name="banner_btnUrl" class="form-control" required>
                                @foreach ($all_pages as $key => $page)
                                    <option value="{{ $key }}"
                                        {{ !empty($sitecontent['banner_btnUrl']) && $sitecontent['banner_btnUrl'] == $key ? 'selected' : '' }}>
                                        {{ $page }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                {{-- yahn agy --}}
                <div class="row">
                    <hr>
                    <h5>Banner down Section</h5>

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
    
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="banner_dhead">Heading</label>
                                   
                                    <input class="form-control" id="banner_dhead" type="text"
                                    name="banner_dhead" placeholder=""
                                    value="{{ !empty($sitecontent['banner_dhead']) ? $sitecontent['banner_dhead'] : "" }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label" for="banner_dtext">Banner down Text</label>
                                    <textarea id="banner_dtext" name="banner_dtext" rows="4" class="editor">{{ !empty($sitecontent['banner_dtext']) ? $sitecontent['banner_dtext'] : "" }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="banner_dbtntext">Down Button Text</label>
                            <input class="form-control" id="banner_dbtntext" type="text"
                                name="banner_dbtntext" placeholder=""
                                value="{{ !empty($sitecontent['banner_dbtntext']) ? $sitecontent['banner_dbtntext'] : "" }}">
    
                            </div>
                        </div>
                   
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="banner_dbtnUrl">Link URL</label>
                                <select name="banner_dbtnUrl" class="form-control" required>
                                    @foreach ($all_pages as $key => $page)
                                        <option value="{{ $key }}"
                                            {{ !empty($sitecontent['banner_dbtnUrl']) && $sitecontent['banner_dbtnUrl'] == $key ? 'selected' : '' }}>
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

        

    </div>
    <div class="card">

        <div class="card-header">
            <h5>Section 1 (Team Members)</h5>
        </div>

        <div class="card-body">

            <div class="row">
               

                {{-- <div class="col-md-8"> --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="section1_head">Top Heading</label>
                                <input class="form-control" id="section1_head" type="text"
                                    name="section1_head" placeholder=""
                                    value="{{ !empty($sitecontent['section1_head']) ? $sitecontent['section1_head'] : "" }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="section1_dec">Heading</label>
                                <input class="form-control" id="section1_dec" type="text"
                                    name="section1_dec" placeholder=""
                                    value="{{ !empty($sitecontent['section1_dec']) ? $sitecontent['section1_dec'] : "" }}">
                            </div>
                        </div>
                     
                    </div>
                </div>
               
            {{-- </div> --}}
        </div>


    </div>
    <div class="card">

        <div class="card-header">
            <h5>Section 2(Appointment)</h5>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col">
                    <div class="card w-100 border position-relative overflow-hidden">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <div class="file_choose_icon">
                                    <img src="{{ get_site_image_src('images', !empty($sitecontent['image3']) ? $sitecontent['image3'] : "") }}" alt="matdash-img" class="img-fluid ">
                                </div>
                                <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                <input class="form-control uploadFile" name="image3" type="file"
                                    data-bs-original-title="" title="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="section2_head">Top Heading</label>
                               
                                <input class="form-control" id="section2_head" type="text"
                                name="section2_head" placeholder=""
                                value="{{ !empty($sitecontent['section2_head']) ? $sitecontent['section2_head'] : "" }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="section2_dec">Heading</label>
                               
                                <input class="form-control" id="section2_dec" type="text"
                                name="section2_dec" placeholder=""
                                value="{{ !empty($sitecontent['section2_dec']) ? $sitecontent['section2_dec'] : "" }}">
                              
                            </div>
                        </div>
                    </div>
                </div>
              
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="section2_btntext">Button Text</label>
                        <input class="form-control" id="section2_btntext" type="text"
                            name="section2_btntext" placeholder=""
                            value="{{ !empty($sitecontent['section2_btntext']) ? $sitecontent['section2_btntext'] : "" }}">

                        </div>
                    </div>
               
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="section2_btnUrl">Link URL</label>
                            <select name="section2_btnUrl" class="form-control" required>
                                @foreach ($all_pages as $key => $page)
                                    <option value="{{ $key }}"
                                        {{ !empty($sitecontent['section2_btnUrl']) && $sitecontent['section2_btnUrl'] == $key ? 'selected' : '' }}>
                                        {{ $page }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
 
    <div class="card">

        <div class="card-header">
            <h5>Section 3(Working brands)</h5>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col">
                    <div class="card w-100 border position-relative overflow-hidden">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <div class="file_choose_icon">
                                    <img src="{{ get_site_image_src('images', !empty($sitecontent['image4']) ? $sitecontent['image4'] : "") }}" alt="matdash-img" class="img-fluid ">
                                </div>
                                <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                <input class="form-control uploadFile" name="image4" type="file"
                                    data-bs-original-title="" title="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="section3_head">Top Heading</label>
                               
                                <input class="form-control" id="section3_head" type="text"
                                name="section3_head" placeholder=""
                                value="{{ !empty($sitecontent['section3_head']) ? $sitecontent['section3_head'] : "" }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="section3_dec">Heading</label>
                               
                                <input class="form-control" id="section3_dec" type="text"
                                name="section3_dec" placeholder=""
                                value="{{ !empty($sitecontent['section3_dec']) ? $sitecontent['section3_dec'] : "" }}">
                              
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="section3_text">Text</label>
                               
                         
                              
                                <textarea id="section3_text" name="section3_text" rows="4" class=" editor">{{ !empty($sitecontent['section3_text']) ? $sitecontent['section3_text'] : "" }}</textarea>
                            </div>
                        </div>
                    </div>


                </div>
              
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="section3_btntext">Button Text</label>
                        <input class="form-control" id="section3_btntext" type="text"
                            name="section3_btntext" placeholder=""
                            value="{{ !empty($sitecontent['section3_btntext']) ? $sitecontent['section3_btntext'] : "" }}">

                        </div>
                    </div>
               
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="section3_btnUrl">Link URL</label>
                            <select name="section3_btnUrl" class="form-control" required>
                                @foreach ($all_pages as $key => $page)
                                    <option value="{{ $key }}"
                                        {{ !empty($sitecontent['section3_btnUrl']) && $sitecontent['section3_btnUrl'] == $key ? 'selected' : '' }}>
                                        {{ $page }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <div class="card">
        <div class="card-header">
            <h5>Section 4(testimonials)</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label" for="section4_head">Top Heading</label>
                        <input class="form-control" id="section4_head" type="text"
                            name="section4_head" placeholder=""
                            value="{{ !empty($sitecontent['section4_head']) ? $sitecontent['section4_head'] : "" }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label" for="section4_dec">Heading</label>
                        <input class="form-control" id="section4_dec" type="text"
                            name="section4_dec" placeholder=""
                            value="{{ !empty($sitecontent['section4_dec']) ? $sitecontent['section4_dec'] : "" }}">
                    </div>
                </div>

                <div class="col">
                    <div class="card w-100 border position-relative overflow-hidden">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <div class="file_choose_icon">
                                    <img src="{{ get_site_image_src('images', !empty($sitecontent['image5']) ? $sitecontent['image5'] : "") }}" alt="matdash-img" class="img-fluid ">
                                </div>
                                <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                <input class="form-control uploadFile" name="image5" type="file"
                                    data-bs-original-title="" title="">
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
    @endsection