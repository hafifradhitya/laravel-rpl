@extends("template")

@section("content")

<h1>Data Pegawai</h1>
<hr>
<a href="{{ url("tambah-data") }}" class="btn btn-primary btn-sm mb-3">
    Tambah Data
</a>
</hr>
<form method="get" action="{{ url('data') }}">
    <div class="mb-3">
        <label class="form-label">Pencarian Nama</label>
        <input type="search" value="<?= ($q != NULL) ? $q : "" ?>" name='q' class="form-control" placeholder="search">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">
            Cari
        </button>
        @if($q != NULL)
        <a href="{{ url('data') }}" class="btn btn-primary">
            Tampilkan Semua
        </a>
        @endif
    </div>
</form>
<table class="table table-bordered table-striped">
    <thead>
        <th class="text-center">No</th>
        <th class="text-center">Foto</th>
        <th class="text-center">NIP</th>
        <th class="text-center">Nama</th>
        <th class="text-center">L/P</th>
        <th class="text-center">TTL</th>
        <th class="text-center">Alamat</th>
        <th class="text-center">Bagian</th>
        <th class="text-center"></th>
    </thead>
    <tbody>
        <?php $no = 0; ?>
        @foreach($employees as $employee)
        <?php $no++; ?>
        <tr>
            <td class="text-center">{{ $no }}</td>
            <td class="text-center">
                <?php
                $picture = "profile.png";
                if($employee->picture != NULL){
                    $picture = $employee->picture;
                }
                ?>
                <img src="{{ url('pictures/'.$picture) }}" alt="foto" width="50px">
            </td>
            <td class="text-center">{{ $employee->number_id }}</td>
            <td>{{ $employee->name }}</td>
            <td class="text-center">{{ $employee->gender }}</td>
            <td class="text-center">
            {{ $employee->birth_place }},
            {{ date("d-m-Y", strtotime($employee->birth_date)) }}
            </td>
            <td>{{ $employee->address }}</td>
            <td>{{ $employee->division->name }}</td>
            <td class="text-center">
                <a href="{{ url('data/'.$employee->id.'/edit') }}" class="btn btn-success btn-sm">
                    Edit
                </a>
                <a href="{{ url('data/'.$employee->id.'/hapus') }}" onclick="return confirm('Yakin Hapus {{ $employee->name }}?')" class="btn btn-danger btn-sm">
                Hapus
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<hr>
<h1>Data Bagian</h1>
<hr>
<ol type="1">
    @foreach ($divisions as $division)
        <li>{{ $division->name }}</li>
        <ol type="a">
            @foreach ($division->employees as $employee)
            <li>{{ $employee->name }}</li>
            @endforeach
        </ol>
    @endforeach
</ol>
@endsection
