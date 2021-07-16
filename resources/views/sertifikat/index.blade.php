@extends('layout/main')

@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="font-size: 60px">Sertifikat</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Daftar Sertifikat</th>
                                <th></th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sertifikat-1</td>
                                    <td>
                                        <a href="/download" class="btn btn-large pull-right"><i class="icon-download-alt"> </i> Download Sertifikat </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sertifikat-2</td>
                                    <td>
                                        <a href="/download" class="btn btn-large pull-right"><i class="icon-download-alt"> </i> Download Sertifikat </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sertifikat-3</td>
                                    <td>
                                        <a href="/download" class="btn btn-large pull-right"><i class="icon-download-alt"> </i> Download Sertifikat </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
