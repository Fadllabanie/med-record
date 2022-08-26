<?php

namespace App\Http\Controllers\API\V1\Services;

use Throwable;
use Illuminate\Http\Request;
use App\Models\BloodPressure;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\V1\General\ConstantController;
use App\Http\Requests\Api\Services\BloodPressure\StoreRequest;
use App\Http\Requests\Api\Services\BloodPressure\UpdateRequest;
use App\Http\Resources\Services\BloodPressure\BloodPressureResource;
use App\Http\Resources\Services\BloodPressure\BloodPressureLargeResource;

class BloodPressureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        return $this->respondWithCollection(
            BloodPressureResource::collection(
                BloodPressure::patient()->when($request->filled('from') && $request->filled('to'), function ($query) use ($request) {
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
            $bloodPressure = BloodPressure::create($request->validated());

            $bloodPressure->addMedia();

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
        $bloodPressure = BloodPressure::find($id);

        if (!$bloodPressure) return $this->errorStatus(__("Not Found..!"));

        return $this->respondWithItem(new BloodPressureLargeResource($bloodPressure));
    }
   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getBloodPressureLevel(Request $request)
    {
        $bloodPressures = BloodPressure::patient()
            ->pluck('lower_bound_beats', 'created_at');

        if (!$bloodPressures) return $this->errorStatus(__("Not Found..!"));

        return $this->respondWithCollection($bloodPressures);
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
        $bloodPressure =  BloodPressure::find($id);

        if (!$bloodPressure) return $this->errorStatus(__("Not Found..!"));

        try {
            DB::beginTransaction();

            $bloodPressure->update($request->validated());

            $bloodPressure->addMedia();

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
