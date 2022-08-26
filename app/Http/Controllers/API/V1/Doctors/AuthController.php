<?php

namespace App\Http\Controllers\API\V1\Doctors;

use App\Models\User;
use App\Models\Clinic;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\Doctor\DoctorResource;
use App\Http\Requests\Api\Auth\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * Register new user
     * @param  RegisterRequest $request
     * @return mixed
     */
    public function register(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();
            $signature_image = null;
            if ($request->has('signature_image')) {
                $signature_image = upload($request->signature_image, 'clinics');
            }

            $doctor = User::create([
                'code' => generateRandomCode('DOC'),
                'full_name' => $request->full_name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'specialization_id' => $request->specialization_id,
                'birthday' => $request->birthday,
                'gender' => $request->gender,
                'country_id' => $request->country_id,
                'city_id' => $request->city_id,
                'lng' => $request->lng,
                'lat' => $request->lat,
                'avatar' => upload($request->avatar, 'doctors'),
            ]);

            Clinic::create([
                'code' => generateRandomCode('CNC'),
                'doctor_id' => $doctor->id,
                'describe_specialize' => $request->describe_specialize,
                'name' => $request->clinic_name,
                'doctor_name' => $request->doctor_name,
                'email' => $request->clinic_email,
                'mobile' => $request->clinic_mobile,
                'another_mobile' => $request->another_mobile,
                'whatsapp_number' => $request->whatsapp_number,
                'is_display' => $request->is_display,
                'signature_text' => $request->signature_text,
                'signature_image' => $signature_image,
                'logo' => upload($request->logo, 'clinics'),
                'attachment' => upload($request->attachment, 'clinics'),
            ]);

            $token = $doctor->createToken('Token-Doctor')->accessToken;

            $doctor->update(['remember_token' => $token]);

            DB::commit();

            return $this->respondWithItem(new DoctorResource($doctor));
        } catch (\Throwable $exception) {
            DB::rollBack();
            return $this->errorStatus($exception->getMessage());
        }
    }


    public function updateDoctor(Request $request, $id)
    {
        $doctor =  User::find($id);

        if (!$doctor) return $this->errorStatus(__("Not Found..!"));
        $doctor->update([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'specialization_id' => $request->specialization_id,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'avatar' => upload($request->avatar, 'doctors'),
        ]);
        return $this->successStatus();
    }
    public function updateClinic(Request $request, $id)
    {

        $clinic =  Clinic::find($id);

        if (!$clinic) return $this->errorStatus(__("Not Found..!"));
        $signature_image = null;
        if ($request->has('signature_image')) {
            $signature_image = upload($request->signature_image, 'clinics');
        }
        $clinic->update([
            'describe_specialize' => $request->describe_specialize,
            'name' => $request->clinic_name,
            'doctor_name' => $request->doctor_name,
            'email' => $request->clinic_email,
            'mobile' => $request->clinic_mobile,
            'another_mobile' => $request->another_mobile,
            'whatsapp_number' => $request->whatsapp_number,
            'is_display' => $request->is_display,
            'signature_text' => $request->signature_text,
            'signature_image' => $signature_image,
            'logo' => upload($request->logo, 'clinics'),
            'attachment' => upload($request->attachment, 'clinics'),
        ]);
        return $this->successStatus();
    }
}
