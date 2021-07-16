@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h3>{{ $question->title }}</h3>

                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary" title="back">
                                    <i class="fa fa-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="question-body">
                            {!! $question->body_html !!}
                        </div>

                    </div>
                </div>

                @include('partials.__answers')
            </div>
        </div>
    </div>
@endsection
