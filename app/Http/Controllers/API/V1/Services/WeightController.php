<?php

namespace App\Http\Controllers\API\V1\Services;

use Throwable;
use Illuminate\Http\Request;
use App\Models\Weight;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\V1\General\ConstantController;
use App\Http\Requests\Api\Services\Weight\StoreRequest;
use App\Http\Requests\Api\Services\Weight\UpdateRequest;
use App\Http\Resources\Services\Weight\WeightResource;
use App\Http\Resources\Services\Weight\WeightLargeResource;

class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*
        return $this->respondWithCollection(
            WeightResource::collection(
                Weight::patient()->when($request->filled('from') && $request->filled('to'), function ($query) use ($request) {
                    $query->whereBetween('pickup_date', [$request->from, $request->to]);
                })->paginate(ConstantController::LARGE_PAGINATE)
            )
        );*/
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
            $weight = Weight::create($request->validated());

            $weight->addMedia();

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
    {/*
        $weight = Weight::find($id);

        if (!$weight) return $this->errorStatus(__("Not Found..!"));

        return $this->respondWithItem(new WeightLargeResource($weight));
        */
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getWeightLevel(Request $request)
    {
        $weights = Weight::patient()
            ->pluck('lower_bound_beats', 'created_at');

        if (!$weights) return $this->errorStatus(__("Not Found..!"));

        return $this->respondWithCollection($weights);
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
        $weight =  Weight::find($id);

        if (!$weight) return $this->errorStatus(__("Not Found..!"));

        try {
            DB::beginTransaction();

            $weight->update($request->validated());

            $weight->addMedia();

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
