<?php

namespace App\Http\Controllers;

use App\Models\Background;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;


class BackgroundController extends Controller
{

    public function index()
    {
        $backgrounds = Background::all();

        return view('background.showBackground', [
            'bkgs' => $backgrounds
        ]);
    }


    public function create()
    {
        
    }

    
    public function store(Request $request)
    {

        $request->validate([
            'bkgName' => 'required',
            'bkgPrice' => 'required',
        ]);

        Background::create([
            'bkg_name'       => $request->get('bkgName'),
            'bkg_price'      => $request->get('bkgPrice')
        ]);

        return to_route('bkg.background')->with('status',__('Background created successfully!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Background $background)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Background $bkg)
    {
        return view('background.editBackground', [
            'back' => $bkg
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Background $bkg)
    {
        $validated = $request->validate([
            'bkg_name' => 'required',
            'bkg_price' => ['required','min:1', 'max:4'],
        ]);

        $bkg->update($validated);

        return to_route('bkg.background')->with('status', __('Background edited successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Background $bkg)
    {   
        try{
            $this->authorize('delete',$bkg);
            $bkg->delete();
            return to_route('bkg.background')->with('status', __('Background deleted successfully!'));
        } catch (QueryException $e){
            return to_route('bkg.background')->with('error', __('Error deleting, background in use!'));
        }

    }
}
