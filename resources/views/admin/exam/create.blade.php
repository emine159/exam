<x-app-layout>
    <script src="/js/jquery.js"></script>
    <x-slot name="header">Sınav Oluştur</x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('exams.store') }}">
                @csrf
                <div class="form-group">
                    <label>Sınav Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                </div>

                <br>

                <div class="form-group">
                    <label>Sınav Açıklaması</label>
                    <textarea name="description" class="form-control" rows=4>{{ old('description') }}</textarea>
                </div>

                <br>

                <div class="form-group">
                    <label>Bitiş Tarihi</label>
                    <input type="datetime-local" name="finished_at" class="form-control"
                        value="{{ old('finished_at') }}">
                </div>

                <br>

                <div class="form-group d-grid">
                    <button type="submit" class="btn btn-success btn-sm d-block"
                        style="background-color:MediumSeaGreen;">Sınav Oluştur</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
