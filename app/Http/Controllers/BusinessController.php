<?php

namespace App\Http\Controllers;

use Image;
use File;
use Auth;
use Carbon\Carbon;
use App\Category;
use App\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusinessController extends Controller
{
    public function index(Request $request, $categorySlug = null)
    {
        if ($categorySlug) {
            $categoryId = Category::where('slug', $categorySlug)->first()->id;

            $listings = Business::where('category_id', $categoryId)->paginate(10);
        } else {
             if ($request->has('recent')) {
                $listings = Business::whereDate('created_at', Carbon::today())->paginate(10);
            } else {
                $listings = Business::orderBy('created_at', 'desc')->paginate(10);
            }
        }


        return view('welcome', compact('listings'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('pages.businesses.create', compact('categories'));
    }


    public function store(Request $request)
    {
        // $this->authorize('limit', $business);

        $request->validate([
            'name' => 'required | max:200',
            'description' => 'required | max:255',
            'product_info' => 'required | max:100',
            'delivery_info' => 'required | max:255',
            'category_id' => 'required',
            'link' => 'nullable | url',
            'address_one' => 'required | max:255',
            'address_two' => 'required | max:255',
            'town' => 'required | max:255',
            'postcode' => 'required | max:10',
            'image_path' => 'required | mimes:jpeg,png,svg | max:1024'
        ]);

        $business = new Business();

        $business->name = request('name');
        $business->description = request('description');
        $business->product_info = request('product_info');
        $business->delivery_info = request('delivery_info');
        $business->category_id = request('category_id');
        $business->link = request('link');
        $business->address_one = request('address_one');
        $business->address_two = request('address_two');
        $business->town = request('town');
        $business->postcode = request('postcode');
        $business->user_id = auth()->id();

        //Image upload
        $image = Image::make($request->file('image_path'));
        $image->fit(1280, 768);
        $path_for_db = 'images/' . Auth::user()->slug . '/' . Carbon::now()->format('YmdHs') . '.' . $request->file('image_path')
                    ->getClientOriginalExtension();
        $path_for_storage = 'public/' . $path_for_db;

        Storage::put($path_for_storage, $image->stream(), 'public');

        $business->image_path = $path_for_db;

        //Ownership checkbox
        if($request['owner']) {
            $business->owner = true;
            $business->save();
        } else {
            $business->owner = false;
            $business->save();
        }

        session()->flash('success', 'Your entry has been submitted and will be reviewed shortly!');

        return redirect()->route('home');
    }


    public function show($categoryId, Business $business)
    {
        return view('pages.businesses.show', compact('business'));
    }


    public function edit(Business $business)
    {
        $this->authorize('update', $business);

        $categories = Category::all();
        return view('pages.businesses.edit', compact(['business', 'categories']));
    }


    public function update(Business $business, Request $request)
    {
        $this->authorize('update', $business);

        $validatedData = $request->validate([
            'name' => 'required|max:200',
            'description' => 'required|max:255',
            'product_info' => 'required|max:255',
            'delivery_info' => 'required|max:255',
            'category_id' => 'required',
            'link' => 'nullable|url',
            'address_one' => 'required|max:255',
            'address_two' => 'required|max:255',
            'town' => 'required|max:255',
            'postcode' => 'required|max:10'
        ]);

        $business->update($validatedData);

        if ($request->hasFile('image_path')) {
            $deletedFile = Storage::delete('public/' . $business->image_path);

            $image = Image::make($request->file('image_path'));
            $image->fit(1280, 768);
            $path_for_db = 'images/' . Auth::user()->slug . '/' . Carbon::now()->format('YmdHs') . '.' . $request->file('image_path')
                        ->getClientOriginalExtension();
            $path_for_storage = 'public/' . $path_for_db;

            Storage::put($path_for_storage, $image->stream(), 'public');

            $business->image_path = $path_for_db;

        }

        if($request['owner']) {
            $business->owner = true;
            $business->save();
        } else {
            $business->owner = false;
            $business->save();
        }

        session()->flash('success', 'Your entry has been updated!');

        return redirect()->route('dashboard.show');
    }


    public function destroy(Business $business)
    {
        $this->authorize('update', $business);

        $deletedFile = Storage::delete('public/' . $business->image_path);

        $business->delete();

        if (request()->wantsJson()) {
            return response([], 204);
        }

        session()->flash('success', 'Your entry has been deleted!');
        return redirect()->route('dashboard.show');
    }
}
