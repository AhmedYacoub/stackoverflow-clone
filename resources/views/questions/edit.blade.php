@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h3>Update a question</h3>

                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary" title="back">
                                    <i class="fa fa-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {{-- Include session messages --}}
                        @include('partials.__messages')

                        {{-- Form --}}
                        <form action="{{ route('questions.update', $question->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            {{-- Question title input --}}
                            <div class="form-group">
                                <label for="question-title">Question Title</label>
                                <input type="text" name="title" id="question-title"
                                    class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                    placeholder="how may I.." value="{{ old('title', $question->title) }}" />

                                {{-- Show errors related to this input --}}
                                @if ($errors->has('title'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </div>
                                @endif
                                {{-- End --}}
                            </div>
                            {{-- End --}}

                            {{-- Question body --}}
                            <div class="form-group">
                                <label for="question-body">Explain your question</label>
                                <textarea name="body" id="question-body" cols="30" rows="10"
                                    class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                                    style="resize: none;">{{ old('body', $question->body) }}</textarea>

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
