<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
class BrandController extends Controller
{
    //

    public function index()
    {
   
        $this->data['rows'] = Brand::get();
        // return $this->data;
        // return "hello";
        return view('admin.brands.index', $this->data);
    }


    public function add(Request $request)
    {
     
        $input = $request->all();
        if ($input) {
            $request->validate([
                'name' => 'required',
                'image'=>'required',
            ]);
            // dd($input);
            // return $input;
            $data = array();
            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => 'mimes:png,jpg,jpeg,svg,gif,webp|max:40000'
                ]);
                
                $image = $request->file('image')->store('public/brand/');
                // if (!empty(basename($image))) {
                //     generateThumbnail('testinomial', basename($image), 'square', 'large');
                //     $data['image'] = basename($image);
                // }

            $data['image'] = basename($image);

            }
            

            $data['name'] = $input['name'];
          


            $id = Brand::create($data);

            // return $id;
            // dd($error->all());

            return redirect('/admin/brands')
                ->with('success', 'Content Updated Successfully'); 
        }
        // $this->data['enable_editor'] = false;
        // $this->data['all_pages'] = false;

        // $this->data['categories'] = products_categories_model::where('status', 1)->get();
        // return $this->data;
        return view('admin.brands.index', $this->data);
    }



    public function edit(Request $request, $id)
    {
        
        $lang = Brand::find($id);
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
                $image = $request->file('image')->store('public/brand/');
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

            return redirect('/admin/brands/edit/' . $request->segment(4))
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Brand::find($id);
        // $this->data['enable_editor'] = false;
        
        // $this->data['categories'] = products_categories_model::where('status', 1)->get();
         // return $this->data;
        return view('admin.brands.index', $this->data);
    }

    public function delete($id)
    {
        // $products = Products_model::find($id);
        $test = Brands::find($id);
        removeImage("brand/" . $test->image);
        $test->delete();
        return redirect('admin/brands/')
            ->with('error', 'Content deleted Successfully');
    }

}
