<x-app-layout>
    <script src="/js/jquery.js"></script>
    <x-slot name="header">Öğretmen Kadrosu</x-slot>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title  float-right">
                <a href="{{ route('admin_users.create') }}" class="btn btn-sm btn-primary" style="height:35px"><i
                        class="fa fa-plus" style="margin-top:6%"></i>&nbsp;&nbsp;Öğretmen Ekle</a>
            </h5>
            <form method="GET" action="">
                <div class="form-row">
                    <div class="col-md-4" style="float:left;Margin-left:1px;">
                        <input class="form-control" type="text" name="title" value="{{ request()->get('title') }}"
                            placeholder="Öğretmen Adı Ara..">
                    </div>
                    @if (request()->get('title'))
                        <div class="col-md-2" style="float:left;Margin-left:10px;">
                            <a href="{{ route('admin_users.index') }}" class="btn btn-secondary btn-sm"><i
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
                        <th scope="col">İsim Soyisim</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefon Numarası</th>
                        <th scope="col">Branş</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admin_users as $user)
                    <tr>
                        <th>
                            <a href="#" class="btn btn-sm btn-warning"><i class="fa-solid fa-lock" style="color:white;"></i></a>
                            <a href="#" class="btn btn-sm btn-primary"><i class="fa-solid fa-file-pen"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                        </th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone_number}}</td>
                        <td>{{$user->branch}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</x-app-layout>
