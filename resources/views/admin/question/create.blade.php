<x-app-layout>
    <script src="/js/jquery.js"></script>

    <x-slot name="header">{{$exam->title}} için yeni soru oluştur</x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('questions.store',$exam_id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Soru</label>
                    <textarea name="question" class="form-control" rows=4>{{old('question')}}</textarea>
                </div>

                <br>

                <div class="form-group d-grid">
                   <label>Fotoğraf</label>
                    <input type="file" name="image" class="form-conrtol d-block"   
                        style="border: 1px solid #ced4da;padding: 0.375rem 0.75rem;">
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>1. cevap</label>
                            <textarea name="answer1" class="form-control" rows=2>{{old('answer1')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>2. cevap</label>
                            <textarea name="answer2" class="form-control" rows=2>{{old('answer2')}}</textarea>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>3. cevap</label>
                            <textarea name="answer3" class="form-control" rows=2>{{old('answer3')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>4. cevap</label>
                            <textarea name="answer4" class="form-control" rows=2>{{old('answer4')}}</textarea>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>5. cevap</label>
                            <textarea name="answer5" class="form-control" rows=2>{{old('answer5')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Doğru Cevap</label>
                            <select name="correct_answer" class="form-control btn " id="correct_answers_sel"
                                style="height:60px;border:solid MediumSeaGreen 3px;">
                                <option  value="">Seçiniz
                                </option>
                                <option  value="answer1">1. Cevap
                                </option>
                                <option value="answer2">2. Cevap
                                </option>
                                <option value="answer3">3. Cevap
                                </option>
                                <option value="answer4">4. Cevap
                                </option>
                                <option  value="answer5">5. Cevap
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <br>

                <div class="form-group d-grid">
                    <button type="submit" class="btn btn-success btn-sm d-block"
                        style="background-color:MediumSeaGreen;">Soru Oluştur</button>
                </div>
            </form>
        </div>
    </div>

<script>

    window.onload=function(){
        $("#correct_answers_sel").val("{{old('correct_answer')}}");
    }
</script>

</x-app-layout>
