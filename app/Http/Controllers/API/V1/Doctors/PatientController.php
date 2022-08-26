<?php

namespace App\Http\Controllers\API\V1\Doctors;

use Throwable;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Api\Patients\StoreRequest;
use App\Http\Requests\Api\Patients\UpdateRequest;
use App\Http\Resources\Patients\PatientCollection;
use App\Http\Resources\Patients\PatientLargeResource;
use App\Http\Controllers\API\V1\General\ConstantController;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (!in_array($request->type, ConstantController::SEARCH_TYPE)) {
            return $this->errorStatus('Search Type Not Found..!');
        }

        return new PatientCollection(Patient::tenant()
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where($request->type, 'like', '%' . $request->search . '%');
                });
            })->paginate(ConstantController::LARGE_PAGINATE));
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

            $validatedData = $request->validated();
            $validatedData['avatar'] = $request->hasFile('avatar') ? $request->avatar->store('patients', 'public') : null;
            $validatedData['code'] = generateRandomCode('PTN');

            auth()->user()->patients()->create($validatedData);

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
        $patient = Patient::tenant()->find($id);

        if (!$patient) return $this->errorStatus(__("patient not found..!"));

        return $this->respondWithItem(new PatientLargeResource($patient));
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
        $patient =  Patient::find($id);

        if (!$patient) return $this->errorStatus(__("Patient Not Found..!"));

        try {
            DB::beginTransaction();

            if ($request->hasFile('avatar')) {
                if (Storage::disk('public')->exists($patient->avatar)) {
                    Storage::disk('public')->delete($patient->avatar);
                }
            }

            $validatedData = $request->validated();

            $validatedData['avatar'] = $request->hasFile('avatar') ? $request->avatar->store('patients', 'public') : $patient->avatar;

            $patient->update($validatedData);

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
