<?php

namespace App\Http\Controllers\API\V1\Services;

use Throwable;
use App\Models\CholesterolTriglyceride;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\Services\CholesterolTriglyceride\CholesterolTriglycerideResource;
use App\Http\Requests\Api\Services\CholesterolTriglyceride\StoreRequest;
use App\Http\Requests\Api\Services\CholesterolTriglyceride\UpdateRequest;
use App\Http\Resources\Services\CholesterolTriglyceride\CholesterolTriglycerideLargeResource;
use App\Http\Controllers\API\V1\General\ConstantController;

class CholesterolTriglycerideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->respondWithCollection(
            CholesterolTriglycerideResource::collection(
                CholesterolTriglyceride::patient()
                ->when($request->filled('from') && $request->filled('to'), function ($query) use ($request) {
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

            $cholesterolTriglyceride = CholesterolTriglyceride::create($request->validated());

            $cholesterolTriglyceride->addMedia();

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
        $cholesterolTriglyceride = CholesterolTriglyceride::find($id);

        if (!$cholesterolTriglyceride) return $this->errorStatus(__("Not Found..!"));

        return $this->respondWithItem(new CholesterolTriglycerideLargeResource($cholesterolTriglyceride));
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
        $cholesterolTriglyceride =  CholesterolTriglyceride::find($id);

        if (!$cholesterolTriglyceride) return $this->errorStatus(__("Not Found..!"));

        try {
            DB::beginTransaction();

            $cholesterolTriglyceride->update($request->validated());

            $cholesterolTriglyceride->addMedia();

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
