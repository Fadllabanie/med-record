<?php

namespace App\Http\Controllers\API\V1\General;


use App\Models\Country;
use App\Models\Specialization;
use App\Http\Controllers\Controller;
use App\Http\Resources\Constants\Countries\CountryCollection;
use App\Http\Resources\Constants\Specializations\SpecializationCollection;

class ConstantController extends Controller
{

    const LARGE_PAGINATE = 12;
    const TINY_PAGINATE = 8;

    const SEARCH_TYPE = ['full_name','code','mobile'];

    public function country()
    {
        
        $data = Country::with('cities')->get();

        return new CountryCollection($data);
    }

    public function specialization()
    {

        $data = Specialization::get();

        return new SpecializationCollection($data);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['countries'] = Country::with('cities')->active()->get();

        return $this->respondWithCollection($data);
    }
}
