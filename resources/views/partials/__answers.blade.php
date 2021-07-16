<div class="row mt-2">
    <div class="col-md-12">
        <div class="card">
            {{-- answers count --}}
            <div class="card-header h4">
                {{ $question->answers_count ." ". str_plural('Answer', $question->answers_count) }}
            </div>

            {{-- all answers --}}
            <div class="card-body">

                @forelse ($question->answers as $answer)
                    <div class="media">
                        <div class="media-body">
                            {!! $answer->body_html !!}

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
                    <hr>
                @empty
                    <i>sorry, no answers yet!</i>
                @endforelse

            </div>
        </div>
    </div>
</div>
