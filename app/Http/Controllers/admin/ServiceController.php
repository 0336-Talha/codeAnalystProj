<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;

class ServiceController extends Controller
{
    //

    public function index()
    {
   
        $this->data['rows'] = Service::latest()->get();
        // return $this->data;
        // return "hello";
        return view('admin.services.index', $this->data);
    }


    public function add(Request $request)
    {
     
        $input = $request->all();
        if ($input) {
            $request->validate([
                'name' => 'required',
                'image'=>'required',
                'category'=>'required'
            ]);
            // dd($input);
            // return $input;
            $data = array();
            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => 'mimes:png,jpg,jpeg,svg,gif,webp|max:40000'
                ]);
                
                $image = $request->file('image')->store('public/service/');
                // if (!empty(basename($image))) {
                //     generateThumbnail('testinomial', basename($image), 'square', 'large');
                //     $data['image'] = basename($image);
                // }

            $data['image'] = basename($image);

            }
            

            $data['name'] = $input['name'];
          
            $data['category']=$input['category'];

            $id = Service::create($data);

            // return $id;
            // dd($error->all());

            return redirect('/admin/services')
                ->with('success', 'Content Updated Successfully'); 
        }
        // $this->data['enable_editor'] = false;
        // $this->data['all_pages'] = false;

        // $this->data['categories'] = products_categories_model::where('status', 1)->get();
        // return $this->data;
        return view('admin.services.index', $this->data);
    }



    public function edit(Request $request, $id)
    {
        
        $lang = Service::find($id);
        $input = $request->all();
        // pr($input);
        if ($input) {
            $request->validate([
                'name' => 'required',
                // 'image'=>'required',
            ]);
            
            $data = array();
            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => 'mimes:png,jpg,jpeg,svg,gif,webp|max:40000'
                ]);
                $image = $request->file('image')->store('public/service/');
                if (!empty($image)) {
                    removeImage("service/" . $lang->image);
                    // generateThumbnail('products', basename($image), 'square', 'large');
                    $lang->image = basename($image);
                }
            }
        
            $lang['name'] = $input['name'];
            
            
            // $id = Team::create($data);


            // pr($input['category']);
            $lang->update();

            return redirect('/admin/services/edit/' . $request->segment(4))
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Service::find($id);
        // $this->data['enable_editor'] = false;
        
        // $this->data['categories'] = products_categories_model::where('status', 1)->get();
         // return $this->data;
        return view('admin.services.index', $this->data);
    }

    public function delete($id)
    {
        // $products = Products_model::find($id);
        $test = Service::find($id);
        removeImage("service/" . $test->image);
        $test->delete();
        return redirect('admin/services/')
            ->with('error', 'Content deleted Successfully');
    }

}
