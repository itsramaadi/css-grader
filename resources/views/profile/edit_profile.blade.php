@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Profil</h1>
        <p>Buat akun mu lebih personal! Tetapi, ikuti aturan berikut:</p>
        <ol>
            <li>Tidak boleh memasukkan gambar berbau pornografi</li>
            <li>Tidak boleh memakai kata kasar</li>
            <li>Harus menggunakan nama asli di kolom nama (paling minimal nama panggilan. Kasihan orang tua kalian, susah-susah bikin nama malah di plesetin. kita minta nama kalian, bukan nickname alay ingame.)</li>
            <li>Tidak boleh berisi hal yang menyinggung (SARA, Pornografi, Ujaran Kebencian)</li>
        </ol>
        <p>Gagal mengikuti peraturan diatas dapat menyebabkan poin anda kami <b>reset</b> (Ulang membuat tugas dari awal).</p>
        <hr>
        @if ($errors->any())
        <div class="alert alert-danger">
            <p><b>Tunggu!</b> Ada beberapa error di validasi:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="card">
            <div class="card-header">Edit Profil</div>
            <div class="card-body">

                <form action="/editmyprofile" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">
                    <div class="form-group">
                        <label for="form-nama">Nama kamu</label>
                        <input name="name" type="text" class="form-control" id="form-nama" value="{{Auth::user()->name}}">
                    </div>
                    <div class="form-group">
                        <label>Alamat email</label> <br>
                        <small class="text-muted">Demi alasan keamanan, mintalah pengurus untuk mengubah email anda di database.</small>
                    </div>
                    <div class="form-group">
                        <label for="form-class">Kelas</label>
                        <input name="class" type="text" class="input-class form-control" id="form-class" value="{{Auth::user()->class}}">
                    </div>
                    <div class="form-group">
                        <label for="form-absen">absen kamu</label>
                        <input name="absent" type="text" class="form-control" id="form-nama" value="{{Auth::user()->css_number}}">
                    </div>
                    <div class="form-group">
                        <label>Gender</label> <br>
                        <small class="text-muted">Untuk mencegah lucinta luna kedua, mintalah pengurus untuk mengubah gender anda di database.</small>
                    </div>
                    <div class="form-group">
                        <label id="form-avatar">Avatar</label>
                        <p>Ketentuan avatar:</p>
                        <ol>
                            <li>Ukuran maksimal 8MB</li>
                            <li>Berformat: PNG, JPG, dan GIF :O</li>
                            <li>Bukan pengendali empat elemen (Air, Angin, Api, Udara)</li>
                        </ol>
                        <input accept=".jpg,.jpeg,.png,.gif" type="file" name="avatar" id="form-avatar">
                    </div>

                    <button type="submit" class="btn btn-success">Selesai</button>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.input-class').mask('XOO-SSSO-9', 
            {'translation': 
                { 'O': {pattern:  /[a-zA-Z]/, optional: true}}
        });
    </script>
@endsection