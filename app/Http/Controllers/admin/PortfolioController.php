<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    //
    public function index(){
        // return "hi";
        $this->data['rows'] = Portfolio::get();
        // return $this->data;
        // return "hello";
        return view('admin.portfolios.index', $this->data);
    }

        //add testinomial.
        public function add(Request $request)
        {
         
            $input = $request->all();
            if ($input) {
                // dd($input);
                // return $input;
                $data = array();
                $request->validate([
                    'name' => 'required',
                    'detail' => 'required',
                  
    
    
                ]);
                if ($request->hasFile('image')) {
    
                    $request->validate([
                        'image' => 'mimes:png,jpg,jpeg,svg,gif,webp|max:40000'
                    ]);
                    $image = $request->file('image')->store('public/portfolio/');
                    // if (!empty(basename($image))) {
                    //     generateThumbnail('testinomial', basename($image), 'square', 'large');
                    //     $data['image'] = basename($image);
                    // }
    
                $data['image'] = basename($image);
    
                }
                // if (!empty($input['status'])) {
                //     $data['status'] = 1;
                // } else {
                //     $data['status'] = 0;
                // }
    
                $data['heading'] = $input['name'];
                $data['discription'] = $input['detail'];
              
    
             
                // pr($data);
                $id = Portfolio::create($data);
    
                return redirect('admin/portfolios')
                    ->with('success', 'Content Updated Successfully'); 
            }
            $this->data['enable_editor'] = true;
            // $this->data['categories'] = products_categories_model::where('status', 1)->get();
            return view('admin.portfolios.index', $this->data);
        }
    
    
        //edit and delete
        public function edit(Request $request, $id)
        {
            
            $test = Portfolio::find($id);
            $input = $request->all();
            // pr($input);
            if ($input) {
                $request->validate([
                    'name' => 'required',
                    'detail' => 'required',
                    // 'city' => 'required',
                ]);
                $data = array();
    
                if ($request->hasFile('image')) {
    
                    $request->validate([
                        'image' => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                    ]);
                    $image = $request->file('image')->store('public/portfolio/');
                    if (!empty($image)) {
                        removeImage("testinomial/" . $test->image);
                        // generateThumbnail('products', basename($image), 'square', 'large');
                        $test->image = basename($image);
                    }
                }
            
                $test['heading'] = $input['name'];
                $test['discription'] = $input['detail'];
                // $test['city_region'] = $input['city'];
    
    
                // pr($input['category']);
                $test->update();
                return redirect('/admin/portfolios/edit/' . $request->segment(4))
                    ->with('success', 'Content Updated Successfully');
            }
            $this->data['row'] = Portfolio::find($id);
            $this->data['enable_editor'] = true;
            // $this->data['categories'] = products_categories_model::where('status', 1)->get();
            // return $this->data;
            return view('admin.portfolios.index', $this->data);
        }
    
    
    
        public function delete($id)
        {
            // $products = Products_model::find($id);
            $test = Portfolio::find($id);
            removeImage("portfolios/" . $test->image);
            $test->delete();
            return redirect('admin/portfolios/')
                ->with('error', 'Content deleted Successfully');
        }
}
