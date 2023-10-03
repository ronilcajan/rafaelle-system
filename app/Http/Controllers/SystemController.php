<?php

namespace App\Http\Controllers;

use App\Http\Requests\SystemFormRequest;
use App\Models\System;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $systems = System::latest()->paginate(10);

        return view('dashboard',[
            'systems' =>  $systems
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SystemFormRequest $request)
    {
        $validate = $request->validated();
        
        $validate['publish'] = $request->publish ? true : false;

        if($request->hasFile('logo')){
            $validate['logo'] = $request->file('logo')->store('system','public');
        }

        System::create($validate);

        return redirect()->back()->with('status', 'Created successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SystemFormRequest $request)
    {
        $validate = $request->validated();
        

        if($request->hasFile('logo')){
            $validate['logo'] = $request->file('logo')->store('system','public');
        }

        $validate['publish'] = $request->publish ? true : false;

        System::find($request->system_id)->update($validate);

        return redirect()->back()->with('status', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        System::destroy($request->system_id);

        return redirect()->back()->with('status', 'Deleted successfully!');

    }
}