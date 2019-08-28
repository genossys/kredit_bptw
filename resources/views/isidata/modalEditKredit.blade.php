<div>
    <input id="id" name="id" value="{{$kredit->id}}" hidden>
    <input id="noKontrak" name="noKontrak" value="{{$kredit->noKontrak}}" hidden>
    <input id="idKreditur" name="idKreditur" value="{{$kredit->idKreditur}}" hidden>
    <div class="form-group">
        <label>Status</label>
        <select class="form-control" id="status" name="status" onchange="alasan()">
            <option value="diterima">diterima</option>
            <option value="ditolak">ditolak</option>
        </select>
    </div>

    <div class="form-group" hidden id="alasan">
        <label>Alasan Penolakan </label>
        <textarea class="form-control" rows="3"  id="alasanPenolakan" name="alasanPenolakan"></textarea>
    </div>

    <div>
        <button class="btn btn-primary">Simpan</button>
    </div>
</div>

<script>
    function alasan() {
        var status = $('#status').val();
        if(status == 'ditolak'){
            $('#alasan').attr('hidden',false);
            $('#alasanPenolakan').val('');
        }else{
            $('#alasan').attr('hidden',true);
            $('#alasanPenolakan').val('');
        }
    }
</script>
