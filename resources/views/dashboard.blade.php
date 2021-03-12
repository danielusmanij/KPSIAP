@extends('layout/main')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    .mySlides {display:none;}
</style>
@section('container')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"></h3>
                    </div>
                    <div class="panel-body">
                        <div class="w3-container">
                            <h2>Kegiatan Sekolah</h2>
                        </div>

                        <br>

                        <!-- Slideshow container -->
                        <div class="w3-content w3-display-container">

                            <!-- Full-width images with number and caption text -->
                            @foreach($kegiatanSekolah as $data)
                                <div class="w3-display-container mySlides">
                                    <img src="{{$data->getSchoolActivityPhoto()}}" style="width:100%; height:500px">
                                    <div class="w3-display-bottomleft w3-large w3-container w3-padding-16 w3-black">
                                        {{$data->nama_kegiatan}}
                                    </div>
                                </div>

                        @endforeach



                            <button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
                            <button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <script>
            var slideIndex = 1;
            showDivs(slideIndex);

            function plusDivs(n) {
                showDivs(slideIndex += n);
            }

            function showDivs(n) {
                var i;
                var x = document.getElementsByClassName("mySlides");
                if (n > x.length) {slideIndex = 1}
                if (n < 1) {slideIndex = x.length}
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                x[slideIndex-1].style.display = "block";
            }
        </script>
@endsection
