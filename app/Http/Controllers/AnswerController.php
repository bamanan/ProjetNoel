<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Letter;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers = Answer::all();
        return view('admin.answers.index', compact('answers'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Letter $letter
     * @return \Illuminate\Http\Response
     */
    public function create(Letter $letter)
    {
        return view('admin.answers.create', compact('letter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Letter $letter
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Letter $letter)
    {
        $data = $request->validate([
            'letter_id' => 'answers:unique',
            'content' => 'required',
            'title' => 'string',
            'answer.image' => ['nullable', 'image', 'mimes:jpeg,jpg,png'],
        ]);


        $answer = Answer::create([
            'letter_id' => $letter->id,
            'title' => 'Reponse à la lettre de ' . $letter->person()->first()->toString() . '',
            'slug' => str_replace(' ', '-', 'Reponse à la lettre de ' . $letter->person()->first()->toString() . ''),
            'content' => $data['content']
        ]);

        //Store Image
        if ($request->hasFile('answer.image') && $request->file('answer.image')->isValid()) {
            $answer->addMediaFromRequest('answer.image')->toMediaCollection('images');
        }

        return redirect(route('answers.index'))->with('success', 'Votre lettre a été envoyée avec succès');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        return view('admin.answers.show', compact('answer'))->with(['letter' => $answer->letter()->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        return view("admin.answers.edit", compact('answer'))->with(['letter' => $answer->letter()->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {

        $data = $request->validate([
            'content' => 'required',
            'answer.image' => ['nullable', 'image', 'mimes:jpeg,jpg,png'],
        ]);


        $answer->update([
            'slug' => str_replace(' ', '-', 'Reponse à la lettre de ' . $answer->letter()->first()->person()->first()->toString() . ''),
            'content' => $data['content']
        ]);

        //Store Image
        if ($request->hasFile('answer.image') && $request->file('answer.image')->isValid()) {
            $answer->addMediaFromRequest('answer.image')->toMediaCollection('images');
        }

        return redirect(route('answers.index'))->with('success', 'Votre lettre a été envoyée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Answer $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        $answer->delete();
        return redirect(route('answers.index'))->with('success');
    }
}
