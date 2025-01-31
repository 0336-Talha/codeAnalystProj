<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    public function index(){
        // has_access(5);
        $this->data['rows']=Contact::orderBy('id', 'DESC')->get();
        // return $this->data;
        return view('admin.contact',$this->data);
    }

    public function view($id){
        // has_access(5);
        $contact=Contact::find($id);
        $contact->status=1;
        $contact->update();
        $this->data['row']=$contact;
        // return $this->data;
        return view('admin.contact',$this->data);
    }

    public function delete($id){
        // has_access(5);
        $faq = Contact::find($id);
        $faq->delete();
        return redirect('admin/contact/')
                ->with('error','Message deleted Successfully');
    }
}
