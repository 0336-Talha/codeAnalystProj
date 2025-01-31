<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;

class LanguagesController extends Controller
{
    //
    public function index()
    {
   
        $this->data['rows'] = Language::get();
        // return $this->data;
        // return "hello";
        return view('admin.langs.index', $this->data);
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
                
                $image = $request->file('image')->store('public/lang/');
                // if (!empty(basename($image))) {
                //     generateThumbnail('testinomial', basename($image), 'square', 'large');
                //     $data['image'] = basename($image);
                // }

            $data['image'] = basename($image);

            }
            

            $data['name'] = $input['name'];
          


            $id = Language::create($data);

            // return $id;
            // dd($error->all());

            return redirect('/admin/langs')
                ->with('success', 'Content Updated Successfully'); 
        }
        // $this->data['enable_editor'] = false;
        // $this->data['all_pages'] = false;

        // $this->data['categories'] = products_categories_model::where('status', 1)->get();
        // return $this->data;
        return view('admin.langs.index', $this->data);
    }



    public function edit(Request $request, $id)
    {
        
        $lang = Language::find($id);
        $input = $request->all();
        // pr($input);
        if ($input) {
            $request->validate([
                'name' => 'required',
                'image'=>'required',
            ]);
            
            $data = array();
            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => 'mimes:png,jpg,jpeg,svg,gif,webp|max:40000'
                ]);
                $image = $request->file('image')->store('public/lang/');
                if (!empty($image)) {
                    removeImage("lang/" . $lang->image);
                    // generateThumbnail('products', basename($image), 'square', 'large');
                    $lang->image = basename($image);
                }
            }
        
            $lang['name'] = $input['name'];
            
            
            // $id = Team::create($data);


            // pr($input['category']);
            $lang->update();

            return redirect('/admin/langs/edit/' . $request->segment(4))
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Language::find($id);
        // $this->data['enable_editor'] = false;
        
        // $this->data['categories'] = products_categories_model::where('status', 1)->get();
         // return $this->data;
        return view('admin.langs.index', $this->data);
    }

    public function delete($id)
    {
        // $products = Products_model::find($id);
        $test = Language::find($id);
        removeImage("lang/" . $test->image);
        $test->delete();
        return redirect('admin/langs/')
            ->with('error', 'Content deleted Successfully');
    }

}
