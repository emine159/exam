<x-app-layout>
    <script src="/js/jquery.js"></script>
    <x-slot name="header">Sınavlar</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title  float-right">
                <a href="{{ route('exams.create') }}" class="btn btn-sm btn-primary" style="height:35px"><i
                        class="fa fa-plus" style="margin-top:6%"></i>&nbsp;&nbsp;Sınav Oluştur</a>
            </h5>
            <form method="GET" action="">
                <div class="form-row">
                    <div class="col-md-4" style="float:left;Margin-left:1px;">
                        <input class="form-control" type="text" name="title" value="{{ request()->get('title') }}"
                            placeholder="Sınav Adı Ara..">
                    </div>
                    <div class="col-md-4" style="float:left;Margin-left:20px;">
                        <select class="form-control" name="status" onchange="this.form.submit()">
                            <option value="">Durum Seçiniz</option>
                            <option @if (request()->get('status') == 'publish') selected @endif value="publish">Aktif</option>
                            <option @if (request()->get('status') == 'passive') selected @endif value="passive">Pasif</option>
                            <option @if (request()->get('status') == 'draft') selected @endif value="draft">Taslak</option>
                        </select>
                    </div>
                    @if (request()->get('title') || request()->get('status'))
                        <div class="col-md-2" style="float:left;Margin-left:10px;">
                            <a href="{{ route('exams.index') }}" class="btn btn-secondary btn-sm"><i
                                    class="fa-solid fa-broom" style="margin-top:6%"></i>&nbsp;&nbsp;Filtreyi Sıfırla</a>
                        </div>
                    @endif
                </div>
            </form>

            <br><br>
            <table class="table table-bordered">
                <thead>
                    <tr>

                        <th scope="col">İşlemler</th>
                        <th scope="col">Sınav</th>
                        <th scope="col">Soru Sayısı</th>
                        <th scope="col">Durum</th>
                        <th scope="col">Bitiş Tarihi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exams as $exam)
                        <tr>
                            <th>
                                <a href="{{route('exams.details',$exam->id)}}" class="btn btn-sm btn-secondary"><i
                                    class="fa fa-info-circle" ></i></a>
                                <a href="{{ route('questions.index', $exam->id) }}" class="btn btn-sm btn-warning"><i
                                        class="fa fa-question" style="color:white;"></i></a>
                                <a href="{{ route('exams.edit', $exam->id) }}" class="btn btn-sm btn-primary"><i
                                        class="fa-solid fa-file-pen"></i></a>
                                <a href="{{ route('exams.destroy', $exam->id) }}" class="btn btn-sm btn-danger"><i
                                        class="fa-solid fa-trash-can"></i></a>
                            </th>
                            <td>{{ $exam->title }}</td>
                            <td>{{ $exam->questions_count }}</td>
                            <td>
                                @switch($exam->status)
                                    @case('publish')
                                        <span class="badge" style="background-color:MediumSeaGreen;">Aktif</span>
                                    @break

                                    @case('passive')
                                        <span class="badge" style="background-color:red">Pasif</span>
                                    @break

                                    @case('draft')
                                        <span class="badge" style=" background-color:#ffc107">Taslak</span>
                                    @break
                                @endswitch
                            </td>
                            <td>{{ $exam->finished_at ? $exam->finished_at->diffForHumans() : '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $exams->withQueryString()->links() }}
        </div>
    </div>
</x-app-layout>
