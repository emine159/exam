<x-app-layout>
    <x-slot name="header">{{ $exam->title }} Sınavına ait Sorular</x-slot>
    <div class="card" style="text-align:justify;">
        <div class="card-body ">
            <h5 class="card-title">
                <a href="{{ route('exams.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"
                        style="border-radius:11px"></i>&nbsp;&nbsp;Sınavlara Dön</a>
                &nbsp;&nbsp;
                <a href="{{ route('questions.create', $exam->id) }}" class="btn btn-sm btn-primary"><i
                        class="fa fa-plus"></i>&nbsp;&nbsp;Soru Oluştur</a>
            </h5>
            <div class="table-responsive">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col" style="width:86px;">İşlemler</th>
                            <th scope="col">Soru</th>
                            <th scope="col">Fotoğraf</th>
                            <th scope="col">1. Cevap</th>
                            <th scope="col">2. Cevap</th>
                            <th scope="col">3. Cevap</th>
                            <th scope="col">4. Cevap</th>
                            <th scope="col">5. Cevap</th>
                            <th scope="col">Doğru Cevap</th>

                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($exam->questions as $question)
                            <tr>
                                <th>
                                    <a href="{{ route('questions.edit', [$exam->id, $question->id]) }}"
                                        class="btn btn-sm btn-primary"><i class="fa-solid fa-file-pen"></i></a>
                                    <a href="{{ route('questions.destroy', [$exam->id, $question->id]) }}"
                                        class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                </th>
                                <td>{{ $question->question }}</td>
                                <td>{{ $question->image }}</td>
                                <td>{{ $question->answer1 }}</td>
                                <td>{{ $question->answer2 }}</td>
                                <td>{{ $question->answer3 }}</td>
                                <td>{{ $question->answer4 }}</td>
                                <td>{{ $question->answer5 }}</td>
                                <td style="font-weight: bold;" class="text-success">
                                    {{ substr($question->correct_answer, -1) }}. Cevap</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
