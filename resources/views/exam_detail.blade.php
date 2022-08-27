<x-app-layout>
    <x-slot name="header">{{ $exam->title }}</x-slot>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Sınav Detayları</h5>
            <ul class="list-group">
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
                        <span class="badge"
                            style="background-color:#ffc107;">{{ $exam->details['join_count'] }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Ortalama Puan
                        <span class="badge"
                            style="background-color:#ffc107;">{{ $exam->details['average'] }}</span>
                    </li>
                @endif
            </ul>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            
                <h5 class="card-title">Sınav Sonuçları</h5>
                <ul class="list-group">
                    @foreach($exam->results as $result)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong class="h5">{{$loop->iteration}}.</strong>
                        {{$result->user->name}}
                        <span class="badge"
                    style="background-color:MediumSeaGreen;">{{ $result->point }}</span>
                    </li>
                    @endforeach

                </ul>
            </div>

        </div>
    </div>
</x-app-layout>
