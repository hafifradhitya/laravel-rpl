@extends("template")

@section("content")
<h1>Tambah Pegawai</h1>
<hr>
<form method="post" enctype="multipart/form-data" action="{{ url('proses-tambah-data') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Foto</label>
        <input class="form-control" type="file" name="picture" required>
    </div>
    <div class="mb-3">
        <label class="form-label">NIP</label>
        <input type="text" name='number_id' class="form-control" placeholder="Masukkan NIP">
    </div>$picture = $request->file("picture");
    $pictureName = $isbn."_".Str::random(25).".".$picture->getClientOriginalExtension();
    $picture->move("./pictures/",$pictureName);
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name='name' class="form-control" placeholder="Masukkan Nama">
    </div>
    <div class="mb-3">
        <label class="form-label">Jenis Kelamin</label>
        <div class="form-check">
            <label>
                <input type="radio" class="form-check-input" name='gender' value="L" checked>
                Laki-Laki
            </label>
        </div>
        <div class="form-check">
            <label>
                <input type="radio" class="form-check-input" name='gender' value="P">
                Perempuan
            </label>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Tempat Lahir</label>
        <input type="text" name='birth_place' class="form-control" placeholder="Masukkan Tempat Lahir">
    </div>
    <div class="mb-3">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date" name='birth_date' class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea class="form-control" name='address' placeholder="Masukkan Alamat"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Bagian</label>
        <select class="form-select" name="division">
            @foreach ($divisions as $row)
                <option value="{{ $row->id }}">
                    {{ $row->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">
            Tambah
        </button>
    </div>
</form>
@endsection
