<?php

namespace App\Http\Controllers\API\V1\Services;

use Throwable;
use Illuminate\Http\Request;
use App\Models\Symptom;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\V1\General\ConstantController;
use App\Http\Requests\Api\Services\Symptom\StoreRequest;
use App\Http\Requests\Api\Services\Symptom\UpdateRequest;
use App\Http\Resources\Services\Symptom\SymptomResource;
use App\Http\Resources\Services\Symptom\SymptomLargeResource;

class SymptomController extends Controller
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
            SymptomResource::collection(
                Symptom::patient()->when($request->filled('from') && $request->filled('to'), function ($query) use ($request) {
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
            $symptom = Symptom::create($request->validated());

            $symptom->addMedia();

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
       /* 
       $symptom = Symptom::find($id);

        if (!$symptom) return $this->errorStatus(__("Not Found..!"));

        return $this->respondWithItem(new SymptomLargeResource($symptom));
        */
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
        $symptom =  Symptom::find($id);

        if (!$symptom) return $this->errorStatus(__("Not Found..!"));

        try {
            DB::beginTransaction();

            $symptom->update($request->validated());

            $symptom->addMedia();

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
