<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Admin;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->data['site_settings'] = $this->getSiteSettings();
        $this->data['enable_editor'] = false;
        $this->data['enable_listing_script'] = false;
        $this->data['all_pages'] = get_pages();
        // $this->checkAchPaymentStatus();
        // $this->checkLeasePayments();

    }

    public function getSiteSettings()
    {
        return Admin::where('id', '=', 1)->first();
    }


    




}
