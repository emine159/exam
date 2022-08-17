<x-app-layout>
    <x-slot name="header">{{ $exam->title }}</x-slot>
    <div class="card">
        <div class="card-text">
            <div class="row">
                <ul class="list-group">
                    @if ($exam->finished_at)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Son Katılım Tarihi
                        <span class="badge" style="background-color:MediumSeaGreen;">{{ $exam->finished_at }}</span>
                    </li>
                @endif
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Soru Sayısı
                        <span class="badge" style="background-color:MediumSeaGreen;">{{ $exam->questions_count }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Katılımcı Sayısı
                        <span class="badge" style="background-color:MediumSeaGreen;">2</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Ortalama Puan
                        <span class="badge" style="background-color:MediumSeaGreen;">1</span>
                    </li>
                </ul>

            </div>

        </div>

    </div>

</x-app-layout>
