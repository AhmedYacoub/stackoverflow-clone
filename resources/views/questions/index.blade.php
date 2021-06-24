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
                                    <a href="{{ route('questions.show', [$question]) }}">
                                        <h4 class="mt-0">{{ $question->title ?? '' }}</h4>
                                    </a>

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

                        <div >
                            {{-- Pagination links --}}
                            {{ $questions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
