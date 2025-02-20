<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Category;
use App\Http\Requests\StoreAnnonceRequest;
use App\Http\Requests\UpdateAnnonceRequest;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countAnnonces = Annonce::where('status', 'actif')->count();
        $annonces = Annonce::where('status', 'actif')->paginate(10);
        $categories = Category::all();

        // dd($annonces);
        return view('annonces.index', ['annonces' => $annonces, 'countAnnonces' => $countAnnonces, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('annonces.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnnonceRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/uploads/annonces', $fileName);
            $validatedData['image'] = $fileName;
        }
        Annonce::create($validatedData);
        return redirect()->route('annonces.index')->with('success', 'annonce created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Annonce $annonce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annonce $annonce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnnonceRequest $request, Annonce $annonce)
{
    // Get validated data correctly
    try {
        dd($request->all());
        $validatedData = $request->validated();
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/uploads/annonces', $fileName);
            $validatedData['image'] = $fileName;
        } else {
            // Don't update the image field if no new image
            unset($validatedData['image']);
        }
        
        // Set the user_id if it's not in the form
        if (!isset($validatedData['user_id'])) {
            $validatedData['user_id'] = $annonce->user_id;
        }
        
        // Update and redirect
        $annonce->update($validatedData);
        return redirect()->route('annonces.index')->with('success', 'Annonce updated successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Update failed: ' . $e->getMessage())->withInput();
    }
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annonce $annonce)
    {
        $annonce->delete();
        return back();
    }
}
