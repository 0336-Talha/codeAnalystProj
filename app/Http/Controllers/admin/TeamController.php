<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;



class TeamController extends Controller
{
    //
    public function index()
    {
   
        $this->data['rows'] = Team::latest()->get();
        // return $this->data;
        return view('admin.teams.index', $this->data);
    }

    public function add(Request $request)
    {
     
        $input = $request->all();
        if ($input) {
            $request->validate([
                'name' => 'required'
            ]);
            // dd($input);
            // return $input;
            $data = array();
            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => 'mimes:png,jpg,jpeg,svg,gif,webp|max:40000'
                ]);
                
                $image = $request->file('image')->store('public/team/');
                // if (!empty(basename($image))) {
                //     generateThumbnail('testinomial', basename($image), 'square', 'large');
                //     $data['image'] = basename($image);
                // }

            $data['image'] = basename($image);

            }
            

            $data['name'] = $input['name'];
            $data['facebook'] = $input['fb'];
            $data['linkdin'] = $input['link'];
            $data['skype'] = $input['skype'];
            $data['twitter'] = $input['twit'];


            $id = Team::create($data);

            // return $id;
            // dd($error->all());

            return redirect('/admin/teams')
                ->with('success', 'Content Updated Successfully'); 
        }
        // $this->data['enable_editor'] = false;
        $this->data['all_pages'] = false;

        // $this->data['categories'] = products_categories_model::where('status', 1)->get();
        // return $this->data;
        return view('admin.teams.index', $this->data);
    }



    //edit and delete
    public function edit(Request $request, $id)
    {
        
        $test = Team::find($id);
        $input = $request->all();
        // pr($input);
        if ($input) {
            $data = array();
            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => 'mimes:png,jpg,jpeg,svg,gif,webp|max:40000'
                ]);
                $image = $request->file('image')->store('public/team/');
                if (!empty($image)) {
                    removeImage("team/" . $test->image);
                    // generateThumbnail('products', basename($image), 'square', 'large');
                    $test->image = basename($image);
                }
            }
        
            $test['name'] = $input['name'];
            $test['facebook'] = $input['fb'];
            $test['linkdin'] = $input['link'];
            $test['skype'] = $input['skype'];
            $test['twitter'] = $input['twit'];

            // $id = Team::create($data);


            // pr($input['category']);
            $test->update();

            return redirect('/admin/teams/edit/' . $request->segment(4))
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Team::find($id);
        $this->data['enable_editor'] = false;
        // $this->data['categories'] = products_categories_model::where('status', 1)->get();
        // return $this->data;
        return view('admin.teams.index', $this->data);
    }



    public function delete($id)
    {
        // $products = Products_model::find($id);
        $test = Team::find($id);
        removeImage("team/" . $test->image);
        $test->delete();
        return redirect('admin/teams/')
            ->with('error', 'Content deleted Successfully');
    }

}
