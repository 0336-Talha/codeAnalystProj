<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sitecontent;
class Pages extends Controller
{
    //
    public function index(){
       
        return view('admin.sitecontent',$this->data);

    }


    public function home(Request $request){
        // return $request->segment(3); /admin/pages/home 3rd is home.
        // return $request->all();
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){
        //  dd($request->all());

            $content_row = unserialize($page->code);
        //  dd($content_row);

            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 12; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif,webp|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }

            }
            $data = serialize(array_merge($content_row, $input));
            // pr($input);
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/sitecontent/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        // $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();
        // $this->data['sitecontent']=unserialize($this->data['row']->code);
        // return $this->data['row'];
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            
            $this->data['sitecontent']=array();
        }
        // return $this->data;
        return view('admin.website_pages.site_home',$this->data);
    }


    //about
    public function about(Request $request){
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){

            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 7; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif,webp|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }
                else{
                    // $input['image'.$i]='';
                }

            }
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/sitecontent/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }
        $this->data['enable_editor']=true;
        return view('admin.website_pages.site_about',$this->data);
    }


    //services
    public function services(Request $request){
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){

            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 1; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif,webp|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }
                else{
                    // $input['image'.$i]='';
                }

            }
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/sitecontent/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }
        $this->data['enable_editor']=true;
        return view('admin.website_pages.site_services',$this->data);
    }


    //portfolio
    public function portfolios(Request $request){
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){

            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 2; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif,webp|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }
                else{
                    // $input['image'.$i]='';
                }

            }
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/sitecontent/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }
        $this->data['enable_editor']=true;
        return view('admin.website_pages.site_portfolios',$this->data);
    }


    public function contact(Request $request){
    
        $page=Sitecontent::where('ckey',$request->segment(3))->first();
        if(empty($page)){
            $page = new Sitecontent;
            $page->ckey=$request->segment(3);
            $page->code='';
            $page->save();
        }
        $input = $request->all();
        if($input){

            $content_row = unserialize($page->code);
            if(!is_array($content_row))
                $content_row = array();
            for ($i = 1; $i <= 1; $i++) {
                if ($request->hasFile('image'.$i)) {

                    $request->validate([
                        'image'.$i => 'mimes:png,jpg,jpeg,svg,gif,webp|max:40000'
                    ]);
                    $image=$request->file('image'.$i)->store('public/images/');
                    if(!empty($image)){
                        $input['image'.$i]=basename($image);
                    }

                }

            }
            $data = serialize(array_merge($content_row, $input));
            $page->ckey=$request->segment(3);
            $page->code=$data;
            $page->save();
            return redirect('admin/sitecontent/'.$request->segment(3))
                ->with('success','Content Updated Successfully');
        }
        $this->data['row']=Sitecontent::where('ckey',$request->segment(3))->first();;
        if(!empty($this->data['row']->code)){
            $this->data['sitecontent']=unserialize($this->data['row']->code);
        }
        else{
            $this->data['sitecontent']=array();
        }
        $this->data['enable_editor']=true;
        return view('admin.website_pages.site_contact',$this->data);
    }

}
