<?php

namespace App\Http\Controllers\API\V1\Services;

use Throwable;
use App\Models\Surgery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Services\Surgery\StoreRequest;
use App\Http\Resources\Services\Surgery\SurgeryResource;
use App\Http\Requests\Api\Services\Surgery\UpdateRequest;
use App\Http\Controllers\API\V1\General\ConstantController;
use App\Http\Resources\Services\Surgery\SurgeryLargeResource;

class SurgeryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->respondWithCollection(
            SurgeryResource::collection(
                Surgery::patient()
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

            $surgery = Surgery::create($request->validated());

            $surgery->addMedia();

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
        $surgery =  Surgery::find($id);

        if (!$surgery) return $this->errorStatus(__("Not Found..!"));

        return $this->respondWithItem(new SurgeryLargeResource($surgery));
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
         $surgery =  Surgery::find($id);

        if (!$surgery) return $this->errorStatus(__("Not Found..!"));

        try {
            DB::beginTransaction();

            $surgery->update($request->validated());

            $surgery->addMedia();

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
