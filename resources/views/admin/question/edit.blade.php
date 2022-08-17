<x-app-layout>
    <script src="/js/jquery.js"></script>

    <x-slot name="header"></x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('questions.update', [$question->exam_id, $question->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Soru</label>
                    <textarea name="question" class="form-control" rows=4>{{ $question->question }}</textarea>
                </div>

                <br>

                <div class="form-group d-grid">
                    @if ($question->image)
                        <label>Fotoğraf</label>
                        <img src="{{ asset($question->image) }}" class="img-responsive" style="width:200px">
                    @endif
                    <input type="file" name="image" class="form-conrtol d-block"
                        style="border: 1px solid #ced4da;padding: 0.375rem 0.75rem;">
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>1. cevap</label>
                            <textarea name="answer1" class="form-control" rows=2>{{ $question->answer1 }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>2. cevap</label>
                            <textarea name="answer2" class="form-control" rows=2>{{ $question->answer2 }}</textarea>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>3. cevap</label>
                            <textarea name="answer3" class="form-control" rows=2>{{ $question->answer3 }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>4. cevap</label>
                            <textarea name="answer4" class="form-control" rows=2>{{ $question->answer4 }}</textarea>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>5. cevap</label>
                            <textarea name="answer5" class="form-control" rows=2>{{ $question->answer5 }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Doğru Cevap</label>
                            <select name="correct_answer" class="form-control btn "
                                style="height:60px;border:solid MediumSeaGreen 3px;">
                                <option @if ($question->correct_answer === 'answer1') selected @endif value="answer1">1. Cevap
                                </option>
                                <option @if ($question->correct_answer === 'answer2') selected @endif value="answer2">2. Cevap
                                </option>
                                <option @if ($question->correct_answer === 'answer3') selected @endif value="answer3">3. Cevap
                                </option>
                                <option @if ($question->correct_answer === 'answer4') selected @endif value="answer4">4. Cevap
                                </option>
                                <option @if ($question->correct_answer === 'answer5') selected @endif value="answer5">5. Cevap
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <br>

                <div class="form-group d-grid">
                    <button type="submit" class="btn btn-success btn-sm d-block"
                        style="background-color:MediumSeaGreen;">Soru Güncelle</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
