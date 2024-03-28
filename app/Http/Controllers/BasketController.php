<?php
namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Category;
use App\Models\Basket;
use App\Http\Controllers\Controller;

//THIS HAS NOT BEEN UPDATED IGNORE

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        $listings = Listing::all();
        $categories = Category::all();

        return view('user.listing.index',[
            'listings' => $listings,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('user.listing.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $rules = [
            'title' => 'required|string|min:2|max:150', //Checks that the title isnt the same as another title
            'condition' => 'required|in:New & Unused, Used - Like New, Small Wear, Major Wear, Parts Only',
            'price' => 'required|decimal',
            'category_id' => 'required|exists:category,id',
            'description' => 'required|string|min:5|max:1000',
            'animation_studio' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'listing_image' => 'required|file|image'
        ];


        $request->validate($rules);
        // dd($request);


        $listing_image = $request->file('listing_image');
        $extension = $listing_image->getClientOriginalExtension();
        $filename = date('y-m-d-His') . '_' .  str_replace(' ', '_', $request->title) . '.' . $extension;


        $listing_image->storeAs('public/images', $filename);


        $listing = listing::create([
            'title' => $request->title,
            'condition' => $request->condition,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'listing_image' => $filename
        ]);

        return to_route('user.listing.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $listing = Listing::FindOrFail($id);

        $categories = Category::all();

        return view('user.listing.show', [
            'listing' => $listing,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listing = Listing::FindOrFail($id);
        $categories = Category::all();

        // dd($selectedcategories);

        return view('user.listing.edit', [
            'listing' => $listing,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
                // dd($request->title);
        $listing = listing::findOrFail($id);
        //validation rules
        $rules = [
            'title' => 'required|string|min:2|max:150', //Checks that the title isnt the same as another title
            'condition' => 'required|in:New & Unused, Used - Like New, Small Wear, Major Wear, Parts Only',
            'price' => 'required|decimal',
            'category_id' => 'required|exists:category,id',
            'description' => 'required|string|min:5|max:1000',
            'animation_studio' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'listing_image' => 'required|file|image'

        ];
        ////////
        $request->validate($rules);


        if($request->hasFile('listing_image')){
            $listing_image = $request->file('listing_image');
            $extension = $listing_image->getClientOriginalExtension();
            $filename = date('y-m-d-His') . '_' .  str_replace(' ', '_', $request->title) . '.' . $extension;


            $listing_image->storeAs('public/images', $filename);
            $listing->listing_image = $filename;

        }

        

        // dd($request);


        $listing->title = $request->title;
        $listing->condition = $request->condition;
        $listing->price = $request->price;
        $listing->description = $request->description;
        $listing->category_id = $request->category_id;
        $listing->user_id = $request->user_id;
        $listing->save();

        return redirect()
                ->route('user.listing.index')
                ->with('status', 'Updated listing!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $listing = listing::findOrFail($id);

        $listing->delete();

        return redirect()->route('user.listing.index')->with('status', 'listing deleted successfully');
    }
}
