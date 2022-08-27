<x-app-layout>
    <x-slot name="header">Yayında Olan Sınavlar</x-slot>
    <div class="row" style="text-align: center;">
        <div class="card-body ">
            <div class="list-group">
                @foreach ($exams as $exam)
                    @if (auth()->user()->type == 'admin')
                        <a href="{{ route('exam.detail', $exam->slug) }}"
                            class="list-group-item list-group-item-action flex-column align-items-start">
                            <h5 class="mb-1">{{ $exam->title }}</h5>
                            <p class="mb-1">{{ Str::limit($exam->description, 100) }}</p>
                            <small>{{ $exam->questions_count }} Soru</small><br>
                            <small>{{ $exam->finished_at ? $exam->finished_at->diffForHumans() . ' bitiyor' : null }}</small>
                        </a><br>  
                        @elseif (auth()->user()->type == 'user')
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <h5 class="mb-1">{{ $exam->title }}</h5>
                            <p class="mb-1">{{ Str::limit($exam->description, 100) }}</p>
                            <small>{{ $exam->questions_count }} Soru</small><br>
                            <small>{{ $exam->finished_at ? $exam->finished_at->diffForHumans() . ' bitiyor' : null }}</small><br>

                            @if($exam->my_result)
                            <a href="{{route('dashboard',$exam->slug)}}" class="btn btn-primary d-block" style="background-color:red">Sınav'a Katılım Sağlandı</a><br>
                            @else
                            <a href="{{route('exam.join',$exam->slug)}}" class="btn btn-primary d-block" style="background-color:#55b250;">Sınav'a Katıl</a><br>
                            @endif
                        </div><br>    
                        @endif
                    @endforeach
                    {{ $exams->links() }}
            </div>
        </div>

    </div>

</x-app-layout>
