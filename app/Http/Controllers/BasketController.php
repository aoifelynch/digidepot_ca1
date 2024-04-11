<?php
namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Basket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $baskets = Basket::all();
        $listings = Listing::all();

        return view('basket.index', [
            'listings' => $listings,
            'baskets' => $baskets
        ]);
    }

    // Show the specified resource
    public function show(string $id)
    {
        $basket = Basket::findOrFail($id);
        $listing = $basket->listing;

        return view('basket.show', [
            'listing' => $listing,
            'basket' => $basket
        ]);
    }

    // Add an item to the basket
    public function addToBasket(Request $request)
    {
        // Get the listing ID from the request
        $listingId = $request->input('listing_id');
    
        // Get the authenticated user's ID
        $userId = Auth::id();
    
        // Find the basket for the user
        $basket = Basket::where('user_id', $userId)->first();
    
        // If the basket doesn't exist for the user, create one
        if (!$basket) {
            $basket = Basket::create([
                'user_id' => $userId,
            ]);
        }
    
        // Attach the listing to the basket
        $basket->listings()->attach($listingId);
    
        // Optionally, you can redirect the user back to the listing page or anywhere else
        return redirect()->back()->with('success', 'Item added to basket successfully!');
    }
    
    

    // Remove the specified resource from storage
    public function destroy(string $basketId, string $listingId)
    {
        $basket = Basket::findOrFail($basketId);
        $basket->listings()->detach($listingId);
    
        // Optionally, if the basket becomes empty after removing the item, you can delete the basket
        if ($basket->listings()->count() === 0) {
            $basket->delete();
        }
    
        return redirect()->route('basket.index')->with('status', 'Item removed from basket successfully');
    }
    
}
