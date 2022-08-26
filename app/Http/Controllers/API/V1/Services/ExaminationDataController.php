<?php

namespace App\Http\Controllers\API\V1\Services;

use Throwable;
use Illuminate\Http\Request;
use App\Models\ExaminationData;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ExaminationDataController extends Controller
{

    public function create(Request $request)
    {
        try {
            DB::beginTransaction();

            $examinationData = ExaminationData::create($request->validated());

            $examinationData->addMedia();

            DB::commit();

            return $this->successStatus(__('Success Request'));
        } catch (Throwable $exception) {
            DB::rollBack();

            return $this->errorStatus($exception->getMessage());
        }
    }
    public function update(Request $request, $id)
    {
        $examinationData =  ExaminationData::find($id);

        if (!$examinationData) return $this->errorStatus(__("Not Found..!"));

        try {
            DB::beginTransaction();

            $examinationData->update($request->validated());

            $examinationData->addMedia();

            DB::commit();

            return $this->successStatus(__('Success Request'));
        } catch (Throwable $exception) {
            DB::rollBack();

            return $this->errorStatus($exception->getMessage());
        }
    }
}
