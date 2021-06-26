@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        All Questions
                    </div>

                    <div class="card-body">
                        @forelse ($questions as $question)
                            <div class="media">
                                <div class="media-body">
                                    {{-- Question title --}}
                                    <h4 class="mt-0">
                                        <a href="{{ $question->url }}">
                                            {{ $question->title ?? '' }}
                                        </a>
                                    </h4>

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
