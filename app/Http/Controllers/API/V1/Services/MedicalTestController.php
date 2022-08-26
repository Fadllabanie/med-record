<?php

namespace App\Http\Controllers\API\V1\Services;

use Throwable;
use App\Models\MedicalTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\V1\General\ConstantController;
use App\Http\Requests\Api\Services\MedicalTest\StoreRequest;
use App\Http\Requests\Api\Services\MedicalTest\UpdateRequest;
use App\Http\Resources\Services\MedicalTest\MedicalTestResource;
use App\Http\Resources\Services\MedicalTest\MedicalTestLargeResource;

class MedicalTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->respondWithCollection(
            MedicalTestResource::collection(
                MedicalTest::patient()->when($request->filled('from') && $request->filled('to'), function ($query) use ($request) {
                    $query->whereBetween('pickup_date', [$request->from, $request->to]);
                })->paginate(ConstantController::LARGE_PAGINATE)
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $medicalTest = MedicalTest::create($request->validated());

            $medicalTest->addMedia();

            DB::commit();

            return $this->successStatus(__('Success Request'));
        } catch (Throwable $exception) {
            DB::rollBack();

            return $this->errorStatus($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medicalTest = MedicalTest::find($id);

        if (!$medicalTest) return $this->errorStatus(__("Not Found..!"));

        return $this->respondWithItem(new MedicalTestLargeResource($medicalTest));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $medicalTest =  MedicalTest::find($id);

        if (!$medicalTest) return $this->errorStatus(__("Not Found..!"));

        try {
            DB::beginTransaction();

            $medicalTest->update($request->validated());

            $medicalTest->addMedia();

            DB::commit();

            return $this->successStatus(__('Success Request'));
        } catch (Throwable $exception) {
            DB::rollBack();

            return $this->errorStatus($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
