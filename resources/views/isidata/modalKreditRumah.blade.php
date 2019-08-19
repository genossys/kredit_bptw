<div>
    <input id="idRumah" name="idRUmah" hidden value="{{$rumah->idRumah}}">
    <h4>{{$rumah->namaRumah}}</h4>
    <h3>Harga: {{formatRUpiah($rumah->hargaJual)}}</h3>

    <input type="number" hidden id="hargaRumah" name="hargaRumah" value="{{$rumah->hargaJual}}" />
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label>DP (*min 20%)</label>
                <input type="numer" class="form-control" name="dp" id="dp" value="{{$rumah->hargaJual * 20 / 100}}" onkeyup="hitungAnsuran()">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label>Pilih TOP</label>
                <select class="form-control" id="top" name="top" onchange="hitungAnsuran()" <option value="6">6 bulan</option>
                    <option value="12">12 bulan</option>
                    <option value="24">24 bulan</option>
                    <option value="36">36 bulan</option>
                    <option value="48">48 bulan</option>
                    <option value="60">60 bulan</option>
                </select>
            </div>
        </div>
        <!-- <div class="col-md-1">
            <label><br></label>
            <button class="btn btn-info" onclick="hitungAnsuran()"> Hitung</button>
        </div> -->
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label>Angsuran</label>
                <input type="numer" class="form-control" readonly name="angsuran1" id="angsuran1">
                <input type="numer" class="form-control" hidden name="angsuran" id="angsuran">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label>Bank</label>
                <div class="input-group">
                    <input type="text" class="form-control float-left" name="namaBank" id="namaBank" onclick="PencarianBank()" readonly>
                    <input type="text" class="form-control float-left" name="idBank" id="idBank" hidden>
                    <div class="input-group-append">
                        <button class="btn btn-info input-group-text" onclick="PencarianBank()" data-toggle="modal" data-target="#modalBank">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <button class="btn btn-lg btn-success form-control" onclick="inputKredit()"> Proses </button>
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="modalBank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Request Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <input type="text" class="form-control float-left" onKeyUp="PencarianBank()" name="cariBank" id="cariBank">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class=" fa fa-search"></i>
                        </span>
                    </div>
                </div>
                <div id="pencarianBank">

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function hitungAnsuran() {
        var dp = $("#dp").val();
        var top = $("#top").val();
        var hargaRumah = $("#hargaRumah").val();
        var angsuran = (hargaRumah - dp) / top;
        var intAngsuran = parseInt(angsuran);
        $("#angsuran").val(intAngsuran);
        $("#angsuran1").val(intAngsuran);
    }

    function inputKredit() {
        var dp = $("#dp").val();
        var top = $("#top").val();
        var hargaRumah = $("#hargaRumah").val();
        var angsuran = $("#angsuran").val();
        var idRumah = $("#idRumah").val();
        var idBank = $("#idBank").val();

        $.ajax({
            method: 'post',
            url: '/kreditur/kredit/insertKredit',
            data: {
                "_token": "{{ csrf_token() }}",
                idBank: idBank,
                dp: dp,
                angsuran: angsuran,
                idRumah: idRumah,
                top: top,
            },

            success: function(data) {
                $('#kreditModal').modal('toggle');
                $('#myModal').modal('toggle');
                Swal.fire({
                    type: 'success',
                    title: 'Permintaan anda akan segera kami proses',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });
    }

    $(document).ready(function() {
        hitungAnsuran();
    });
</script>
