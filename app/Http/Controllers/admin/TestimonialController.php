<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    //

    public function index()
    {
   
        $this->data['rows'] = Testimonial::orderBy('order_no', 'ASC')->get();
        // return $this->data;
        return view('admin.testimonials.index', $this->data);
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
                'city' => 'required',


            ]);
            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                ]);
                $image = $request->file('image')->store('public/testinomial/');
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

            $data['name'] = $input['name'];
            $data['discription'] = $input['detail'];
            $data['city_region'] = $input['city'];

            $data['order_no'] = 0;


            // $data['meta_keywords'] = $input['meta_keywords'];
            // $data['tags']=$input['tags'];
            // $data['title'] = $input['title'];
            // $data['slug'] = checkSlug(Str::slug($data['title'], '-'), 'products');
            // $data['detail'] = $input['detail'];
            // $data['heading_1'] = $input['heading_1'];
            // $data['block_1'] = $input['block_1'];
            // $data['heading_2'] = $input['heading_2'];
            // $data['block_2'] = $input['block_2'];

            // pr($data);
            $id = Testimonial::create($data);

            return redirect('admin/testimonials')
                ->with('success', 'Content Updated Successfully'); 
        }
        $this->data['enable_editor'] = true;
        // $this->data['categories'] = products_categories_model::where('status', 1)->get();
        return view('admin.testimonials.index', $this->data);
    }


    //edit and delete
    public function edit(Request $request, $id)
    {
        
        $test = Testimonial::find($id);
        $input = $request->all();
        // pr($input);
        if ($input) {
            $request->validate([
                'name' => 'required',
                'detail' => 'required',
                'city' => 'required',
            ]);
            $data = array();

            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                ]);
                $image = $request->file('image')->store('public/testinomial/');
                if (!empty($image)) {
                    removeImage("testinomial/" . $test->image);
                    // generateThumbnail('products', basename($image), 'square', 'large');
                    $test->image = basename($image);
                }
            }
        
            $test['name'] = $input['name'];
            $test['discription'] = $input['detail'];
            $test['city_region'] = $input['city'];

            $test['order_no'] = 0;

            // pr($input['category']);
            $test->update();
            return redirect('/admin/testimonials/edit/' . $request->segment(4))
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Testimonial::find($id);
        $this->data['enable_editor'] = true;
        // $this->data['categories'] = products_categories_model::where('status', 1)->get();
        // return $this->data;
        return view('admin.testimonials.index', $this->data);
    }



    public function delete($id)
    {
        // $products = Products_model::find($id);
        $test = Testimonial::find($id);
        removeImage("testinomial/" . $test->image);
        $test->delete();
        return redirect('admin/testimonials/')
            ->with('error', 'Content deleted Successfully');
    }
}
