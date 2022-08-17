<x-app-layout>
    <script src="/js/jquery.js"></script>
    <x-slot name="header">Sınav Güncelle</x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('exams.update', $exam->id) }}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Sınav Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{!! $exam->title !!}">
                </div>

                <br>

                <div class="form-group">
                    <label>Sınav Açıklaması</label>
                    <textarea name="description" class="form-control" rows=4>{!! $exam->description !!}</textarea>
                </div>

                <br>

                <div class="form-group">
                    <label>Sınav Durumu</label>
                    <select id='sel_status' name="status" class="form-control">
                        <option @if ($exam->status === 'publish') selected @endif value="publish">Aktif</option>
                        <option @if ($exam->status === 'passive') selected @endif value="passive">Pasif</option>
                        <option @if ($exam->status === 'draft') selected @endif value="draft">Taslak</option>
                    </select>
                </div>

                <br>

                <div class="form-group">
                    <label>Bitiş Tarihi</label>
                    <input type="datetime-local" name="finished_at" class="form-control"
                        value="{!! $exam->finished_at !!}">
                </div>

                <br>

                <div class="form-group d-grid">
                    <button type="submit" class="btn btn-success btn-sm d-block"
                        style="background-color:MediumSeaGreen;">Sınav Güncelle</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        window.onload = function() {
            @if ($errors->any())
                $('#sel_status').val('{{ old('status') }}');
            @endif
        }
    </script>
</x-app-layout>
