<?php

namespace App\Http\Controllers\API\V1\Services;

use Throwable;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\V1\General\ConstantController;
use App\Http\Requests\Api\Services\Prescription\StoreRequest;
use App\Http\Requests\Api\Services\Prescription\UpdateRequest;
use App\Http\Resources\Services\Prescription\PrescriptionResource;
use App\Http\Resources\Services\Prescription\PrescriptionLargeResource;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->respondWithCollection(
            PrescriptionResource::collection(
                Prescription::patient()
                ->when($request->filled('form') && $request->filled('to'), function ($query) use ($request) {
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

            $prescription = Prescription::create($request->validated());

            $prescription->addMedia();

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
        $prescription = Prescription::find($id);

        if (!$prescription) return $this->errorStatus(__("Not Found..!"));

        return $this->respondWithItem(new PrescriptionLargeResource($prescription));
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
        $prescription =  Prescription::find($id);

        if (!$prescription) return $this->errorStatus(__("Not Found..!"));

        try {
            DB::beginTransaction();

            $prescription->update($request->validated());

            $prescription->addMedia();

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
