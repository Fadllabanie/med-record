<?php

use App\Models\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\Doctors\AuthController;
use App\Http\Controllers\API\V1\Services\NoteController;
use App\Http\Controllers\API\V1\Services\SugarController;
use App\Http\Controllers\API\V1\Doctors\GeneralController;
use App\Http\Controllers\API\V1\Doctors\PatientController;
use App\Http\Controllers\API\V1\Services\FamilyController;
use App\Http\Controllers\API\V1\General\ConstantController;
use App\Http\Controllers\API\V1\Services\SurgeryController;
use App\Http\Controllers\API\V1\Services\VaccineController;
use App\Http\Controllers\API\V1\Services\PathologyController;
use App\Http\Controllers\API\V1\Services\MedicalTestController;
use App\Http\Controllers\API\V1\Services\O2SaturationController;
use App\Http\Controllers\API\V1\Services\PrescriptionController;
use App\Http\Controllers\API\V1\Services\BloodPressureController;
use App\Http\Controllers\API\V1\Doctors\PrintingSettingController;
use App\Http\Controllers\API\V1\Services\ExaminationDataController;
use App\Http\Controllers\API\V1\Services\CholesterolTriglycerideController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {
    Route::get('countries', [ConstantController::class, 'country']);
    Route::get('specializations', [ConstantController::class, 'specialization']);
    Route::post('signup-doctor', [AuthController::class, 'register']);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::apiResource('patients', PatientController::class);
        Route::apiResource('pathologies', PathologyController::class);
        Route::apiResource('prescriptions', PrescriptionController::class);
        Route::apiResource('medical-tests', MedicalTestController::class);
        Route::apiResource('vaccines', VaccineController::class);
        Route::apiResource('surgeries', SurgeryController::class);
        Route::apiResource('cholesterol-triglycerides', CholesterolTriglycerideController::class); 
        Route::apiResource('sugar', SugarController::class);
        Route::get('sugar-level', [SugarController::class,'getSugarLevel']);
        Route::apiResource('blood-pressure', BloodPressureController::class);
        Route::get('blood-pressure-level', [BloodPressureController::class,'getBloodPressureLevel']);
        Route::apiResource('o2-saturation', O2SaturationController::class);
        Route::get('o2-saturation-level', [O2SaturationController::class,'getO2SaturationLevel']);
        Route::apiResource('notes', NoteController::class);
        Route::apiResource('families', FamilyController::class);
        Route::apiResource('symptoms', Symptom::class);
        Route::apiResource('temperatures', TemperatureController::class);
        Route::apiResource('examinations-data', ExaminationDataController::class);
       
        Route::get('app-settings', [GeneralController::class,'getAppSetting']);

        Route::get('doctor-details', [GeneralController::class,'doctorDetails']);
        Route::POST('printing-setting', PrintingSettingController::class);
       
    });
});
