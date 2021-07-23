<div class="row justify-content-center mt-2">
    <div class="col-md-10">
        @auth
            <div class="card">
                <div class="card-header text-white bg-dark">
                    <h4>Add an answer</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('questions.answers.store', ['question' => $question]) }}" method="post">
                        @csrf

                        <div class="form-group">
                            <textarea name="body" id="body" cols="30" rows="7"
                                class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}">{{ old('body') }}</textarea>

                            @if ($errors->has('body'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endauth

        @guest
            <b>You have to <a href="{{ route('login') }}">login</a> to post your answers.</b>
        @endguest
    </div>
</div>
