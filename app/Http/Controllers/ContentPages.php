<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Language;
use App\Models\Portfolio;
use App\Models\Testimonial;
use App\Models\Team;
use App\Models\Contact;
use App\Models\Brand;


use Illuminate\Support\Facades\Validator;

use PHPMailer\PHPMailer\Exception;


class ContentPages extends Controller
{
    //

    public function home_page(Request $request)
    {
        // $token = $request->input('token', null);
        // $member = $this->authenticate_verify_token($token);

        // Set dynamic data
        $this->data['sitecontent'] = get_page('home');
        // $this->data['page']="home";
        $this->data['page_title'] = $this->data['sitecontent']['page_title'];

        // $this->data['products'] = products_model::orderBy('id', 'asc')->where('status', 1)->limit(3)->get();

        $this->data['services'] =Service::get();
        $this->data['languages'] =Language::get();
        $this->data['portfolio'] =Portfolio::get();
        $this->data['testimonial'] =Testimonial::get();


        $this->data['pageName'] = 'home';

        $this->data['pageView'] = 'pages.index';
        $this->data['footer'] = true;

        // return $this->data;


        return view('includes.site-master', $this->data);
    }

    public function getportfolio($id){
        $portfolio=Portfolio::find($id);
        return $portfolio;
    }

    // --------------------------------------- 
    // About 
    public function about_page(Request $request)
    {
     

        $this->data['sitecontent'] = get_page('about');
        $this->data['page_title'] = $this->data['sitecontent']['page_title'];

        $this->data['pageName'] = 'about';


        // Group locations under respective categories


        // // pr($this->data['locations']);

        $this->data['testimonial'] =Testimonial::get();
        $this->data['team'] =Team::get();

        $this->data['pageView'] = 'pages.about';
        $this->data['footer'] = true;
        // return $this->data;

        return view('includes.site-master', $this->data);
    }


    public function contact_page(Request $request)
    {
        // $token = $request->input('token', null);
        // $member = $this->authenticate_verify_token($token);

        $this->data['sitecontent'] = get_page('contact');
        $this->data['pageName'] = 'contact';

        $this->data['page_title'] = $this->data['sitecontent']['page_title'];
        $this->data['pageView'] = 'pages.contact';
        $this->data['footer'] = true;

        return view('includes.site-master', $this->data);
    }


    public function contact_store(Request $request){
        // return $request->all();
        // return response()->json('success'); 
        $res = array();
        $res['status'] = 0;
        $input = $request->all();
        if ($input) {
            // return $request->all();
            $request_data = [
                'email' => 'required|email',
                'name' => 'required',
                'lname' => 'required',
                'phone' => 'required',
                'msg' => 'required',
                'webemail' => 'required',
                // 'services' => 'required',
            ];
            // $custom_messages = [
            //     'services.required' => 'Please select at least one service from the list.'
            // ];

            $validator = Validator::make($input, $request_data);
            // $validator = Validator::make($input, $request_data);
            // json is null
            if ($validator->fails()) {
                $res['status'] = 0;
                $res['msg'] = 'Error >>' . $validator->errors();
            } else {
                // $services = json_decode($input['services']);
                $data = array(
                    'name' => $input['name'] . " " . $input['lname'],
                    'email' => $input['email'],
                    'phone' => $input['phone'],
                    'message' => $input['msg'],
                    'webemail' => $input['webemail'],
                    // 'services' => implode(",", $services),
                    'status' => 0
                );
                // pr($data);
                Contact::create($data);

                $emailData = [
                    'email_from' =>  $this->data['site_settings']->site_noreply_email,
                    'email_from_name' => $this->data['site_settings']->site_name,
                    'email_to' => $data['email'],
                    'email_to_name' => $data['name'],
                    'subject' => 'Your Query Received',
                    'content' => $data,
                ];

                $emailSent = send_email($emailData, 'contact');
                if ($emailSent) {
                    $res['status'] = 1;
                    $res['msg'] = 'Message sent successfully!';
                } else {
                    $res['status'] = 0;
                    $res['msg'] = 'Failed to send email.';
                }


                $res['status'] = 1;
                $res['msg'] = 'Message sent successfully!';
            }
        }
        // exit(json_encode($res)); 
        return response()->json($res);

    }


    public function service_page(Request $request)
    {
        // $token = $request->input('token', null);
        // $member = $this->authenticate_verify_token($token);

        $this->data['sitecontent'] = get_page('services');
        $this->data['pageName'] = 'services';

        $this->data['page_title'] = $this->data['sitecontent']['page_title'];
        $this->data['services'] =Service::get();
        $this->data['testimonial'] =Testimonial::get();
        $this->data['brand'] =Brand::get();


        $this->data['pageView'] = 'pages.service';
        $this->data['footer'] = true;
        // return $this->data;

        return view('includes.site-master', $this->data);
    }

    
    
    public function portfolio_page(Request $request)
    {
        // $token = $request->input('token', null);
        // $member = $this->authenticate_verify_token($token);

        $this->data['sitecontent'] = get_page('portfolios');
        $this->data['pageName'] = 'portfolio';

        $this->data['page_title'] = $this->data['sitecontent']['page_title'];
        $this->data['portfolio'] =Portfolio::get();

        $this->data['testimonial'] =Testimonial::get();
      


        $this->data['pageView'] = 'pages.portfolio';
        $this->data['footer'] = true;
        // return $this->data;

        return view('includes.site-master', $this->data);
    }

}
