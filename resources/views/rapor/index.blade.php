@extends('layout/main')

@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="font-size:60px">Rapor</h3>
                    </div>
                    <div class="panel-body">

                        <table class="table table-hover">
                            <h4 class="panel-title" style="font-size: 30px; margin-left: 20px" >KELAS 1</h4>
                            <br/>
                            <h4 class="panel-title" style="font-size: 20px; margin-left: 20px">SEMESTER 1</h4>
                            <br/>
                            <thead>
                            <tr>
                                <th>Mata Pelajaran</th>
                                <th>KKM</th>
                                <th>Nilai Pengetahuan</th>
                                <th>Predikat</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($rapor->unique('nama_mata_pelajaran') as $data)
                                @if($data->nama_mata_pelajaran == $data->nama_mata_pelajaran)
                                    <tr>
                                        <td>  {{$data->nama_mata_pelajaran}} </td>
                                        <td>  {{$data->kkm}} </td>
                                        <td>
                                            @for ($i = 1; $i < 13; $i++)
                                                @if($data->kode_mata_pelajaran == ('MAT_'. $i)){{$mat->avg_nilai}}
                                                @elseif($data->kode_mata_pelajaran == 'BI_'.$i){{$bi->avg_nilai}}
                                                @elseif($data->kode_mata_pelajaran == 'BING_'.$i){{$bing->avg_nilai}}
                                                @elseif($data->kode_mata_pelajaran == 'PKN_'.$i){{$pkn->avg_nilai}}
                                                @elseif($data->kode_mata_pelajaran == 'PJOK_'.$i){{$pjok->avg_nilai}}
                                                @elseif($data->kode_mata_pelajaran == 'SB_'.$i){{$sb->avg_nilai}}
                                                @elseif($data->kode_mata_pelajaran == 'SEJ_'.$i){{$sej->avg_nilai}}
                                                @endif
                                            @endfor

                                        </td>
                                        <td>
                                            @for ($i = 1; $i < 13; $i++)
                                                @if($data->kode_mata_pelajaran == ('MAT_'. $i)){{$mat->predikat}}
                                                @elseif($data->kode_mata_pelajaran == 'BI_'.$i){{$bi->predikat}}
                                                @elseif($data->kode_mata_pelajaran == 'BING_'.$i){{$bing->predikat}}
                                                @elseif($data->kode_mata_pelajaran == 'PKN_'.$i){{$pkn->predikat}}
                                                @elseif($data->kode_mata_pelajaran == 'PJOK_'.$i){{$pjok->predikat}}
                                                @elseif($data->kode_mata_pelajaran == 'SB_'.$i){{$sb->predikat}}
                                                @elseif($data->kode_mata_pelajaran == 'SEJ_'.$i){{$sej->predikat}}
                                                @endif
                                            @endfor
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
{{--                        </table>--}}
{{--                        <table class="table table-hover">--}}
{{--                            <h4 class="panel-title" style="font-size: 20px; margin-left: 20px">SEMESTER 2</h4>--}}
{{--                            <br/>--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>Mata Pelajaran</th>--}}
{{--                                <th>KKM</th>--}}
{{--                                <th>Nilai Pengetahuan</th>--}}
{{--                                <th>Predikat</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}

{{--                            @foreach($rapor->unique('nama_mata_pelajaran') as $data)--}}
{{--                                @if($data->nama_mata_pelajaran == $data->nama_mata_pelajaran)--}}
{{--                                    <tr>--}}
{{--                                        <td>  {{$data->nama_mata_pelajaran}} </td>--}}
{{--                                        <td>  {{$data->kkm}} </td>--}}
{{--                                        <td>--}}
{{--                                            @for ($i = 1; $i < 13; $i++)--}}
{{--                                                @if($data->kode_mata_pelajaran == ('MAT_'. $i)){{$mat->avg_nilai}}--}}
{{--                                                @elseif($data->kode_mata_pelajaran == 'BI_'.$i){{$bi->avg_nilai}}--}}
{{--                                                @elseif($data->kode_mata_pelajaran == 'BING_'.$i){{$bing->avg_nilai}}--}}
{{--                                                @elseif($data->kode_mata_pelajaran == 'PKN_'.$i){{$pkn->avg_nilai}}--}}
{{--                                                @elseif($data->kode_mata_pelajaran == 'PJOK_'.$i){{$pjok->avg_nilai}}--}}
{{--                                                @elseif($data->kode_mata_pelajaran == 'SB_'.$i){{$sb->avg_nilai}}--}}
{{--                                                @elseif($data->kode_mata_pelajaran == 'SEJ_'.$i){{$sej->avg_nilai}}--}}
{{--                                                @endif--}}
{{--                                            @endfor--}}

{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @for ($i = 1; $i < 13; $i++)--}}
{{--                                                @if($data->kode_mata_pelajaran == ('MAT_'. $i)){{$mat->predikat}}--}}
{{--                                                @elseif($data->kode_mata_pelajaran == 'BI_'.$i){{$bi->predikat}}--}}
{{--                                                @elseif($data->kode_mata_pelajaran == 'BING_'.$i){{$bing->predikat}}--}}
{{--                                                @elseif($data->kode_mata_pelajaran == 'PKN_'.$i){{$pkn->predikat}}--}}
{{--                                                @elseif($data->kode_mata_pelajaran == 'PJOK_'.$i){{$pjok->predikat}}--}}
{{--                                                @elseif($data->kode_mata_pelajaran == 'SB_'.$i){{$sb->predikat}}--}}
{{--                                                @elseif($data->kode_mata_pelajaran == 'SEJ_'.$i){{$sej->predikat}}--}}
{{--                                                @endif--}}
{{--                                            @endfor--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                            <table class="table table-hover">--}}
{{--                                <h4 class="panel-title" style="font-size: 30px; margin-left: 20px" >KELAS 2</h4>--}}
{{--                                <br/>--}}
{{--                                <h4 class="panel-title" style="font-size: 20px; margin-left: 20px">SEMESTER 1</h4>--}}
{{--                                <br/>--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>Mata Pelajaran</th>--}}
{{--                                    <th>KKM</th>--}}
{{--                                    <th>Nilai Pengetahuan</th>--}}
{{--                                    <th>Predikat</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}

{{--                                @foreach($rapor->unique('nama_mata_pelajaran') as $data)--}}
{{--                                    @if($data->nama_mata_pelajaran == $data->nama_mata_pelajaran)--}}
{{--                                        <tr>--}}
{{--                                            <td>  {{$data->nama_mata_pelajaran}} </td>--}}
{{--                                            <td>  {{$data->kkm}} </td>--}}
{{--                                            <td>--}}
{{--                                                @for ($i = 1; $i < 13; $i++)--}}
{{--                                                    @if($data->kode_mata_pelajaran == ('MAT_'. $i)){{$mat->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'BI_'.$i){{$bi->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'BING_'.$i){{$bing->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'PKN_'.$i){{$pkn->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'PJOK_'.$i){{$pjok->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'SB_'.$i){{$sb->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'SEJ_'.$i){{$sej->avg_nilai}}--}}
{{--                                                    @endif--}}
{{--                                                @endfor--}}

{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                @for ($i = 1; $i < 13; $i++)--}}
{{--                                                    @if($data->kode_mata_pelajaran == ('MAT_'. $i)){{$mat->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'BI_'.$i){{$bi->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'BING_'.$i){{$bing->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'PKN_'.$i){{$pkn->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'PJOK_'.$i){{$pjok->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'SB_'.$i){{$sb->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'SEJ_'.$i){{$sej->predikat}}--}}
{{--                                                    @endif--}}
{{--                                                @endfor--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                            <table class="table table-hover">--}}
{{--                                <h4 class="panel-title" style="font-size: 20px; margin-left: 20px">SEMESTER 2</h4>--}}
{{--                                <br/>--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>Mata Pelajaran</th>--}}
{{--                                    <th>KKM</th>--}}
{{--                                    <th>Nilai Pengetahuan</th>--}}
{{--                                    <th>Predikat</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}

{{--                                @foreach($rapor->unique('nama_mata_pelajaran') as $data)--}}
{{--                                    @if($data->nama_mata_pelajaran == $data->nama_mata_pelajaran)--}}
{{--                                        <tr>--}}
{{--                                            <td>  {{$data->nama_mata_pelajaran}} </td>--}}
{{--                                            <td>  {{$data->kkm}} </td>--}}
{{--                                            <td>--}}
{{--                                                @for ($i = 1; $i < 13; $i++)--}}
{{--                                                    @if($data->kode_mata_pelajaran == ('MAT_'. $i)){{$mat->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'BI_'.$i){{$bi->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'BING_'.$i){{$bing->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'PKN_'.$i){{$pkn->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'PJOK_'.$i){{$pjok->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'SB_'.$i){{$sb->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'SEJ_'.$i){{$sej->avg_nilai}}--}}
{{--                                                    @endif--}}
{{--                                                @endfor--}}

{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                @for ($i = 1; $i < 13; $i++)--}}
{{--                                                    @if($data->kode_mata_pelajaran == ('MAT_'. $i)){{$mat->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'BI_'.$i){{$bi->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'BING_'.$i){{$bing->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'PKN_'.$i){{$pkn->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'PJOK_'.$i){{$pjok->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'SB_'.$i){{$sb->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'SEJ_'.$i){{$sej->predikat}}--}}
{{--                                                    @endif--}}
{{--                                                @endfor--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                            <table class="table table-hover">--}}
{{--                                <h4 class="panel-title" style="font-size: 30px; margin-left: 20px" >KELAS 3</h4>--}}
{{--                                <br/>--}}
{{--                                <h4 class="panel-title" style="font-size: 20px; margin-left: 20px">SEMESTER 1</h4>--}}
{{--                                <br/>--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>Mata Pelajaran</th>--}}
{{--                                    <th>KKM</th>--}}
{{--                                    <th>Nilai Pengetahuan</th>--}}
{{--                                    <th>Predikat</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}

{{--                                @foreach($rapor->unique('nama_mata_pelajaran') as $data)--}}
{{--                                    @if($data->nama_mata_pelajaran == $data->nama_mata_pelajaran)--}}
{{--                                        <tr>--}}
{{--                                            <td>  {{$data->nama_mata_pelajaran}} </td>--}}
{{--                                            <td>  {{$data->kkm}} </td>--}}
{{--                                            <td>--}}
{{--                                                @for ($i = 1; $i < 13; $i++)--}}
{{--                                                    @if($data->kode_mata_pelajaran == ('MAT_'. $i)){{$mat->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'BI_'.$i){{$bi->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'BING_'.$i){{$bing->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'PKN_'.$i){{$pkn->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'PJOK_'.$i){{$pjok->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'SB_'.$i){{$sb->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'SEJ_'.$i){{$sej->avg_nilai}}--}}
{{--                                                    @endif--}}
{{--                                                @endfor--}}

{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                @for ($i = 1; $i < 13; $i++)--}}
{{--                                                    @if($data->kode_mata_pelajaran == ('MAT_'. $i)){{$mat->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'BI_'.$i){{$bi->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'BING_'.$i){{$bing->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'PKN_'.$i){{$pkn->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'PJOK_'.$i){{$pjok->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'SB_'.$i){{$sb->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'SEJ_'.$i){{$sej->predikat}}--}}
{{--                                                    @endif--}}
{{--                                                @endfor--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                            <table class="table table-hover">--}}
{{--                                <h4 class="panel-title" style="font-size: 20px; margin-left: 20px">SEMESTER 2</h4>--}}
{{--                                <br/>--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>Mata Pelajaran</th>--}}
{{--                                    <th>KKM</th>--}}
{{--                                    <th>Nilai Pengetahuan</th>--}}
{{--                                    <th>Predikat</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}

{{--                                @foreach($rapor->unique('nama_mata_pelajaran') as $data)--}}
{{--                                    @if($data->nama_mata_pelajaran == $data->nama_mata_pelajaran)--}}
{{--                                        <tr>--}}
{{--                                            <td>  {{$data->nama_mata_pelajaran}} </td>--}}
{{--                                            <td>  {{$data->kkm}} </td>--}}
{{--                                            <td>--}}
{{--                                                @for ($i = 1; $i < 13; $i++)--}}
{{--                                                    @if($data->kode_mata_pelajaran == ('MAT_'. $i)){{$mat->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'BI_'.$i){{$bi->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'BING_'.$i){{$bing->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'PKN_'.$i){{$pkn->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'PJOK_'.$i){{$pjok->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'SB_'.$i){{$sb->avg_nilai}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'SEJ_'.$i){{$sej->avg_nilai}}--}}
{{--                                                    @endif--}}
{{--                                                @endfor--}}

{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                @for ($i = 1; $i < 13; $i++)--}}
{{--                                                    @if($data->kode_mata_pelajaran == ('MAT_'. $i)){{$mat->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'BI_'.$i){{$bi->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'BING_'.$i){{$bing->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'PKN_'.$i){{$pkn->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'PJOK_'.$i){{$pjok->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'SB_'.$i){{$sb->predikat}}--}}
{{--                                                    @elseif($data->kode_mata_pelajaran == 'SEJ_'.$i){{$sej->predikat}}--}}
{{--                                                    @endif--}}
{{--                                                @endfor--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </table>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
