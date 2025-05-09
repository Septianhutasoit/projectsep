<form action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nama" placeholder="Nama" required>
    <input type="text" name="jabatan" placeholder="Jabatan">
    <textarea name="pesan" placeholder="Pesan" required></textarea>
    <input type="number" name="rating" min="1" max="5" value="5" required>
    <input type="file" name="foto">
    <button type="submit">Simpan</button>
</form>