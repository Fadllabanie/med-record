<?php

namespace App\Http\Controllers\API\V1\Services;

use Throwable;
use Illuminate\Http\Request;
use App\Models\Temperature;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\V1\General\ConstantController;
use App\Http\Requests\Api\Services\Temperature\StoreRequest;
use App\Http\Requests\Api\Services\Temperature\UpdateRequest;
use App\Http\Resources\Services\Temperature\TemperatureResource;
use App\Http\Resources\Services\Temperature\TemperatureLargeResource;

class TemperatureController extends Controller
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
            TemperatureResource::collection(
                Temperature::patient()->when($request->filled('from') && $request->filled('to'), function ($query) use ($request) {
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
            $temperature = Temperature::create($request->validated());

            $temperature->addMedia();

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
        $temperature = Temperature::find($id);

        if (!$temperature) return $this->errorStatus(__("Not Found..!"));

        return $this->respondWithItem(new TemperatureLargeResource($temperature));
        */
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getTemperatureLevel(Request $request)
    {
        $temperatures = Temperature::patient()
            ->pluck('lower_bound_beats', 'created_at');

        if (!$temperatures) return $this->errorStatus(__("Not Found..!"));

        return $this->respondWithCollection($temperatures);
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
        $temperature =  Temperature::find($id);

        if (!$temperature) return $this->errorStatus(__("Not Found..!"));

        try {
            DB::beginTransaction();

            $temperature->update($request->validated());

            $temperature->addMedia();

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
