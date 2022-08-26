<?php

namespace App\Http\Controllers\API\V1\Doctors;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AppSetting;
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{

    public function doctorDetails()
    {

        return $this->respondWithItem(User::with('clinics')->find(Auth::id()));
    }


    public function contactUs(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);

        ## send mail 
        ## or 
        ## save in DB

        return $this->successStatus();
    }

    public function getAppSetting(Request $request)
    {
      
        $data = AppSetting::where('key',$request->key)->first();
       
        return $this->respondWithItem($data);
    }
}
