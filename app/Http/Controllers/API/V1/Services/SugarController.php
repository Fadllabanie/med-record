<?php

namespace App\Http\Controllers\API\V1\Services;

use Throwable;
use App\Models\Sugar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\Services\Sugar\SugarResource;
use App\Http\Requests\Api\Services\Sugar\StoreRequest;
use App\Http\Requests\Api\Services\Sugar\UpdateRequest;
use App\Http\Resources\Services\Sugar\SugarLargeResource;
use App\Http\Controllers\API\V1\General\ConstantController;

class SugarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->respondWithCollection(
            SugarResource::collection(
                Sugar::patient()
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

            $sugar = Sugar::create($request->validated());

            $sugar->addMedia();

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
        $sugar = Sugar::find($id);

        if (!$sugar) return $this->errorStatus(__("Not Found..!"));

        return $this->respondWithItem(new SugarLargeResource($sugar));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSugarLevel(Request $request)
    {
        $sugarLevels = Sugar::patient()
            ->pluck('sugar_level', 'created_at');

        if (!$sugarLevels) return $this->errorStatus(__("Not Found..!"));

        return $this->respondWithCollection($sugarLevels);
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
        $sugar =  Sugar::find($id);

        if (!$sugar) return $this->errorStatus(__("Not Found..!"));

        try {
            DB::beginTransaction();

            $sugar->update($request->validated());

            $sugar->addMedia();

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
