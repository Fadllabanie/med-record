<?php

namespace App\Http\Controllers\API\V1\Doctors;

use App\Models\PrintingSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\PrintingSettingRequest;

class PrintingSettingController extends Controller
{
    public function __invoke(PrintingSettingRequest $request)
    {
        PrintingSetting::updateOrCreate(
            ['doctor_id' => Auth::id()],
            [
                'left' =>  $request->left,
                'right' => $request->right,
                'top' => $request->top,
                'bottom' =>  $request->bottom,
                'add_signature' => $request->add_signature,
                'add_diagnosis' => $request->add_diagnosis,
                'settings' => $request->settings,
            ]
        );
        return $this->successStatus();
    }
}
