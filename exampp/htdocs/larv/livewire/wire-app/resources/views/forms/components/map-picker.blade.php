

@php
    $mapId = 'map-'.uniqid();
    $latField = $attributes->get('data-lat-field') ?? 'altitude';
    $lngField = $attributes->get('data-lng-field') ?? 'longitude';
@endphp

<h1></h1>
<div class="relative">
    <label for="" class=" block mb-2 text-sm text-gray-600">حدد الموقع على الخريطة</label>
        <div class=" rounded-md shadow" 
        id="{{ $mapId }}" 
        style="z-index: 10;height: 350px;"
        data-lat-field ="{{ $latField }}"
        data-lng-field ="{{ $lngField }}"
        >
    </div>
    <div 
    class="hidden absolute top-2 right-2 bg-green-600 text-white px-1 text-sm rounded shadow"
    id="check-icon"
    >
 
تم اختيار الموقع  
</div>

</div>

@push("styles")
      <link rel="stylesheet" href="{{asset('vendor/leaflet/leaflet.css')}}">
@endpush

@push("scripts")

<script src="{{asset('vendor/leaflet/leaflet.js')}}"></script>


<script>
    const customIcon= L.icon({
        iconUrl:'/vendor/leaflet/images/marker-icon-2x.png',
        shadowUrl:'/vendor/leaflet/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor : [12, 41],
        shadowSize : [41, 41]
    });
    document.addEventListener("DOMContentLoaded", function(){
        // const map = L.map("{{ $mapId }}").setView([15.3694,44.1910],13);
    
        let marker; 
        var mapElement= document.getElementById('{{ $mapId }}');
        var latField= mapElement.getAttribute("data-lat-field");
        var lngField= mapElement.getAttribute("data-lng-field");

        var latInput= document.getElementById("data.altitude");
        var lngInput= document.getElementById("data.longitude");
        const defaultLat = parseFloat(latInput?.value) || 15.3694;
        const defaultLng = parseFloat(lngInput?.value) || 44.1910;
        const map = L.map("{{ $mapId }}").setView([defaultLat,defaultLng],13);
        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",{
            maxZoom:19,
            attribution: '@ حدد مواقع عقارك بدقة'
        }).addTo(map);
        map.on('click', function(e){
            const lat = e.latlng.lat.toFixed(6);
            const lng = e.latlng.lng.toFixed(6);
            if(marker){
                marker.setLatLng([lat, lng]);
            }else{
                marker = L.marker([lat, lng],{
                    icon: customIcon,
                    draggable:false
                }).addTo(map);
            }
            marker.openPopup();
            if(latInput && lngInput){
                latInput.value = lat;
                lngInput.value = lng;
            }
        });
    })

</script>
@endpush