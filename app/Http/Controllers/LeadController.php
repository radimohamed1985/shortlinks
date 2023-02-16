<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myleads =Lead::where('compain_user_id',auth()->user()->id)->get();
        return view('myleads',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
      Lead::create($request->all());

       return redirect()->to($request->url2);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLeadRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeadRequest $request, Lead $lead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        //
    }
}
