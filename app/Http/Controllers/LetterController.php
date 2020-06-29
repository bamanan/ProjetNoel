<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests\LetterStoreRequest;
use App\Letter as Letter;
use App\Person as Person;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\Support\MediaStream;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $letters = Letter::all();
        $letters_count = Letter::count();
        return view("admin.letters.index", compact(['letters', 'letters_count']))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\LetterStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LetterStoreRequest $request)
    {
        $data = $request->validated();

        $address = Address::create([

            'city' => $data['address']['city'],
            'street' => $data['address']['street'],
            'postal_code' => $data['address']['postal_code'],
        ]);

        $person = Person::create([
            'lastname' => $data['person']['lastname'],
            'firstname' => $data['person']['firstname'],
            'age' => $data['person']['age'],
            'email' => $data['person']['email'],
            'address_id' => $address->id,
        ]);

        $letter = Letter::create([
            'title' => $data['letter']['title'],
            'content' => $data['letter']['content'],
            'person_id' => $person->id,
        ]);

        //Store Image
        if ($request->hasFile('letter.image') && $request->file('letter.image')->isValid()) {
            $letter->addMediaFromRequest('letter.image')->toMediaCollection('images');
        }

        return redirect(route("home"))->with('success', 'Votre lettre a été envoyée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Letter $letter
     * @return \Illuminate\Http\Response
     */
    public function show(Letter $letter)
    {
        return view("admin.letters.show", compact('letter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Letter $letter
     * @return \Illuminate\Http\Response
     */
    public function edit(Letter $letter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Letter $letter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Letter $letter)
    {
        return null; //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Letter $letter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Letter $letter)
    {
        $letter->delete();
       return redirect(route('letters.index'))->with('success'); //
    }

}
