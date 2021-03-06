@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h3>All Questions</h3>

                            <div class="ml-auto">
                                <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">
                                    Ask a question
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {{-- Include session messages --}}
                        @include('partials.__messages')

                        @forelse ($questions as $question)
                            <div class="media">

                                <div class="d-flex flex-column counters">
                                    {{-- Votes --}}
                                    <div class="votes">
                                        <strong>{{ $question->votes }}</strong>
                                        {{ str_plural('vote', $question->vote) }}
                                    </div>

                                    {{-- Status --}}
                                    <div class="status {{ $question->status }}">
                                        <strong>{{ $question->answers_count }}</strong>
                                        {{ str_plural('answer', $question->answers_count) }}
                                    </div>

                                    {{-- Views counter --}}
                                    <div class="views">
                                        {{ $question->views . ' ' . str_plural('view', $question->views) }}
                                    </div>
                                </div>

                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        {{-- Question title --}}
                                        <h4 class="mt-0">
                                            <a href="{{ $question->url }}">
                                                {{ $question->title ?? '' }}
                                            </a>
                                        </h4>

                                        <div class="ml-auto">
                                            <div class="d-flex">
                                                @can('update', $question)
                                                    <a href="{{ route('questions.edit', $question->id) }}"
                                                        class="btn btn-outline-info btn-sm mx-1" title="edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                @endcan

                                                @can('delete', $question)
                                                    <form action="{{ route('questions.destroy', $question->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <button type="submit" class="btn btn-outline-danger btn-sm mx-1"
                                                            title="delete" onclick="return confirm('are you sure?')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Author link --}}
                                    <p class="lead">
                                        Asked by
                                        <a href="{{ $question->user->url }}">
                                            {{ $question->user->name }}
                                        </a>

                                        <small class="text-muted">{{ $question->created_date }}</small>
                                    </p>

                                    {{-- Question body, limited to 100 characters --}}
                                    <p>
                                        {{ str_limit($question->body, 200) }}
                                    </p>
                                </div>
                            </div>

                            <hr>
                        @empty
                            <p>Sorry, no questions yet!</p>
                        @endforelse

                        <div>
                            {{-- Pagination links --}}
                            {{ $questions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
