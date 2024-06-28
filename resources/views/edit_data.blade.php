@extends("template")

@section("content")
<h1>Edit Pegawai</h1>
<hr>
<?php
$picture = "profile.png";
if($employee->picture != NULL){
    $picture = $employee->picture;
}
?>
<img src="{{ url('pictures/'.$picture) }}" width="50px">
<form method="post" action="{{ url('proses-edit-data') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $employee->id }}">

    <div class="mb-3">
        <label class="form-label">Foto</label>
        <input class="form-control" type="file" name="picture" value="{{ $employee->picture }}">
    </div>
    <div class="mb-3">
        <label class="form-label">NIP</label>
        <input type="text" value="{{ $employee->number_id }}" name='number_id' readonly class="form-control" placeholder="Masukkan NIP">
    </div>
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" value="{{ $employee->name }}" name='name' class="form-control" placeholder="Masukkan Nama">
    </div>
    <div class="mb-3">
        <label class="form-label">Jenis Kelamin</label>
        <div class="form-check">
            <label>
                <input type="radio" class="form-check-input" name='gender' value="L"
                <?= ($employee->gender == "L") ? "checked" : "" ?>>
                Laki-Laki
            </label>
        </div>
        <div class="form-check">
            <label>
                <input type="radio" class="form-check-input" name='gender' value="P"
                <?= ($employee->gender == "P") ? "checked" : "" ?>>
                Perempuan
            </label>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Tempat Lahir</label>
        <input type="text" value="{{ $employee->birth_place }}" name='birth_place' class="form-control" placeholder="Masukkan Tempat Lahir">
    </div>
    <div class="mb-3">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date" value="{{ $employee->birth_date }}" name='birth_date' class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea class="form-control" name='address' placeholder="Masukkan Alamat">{{ $employee->address }}</textarea>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Bagian</label>
        <select name="division" class="form-select">
            @foreach ($divisions as $row)
            <?php
            $selected = "";
            if($row->id == $employee->division_id){
                $selected = "selected";
            }
            ?>
            <option value="{{ $row->id }}" {{ $selected }}>
                {{ $row->name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">
            Simpan
        </button>
        <a href="{{ url('data') }}" class="btn btn-danger">
            Batal
        </a>
    </div>
</form>
@endsection
