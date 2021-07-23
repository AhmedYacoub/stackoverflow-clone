<div class="row justify-content-center mt-2">
    <div class="col-md-10">

        @include('partials.__messages')

        <div class="card">
            {{-- answers count --}}
            <div class="card-header h4">
                {{ $question->answers_count . ' ' . str_plural('Answer', $question->answers_count) }}
            </div>

            {{-- all answers --}}
            <div class="card-body">


                @forelse ($question->answers as $answer)
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a href="#" title="This question is useful!" class="vote-up">
                                <i class="fa fa-caret-up fa-2x"></i>
                            </a>

                            <span class="votes-count">12</span>

                            <a href="#" title="This question is not useful!" class="vote-down off">
                                <i class="fa fa-caret-down fa-2x"></i>
                            </a>

                            <a href="#" title="Mark this answer as best answer" class="vote-accepted mt-2">
                                <i class="fa fa-check fa-2x"></i>
                            </a>
                        </div>

                        <div class="media-body" id="answer-{{ $answer->id }}">
                            {!! $answer->body_html !!}

                            <div class="row">
                                <div class="d-flex">
                                    @can('update', $answer)
                                        <a href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}"
                                            class="btn btn-outline-info btn-sm mx-1" title="edit">
                                            Edit
                                        </a>
                                    @endcan

                                    @can('delete', $answer)
                                        <form
                                            action="{{ route('questions.answers.destroy', [$question->id, $answer->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-outline-danger btn-sm mx-1" title="delete"
                                                onclick="return confirm('are you sure?')">
                                                Delete
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </div>

                            <div class="float-right">
                                <span class="text-muted">
                                    {{ $answer->created_at->diffForHumans() }}
                                </span>

                                <div class="media">
                                    <div class="media-body">
                                        <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! $loop->last ? '' : '<hr>' !!}
                @empty
                    <i>sorry, no answers yet!</i>
                @endforelse

            </div>
        </div>
    </div>
</div>
