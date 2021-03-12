@extends('layout/main')
@section('container')

    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ubah Kata Sandi</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="/editPassword/{{session('id_user')}}">
                            @method('patch')
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="password" class="form-control" id="txtOldPassword"
                                       name="txtOldPassword" placeholder="Kata Sandi Lama" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="txtNewPassword"
                                       name="txtNewPassword" placeholder="Kata Sandi Baru" required>
                            </div>
                            <input value="Ubah Kata Sandi" name="btnChangePassword"
                                   class="btn btn-primary btn-lg btn-block"
                                   type="submit">
                            @if (session('messageFail'))
                                <br><br>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                    <i class="fa fa-times-circle"></i> {{session('messageFail')}}
                                </div>
                            @elseif(session('messageSuccess'))
                                <br><br>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                    <i class="fa fa-check-circle"></i> {{session('messageSuccess')}}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->


@endsection
