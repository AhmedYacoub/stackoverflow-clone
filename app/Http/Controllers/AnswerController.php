<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, Request $request)
    {
        // Validate incoming request inputs.
        $request->validate([
            'body'   =>  'required|string|min:1|max:1000',
        ], [
            'body.required' => 'Answer is required.',
            'body.min'      =>  'Answer characters must be between 1 & 1000',
            'body.max'      =>  'Answer characters must be between 1 & 1000',
        ]);

        $question->answers()->create([
            'body'      =>  $request->body,
            'user_id'   =>  auth()->id(),
        ]);

        return back()->with('success', 'Your answer has been submitted!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question, Answer $answer)
    {
        $this->authorize('update', $answer);

        return view('answers.edit', compact('question', 'answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question, Answer $answer, Request $request)
    {
        $request->validate([
            'body'  =>  'required|string|min:1|max:1000',
        ], [
            'body.required' =>  'Answer is required.',
            'body.min'      =>  'Answer characters must be between 1 & 1000',
            'body.max'      =>  'Answer characters must be between 1 & 1000',
        ]);

        $answer->update(['body' => $request->body]);

        return redirect(route('questions.show', $question->slug) . "/#answer-" . $answer->id)->with('success', 'Answer has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Answer $answer)
    {
        $this->authorize('destroy', $answer);

        $answer->delete();

        return back()->with('success', 'Answer has been deleted.');
    }
}
