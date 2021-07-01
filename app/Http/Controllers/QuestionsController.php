<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\Questions\StorePostRequest;
use App\Http\Requests\Questions\UpdatePostRequest;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all question paginated.
        $questions = Question::latest()->paginate(5);

        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // Validate incoming request.
        $request->validated();

        // Store Question
        $new_question = auth()->user()->questions()
            ->create($request->only('title', 'body'));

        return redirect()->route('questions.index')
            ->with('success', 'Your question has been submitted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question->increment('views');
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Question $question)
    {
        // Validate incoming request.
        $request->validated();

        // Update question object with new data.
        $question->update($request->only('title', 'body'));

        return redirect()->route('questions.index')
            ->with('success', 'Question has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        // Hard-delete the required question.
        $question->delete();

        return redirect()->route('questions.index')
            ->with('success', 'Question has been deleted.');
    }
}
