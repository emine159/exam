<x-app-layout>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <x-slot name="header">Sınavlar</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{route('exams.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Sınav Oluştur</a>
            </h5>
            <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">İşlemler</th>
      <th scope="col">Sınav</th>
      <th scope="col">Durum</th>
      <th scope="col">Bitiş Tarihi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($exams as $exam)
    <tr>
      <th>
        <a href="#" class="btn btn-sm btn-primary"><i class="fa-solid fa-file-pen"></i></a>
        <a href="#" class="btn btn-sm btn-primary"><i class="fa-solid fa-trash-can"></i></a>
      </th>
      <td>{{ $exam->title}}</td>
      <td>{{ $exam->status}}</td>
      <td>{{ $exam->finished_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$exams->links()}}
        </div>
    </div>
</x-app-layout>