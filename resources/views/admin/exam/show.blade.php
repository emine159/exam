<x-app-layout>
    <x-slot name="header">{{ $exam->title }}</x-slot>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('exams.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"
                        style="border-radius:11px"></i>&nbsp;&nbsp;Sınavlara Dön</a>
            </h5>
            <ul class="list-group mt-3">
                @if ($exam->finished_at)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Son Katılım Tarihi
                        <span class="badge" style="background-color:#ffc107;">{{ $exam->finished_at }}</span>
                    </li>
                @endif
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Soru Sayısı
                    <span class="badge" style="background-color:#ffc107;">{{ $exam->questions_count }}</span>
                </li>
                @if ($exam->details)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Katılımcı Sayısı
                        <span class="badge" style="background-color:#ffc107;">{{ $exam->details['join_count'] }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Ortalama Puan
                        <span class="badge" style="background-color:#ffc107;">{{ $exam->details['average'] }}</span>
                    </li>
                @endif
            </ul>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">

            <h5 class="card-title"></h5><br>
            {{ $exam->description }}
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th scope="col">Ad Soyad</th>
                        <th scope="col">Puan</th>
                        <th scope="col">Doğru</th>
                        <th scope="col">Yanlış</th>
                        <th scope="col">Boş</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($exam->results as $result)
                        <tr>
                            <td>{{ $result->user->name }}</td>
                            <td>{{ $result->point }}</td>
                            <td>{{ $result->correct }}</td>
                            <td>{{ $result->wrong }}</td>
                            <td>{{ $result->blank }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    </p>


</x-app-layout>
