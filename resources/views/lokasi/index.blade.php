@extends('adminlte::page')

<style>
#map {
    height: 80%;
}
</style>
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="pull-left">
            <h2>Sistem Hobike | Penyewaan Sepeda di Kota Semarang</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('bike.create') }}"> Tambah Daftar Sepeda</a>
            <a class="btn btn-danger" href="{{ route('home')}}"> Kembali</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Lokasi Sepeda</div>

            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th rowspan="2">Hotel</th>
                        <th colspan="2">Sepeda</th>
                    </tr>
                    <tr>
                        <th>Kode Sepeda</th>
                        <th>Merek Sepeda</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($hotels as $hotel)
                    @foreach ($hotel->bikes as $bike)
                    <tr>
                        <td>
                            @if ($loop->iteration == 1)
                            <b>{{ $hotel->nama }}: {{ $hotel->bikes->count() }} Sepeda</b>
                            @endif
                        </td>
                        <td>{{ $bike->kode_sepeda }}</td>
                        <td>{{ $bike->merek_sepeda }}</td>
                        <td>{{ $bike->status }}</td>
                    </tr>
                    @endforeach
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-striped">
            <thead>
                <th>Hotel</th>
                <th>Kode Sepeda</th>
                <th>Status</th>
            </thead>
            <tbody>
                @foreach($status as $stat)
                <td>{{ $stat->hotel->nama}}</td>
                <td>{{ $stat->bike->kode_sepeda}}</td>
                <td>{{ $stat->status}}</td>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
{{-- 
<div id="map"></div>
<script>
    var customLabel = {
        restaurant : {
            label: 'R'
        },
        Hotel:{
            label: 'H'
        } 
    };
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(-6.966667, 110.416664),
            zoom :12
        });

        var infoWindow = new google.maps.InfoWindow;

        //change this depending on the name of your Php or XML file
        downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var nama = markerElem.getAttribute('nama');
              var alamat = markerElem.getAttribute('alamat');
              var kodepos = markerElem.getAttribute('kodepos');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lintang')),
                  parseFloat(markerElem.getAttribute('bujur')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = nama
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = alamat
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
            });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
            });
          });
        });
    }
    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
        }
    };

    request.open('GET', url, true);
    request.send(null);
}

function doNothing() {}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7kLiTg-411I37FxOl_nGtJSf_JDMLypg&callback=initMap">
</script> --}}

@endsection