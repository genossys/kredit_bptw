<div>
    <input id="id" name="id" value="{{$kredit->id}}" hidden>
    <input id="noKontrak" name="noKontrak" value="{{$kredit->noKontrak}}" hidden >
    <input id="idKreditur" name="idKreditur" value="{{$kredit->idKreditur}}" hidden >
    <div class="form-group">
        <label>Status</label>
        <select class="form-control" id="status" name="status">
            <option value="diterima">diterima</option>
            <option value="ditolak">ditolak</option>
        </select>
    </div>
    <div>
        <button class="btn btn-primary">Simpan</button>
    </div>
</div>
