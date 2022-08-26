<?php

namespace App\Http\Controllers\API\V1\Services;

use Throwable;
use Illuminate\Http\Request;
use App\Models\O2Saturation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\V1\General\ConstantController;
use App\Http\Requests\Api\Services\O2Saturation\StoreRequest;
use App\Http\Requests\Api\Services\O2Saturation\UpdateRequest;
use App\Http\Resources\Services\O2Saturation\O2SaturationResource;
use App\Http\Resources\Services\O2Saturation\O2SaturationLargeResource;

class O2SaturationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        return $this->respondWithCollection(
            O2SaturationResource::collection(
                O2Saturation::patient()->when($request->filled('from') && $request->filled('to'), function ($query) use ($request) {
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
            $O2Saturation = O2Saturation::create($request->validated());

            $O2Saturation->addMedia();

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
        $O2Saturation = O2Saturation::find($id);

        if (!$O2Saturation) return $this->errorStatus(__("Not Found..!"));

        return $this->respondWithItem(new O2SaturationLargeResource($O2Saturation));
    }
   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getO2SaturationLevel(Request $request)
    {
        $O2Saturations = O2Saturation::patient()
            ->pluck('result', 'created_at');

        if (!$O2Saturations) return $this->errorStatus(__("Not Found..!"));

        return $this->respondWithCollection($O2Saturations);
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
        $O2Saturation =  O2Saturation::find($id);

        if (!$O2Saturation) return $this->errorStatus(__("Not Found..!"));

        try {
            DB::beginTransaction();

            $O2Saturation->update($request->validated());

            $O2Saturation->addMedia();

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
