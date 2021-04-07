@extends('layout/main')

@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="font-size: 60px">Ijazah</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Daftar Ijazah</th>
                                <th></th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Ijazah SD</td>
                                    <td>
                                        <a href="/download" class="btn btn-large pull-right"><i class="icon-download-alt"> </i> Download Ijazah </a>
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
