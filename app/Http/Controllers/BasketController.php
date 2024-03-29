<?php
namespace App\Http\Controllers;
use App\Models\Listing;
use App\Models\Basket;
use Illuminate\Http\Request;


class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $baskets = Basket::all();
        $listings = Listing::all();

        return view('basket.show',[
            'listings' => $listings,
            'baskets' => $baskets
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listing = Listing::FindOrFail($id);
        $baskets = Basket::all();

        // dd($selectedcategories);

        return view('basket.show', [
            'listing' => $listing,
            'baskets' => $baskets,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
                // dd($request->title);
        $basket = Basket::findOrFail($id);
        //validation rules
        $rules = [
            'listing_id' => 'required|exists:listing,id',
            'user_id' => 'required|exists:users,id',

        ];
        ////////
        $request->validate($rules);

        $basket->listing_id = $request->listing_id;
        $basket->user_id = $request->user_id;
        $basket->save();

        return redirect()
                ->route('basket.show')
                ->with('status', 'Updated listing!');

        }

        public function destroy(string $id)
        {
            $basket = Basket::findOrFail($id);
    
            $basket->delete();
    
            return redirect()->route('basket.show')->with('status', 'listing deleted successfully');
        }
    }

