<?php

namespace App\Http\Controllers\API\V1\Services;

use Throwable;
use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\V1\General\ConstantController;
use App\Http\Requests\Api\Services\Note\StoreRequest;
use App\Http\Requests\Api\Services\Note\UpdateRequest;
use App\Http\Resources\Services\Note\NoteResource;
use App\Http\Resources\Services\Note\NoteLargeResource;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        return $this->respondWithCollection(
            NoteResource::collection(
                Note::patient()->when($request->filled('from') && $request->filled('to'), function ($query) use ($request) {
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
            $note = Note::create($request->validated());

            $note->addMedia();

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
        $note = Note::find($id);

        if (!$note) return $this->errorStatus(__("Not Found..!"));

        return $this->respondWithItem(new NoteLargeResource($note));
    }
   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getNoteLevel(Request $request)
    {
        $notes = Note::patient()
            ->pluck('lower_bound_beats', 'created_at');

        if (!$notes) return $this->errorStatus(__("Not Found..!"));

        return $this->respondWithCollection($notes);
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
        $note =  Note::find($id);

        if (!$note) return $this->errorStatus(__("Not Found..!"));

        try {
            DB::beginTransaction();

            $note->update($request->validated());

            $note->addMedia();

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
