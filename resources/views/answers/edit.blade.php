@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h3>Update an answer</h3>

                            <div class="ml-auto">
                                <a href="{{ route('questions.show', $question->slug) }}" class="btn btn-outline-secondary" title="back">
                                    <i class="fa fa-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {{-- Include session messages --}}
                        @include('partials.__messages')

                        {{-- Form --}}
                        <form action="{{ route('questions.answers.update', [$question->id, $answer->id]) }}" method="post">
                            @csrf
                            @method('PUT')

                            {{-- Answer body --}}
                            <div class="form-group">
                                <label for="question-body">New answer</label>
                                <textarea name="body" id="answer-body" cols="30" rows="10"
                                    class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                                    style="resize: none;">{{ $answer->body }}</textarea>

                                @if ($errors->has('body'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </div>
                                @endif
                            </div>
                            {{-- End --}}

                            {{-- Submit & Reset buttons --}}
                            <div class="form-group d-flex flex-row-reverse">
                                <button type="reset" class="btn btn-outline-secondary mx-1">Reset</button>
                                <button type="submit" class="btn btn-outline-primary mx-1">Update</button>
                            </div>
                            {{-- End --}}
                        </form>
                        {{-- End form --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
