@extends('auth.app')

@section('content')
<div class="bodylogin">
    <div class="gambarfullhome">
        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Register') }} <a href='/' class="pull-right"> <i class="fa fa-window-close" aria-hidden="true"></i></a></div>

                        <div class="card-body">
                            <form method="POST"  id="insertform" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nik</label>
                                            <input type="number" class="form-control" placeholder="Nik" id="nik" name="nik">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" placeholder="email" id="email" name="email">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" placeholder="nama" id="nama" name="nama">
                                </div>

                                <div class="form-group">
                                    <label>Alamat </label>
                                    <textarea class="form-control" rows="3" id="alamat" name="alamat"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control float-right datepicker" name="tgl_lahir" id="tgl_lahir">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>No.Hp</label>
                                            <input type="text" class="form-control" placeholder="No Hp" id="nohp" name="nohp">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Foto </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="urlFoto" name="urlFoto">
                                                <label class="custom-file-label" for="customFile">Pilih file</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="password" id="password" name="password">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Konfirmasi Password</label>
                                            <input type="password" class="form-control" placeholder="password" id="passwordkonf" name="passwordkonf">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Daftar</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.min.css')}}">
@endsection

@section('js')
<script src="{{ asset('/js/tampilan/fileinput.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });

    $('#insertform').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            method: 'post',
            url: '/postRegister',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                Swal.fire({
                    type: 'success',
                    title: 'berhasil mendaftar',
                    showConfirmButton: false,
                    timer: 1500
                })
                window.location.href = '/';
            }
        });
    });
</script>
@endsection
