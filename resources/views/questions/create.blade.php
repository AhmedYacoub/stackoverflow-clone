@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h3>Ask a question</h3>

                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        {{-- Form --}}
                        <form action="{{ route('questions.store') }}" method="post">
                            @csrf

                            {{-- Question title input --}}
                            <div class="form-group">
                                <label for="question-title">Question Title</label>
                                <input type="text" name="question_title" id="question-title" class="form-control {{ $errors->has('question_title') ? 'is-invalid' : '' }}" placeholder="how may I.." required />

                                {{-- Show errors related to this input --}}
                                @if ($errors->has('question_title'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('question_title') }}</strong>
                                    </div>
                                @endif
                                {{-- End --}}
                            </div>
                            {{-- End --}}

                            {{-- Question body --}}
                            <div class="form-group">
                                <label for="question-body">Explain your question</label>
                                <textarea name="question_body" id="question-body" cols="30" rows="10" class="form-control {{ $errors->has('question_body') ? 'is-invalid' : '' }}"></textarea>

                                @if ($errors->has('question_body'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('question_body') }}</strong>
                                    </div>
                                @endif
                            </div>
                            {{-- End --}}

                            {{-- Submit & Reset buttons --}}
                            <div class="form-group d-flex flex-row-reverse">
                                <button type="reset" class="btn btn-outline-secondary mx-1">Reset</button>
                                <button type="submit" class="btn btn-outline-primary mx-1">Ask</button>
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
