<x-app-layout>
    <x-slot name="header">{{ $exam->title }}</x-slot>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('exam.result',$exam->slug)}}">
                @csrf
                @foreach ($exam->questions as $question)
                    <strong>{{ $loop->iteration }}. Soru</strong> <br>{{ $question->question }}
                    @if ($question->image)
                        <img src="/{{ str_replace("public","storage",$question->image) }}" style="width: 30%" class="img-responsive mt-4">
                    @endif
                    <ol type="A" class="mt-4">
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="question[{{ $question->id }}]"
                                    id="{{ $question->name }}" value="answer1">
                                <label class="form-check-label" for="question{{ $question->id }}">
                                    {{ $question->answer1 }}
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="question[{{ $question->id }}]"
                                    id="{{ $question->name }}" value="answer2">
                                <label class="form-check-label" for="question{{ $question->id }}">
                                    {{ $question->answer2 }}
                                </label>
                            </div>
                        </li>
                        @if ($question->answer3)
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question[{{ $question->id }}]"
                                        id="{{ $question->name }}" value="answer3">
                                    <label class="form-check-label" for="question{{ $question->id }}">
                                        {{ $question->answer3 }}
                                    </label>
                                </div>
                            </li>
                        @endif

                        @if ($question->answer4)
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question[{{ $question->id }}]"
                                        id="{{ $question->name }}" value="answer4">
                                    <label class="form-check-label" for="question{{ $question->id }}">
                                        {{ $question->answer4 }}
                                    </label>
                                </div>
                            </li>
                        @endif

                        @if ($question->answer5)
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="question[{{ $question->id }}]"
                                        id="{{ $question->name }}" value="answer5">
                                    <label class="form-check-label" for="question{{ $question->id }}">
                                        {{ $question->answer5 }}
                                    </label>
                                </div>
                            </li>
                        @endif
                    </ol>
                    <br>
                    @if (!$loop->last)
                        <hr>
                    @endif
                @endforeach
                <div class="form-group d-grid">
                    <button type="submit" class="btn btn-success btn-sm d-block"
                        style="background-color:MediumSeaGreen;">Sınav Bitir</button>
                </div>
            </form>
        </div>
    </div>
    <style>
        ol {
            list-style-type: upper-alpha;
        }
    </style>
</x-app-layout>
