@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="d-flex align-items-center">
                                <h3>{{ $question->title }}</h3>

                                <div class="ml-auto">
                                    <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary"
                                        title="back">
                                        Back
                                    </a>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="media">

                            <div class="d-flex flex-column vote-controls">
                                <a href="#" title="This question is useful!" class="vote-up">
                                    <i class="fa fa-caret-up fa-2x"></i>
                                </a>

                                <span class="votes-count">1233</span>

                                <a href="#" title="This question is not useful!" class="vote-down off">
                                    <i class="fa fa-caret-down fa-2x"></i>
                                </a>

                                <a href="#" title="mark as favorite" class="favorite">
                                    <i class="fa fa-heart"></i>

                                    <span class="favorites-count">192</span>
                                </a>
                            </div>

                            <div class="media-body">
                                <div class="question-body">
                                    {!! $question->body_html !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                @include('partials.__answers')
            </div>
        </div>
    </div>
@endsection
