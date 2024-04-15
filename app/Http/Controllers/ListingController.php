<?php
namespace App\Http\Controllers;
use App\Models\Listing;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function dashboard(Request $request)
{
    $query = $request->input('query');

    $listings = Listing::where('name', 'like', '%' . $query . '%')->paginate(50);
    $categories = Category::all();

    return view('dashboard', [
        'listings' => $listings,
        'categories' => $categories,
    ]);
}
    public function index()
    {
        $listings = Listing::all();
        $categories = Category::all();

        return view('listing.index',[
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

        return view('listing.create', [
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
            'condition' => 'required|in:New & Unused,"Used, Like New",Small Wear,Major Wear,Parts Only',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string|min:5|max:1000',
            'user_id' => 'required|exists:users,id',
            'listing_image' => 'required|file|image'
        ];


        $request->validate($rules);
        // dd($request);


        $listing_image = $request->file('listing_image');
        $extension = $listing_image->getClientOriginalExtension();
        $filename = date('y-m-d-His') . '_' .  str_replace(' ', '_', $request->title) . '.' . $extension;


        $listing_image->storeAs('public/images', $filename);

        $listing = new Listing;
        $listing->title = $request->title;
        $listing->condition = $request->condition;
        $listing->price = $request->price;
        $listing->description = $request->description;
        $listing->category_id = $request->category_id;
        $listing->user_id = $request->user_id;
        $listing->save();

        return redirect()->route('listing.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $listing = Listing::FindOrFail($id);
        $listing_all = Listing::paginate(4);
        $categories = Category::all();

        return view('listing.show', [
            'listing' => $listing,
            'categories' => $categories,
            'listing_all' => $listing_all
        ]);

        
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listing = Listing::findOrFail($id);
    
        // Check if the authenticated user is the owner of the listing
        if ($listing->user_id !== Auth::id()) {
           
            return redirect()->route('listing.index')->with('error', 'You are not authorized to edit this listing.');
        }
    
        $categories = Category::all();
    
        return view('listing.edit', [
            'listing' => $listing,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $listing = Listing::findOrFail($id);
        //validation rules
        $rules = [
            'title' => 'required|string|min:2|max:150', //Checks that the title isnt the same as another title
            'condition' => 'required|in:New & Unused,"Used, Like New",Small Wear,Major Wear,Parts Only',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string|min:5|max:1000',
            'user_id' => 'required|exists:users,id',
            'listing_image' => 'required|file|image'

        ];
      
        $request->validate($rules);


        if($request->hasFile('listing_image')){
            $listing_image = $request->file('listing_image');
            $extension = $listing_image->getClientOriginalExtension();
            $filename = date('y-m-d-His') . '_' .  str_replace(' ', '_', $request->title) . '.' . $extension;


            $listing_image->storeAs('public/images', $filename);
            $listing->listing_image = $filename;

        }

        $listing->title = $request->title;
        $listing->condition = $request->condition;
        $listing->price = $request->price;
        $listing->description = $request->description;
        $listing->category_id = $request->category_id;
        $listing->user_id = $request->user_id;
        $listing->save();

        return redirect()
                ->route('listing.index')
                ->with('status', 'Updated listing!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $listing = Listing::findOrFail($id);
    
        // Check if the authenticated user is the owner of the listing
        if ($listing->user_id !== Auth::id()) {
            // If not, return an unauthorized response or redirect to a different page
            return redirect()->route('listing.index')->with('error', 'You are not authorized to delete this listing.');
        }
    
        $listing->delete();
    
        return redirect()->route('listing.index')->with('status', 'Listing deleted successfully');
    }
}
