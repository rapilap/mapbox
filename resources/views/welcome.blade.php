<!-- Library Mapbox Directions -->
<script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet" />
<link href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.css" rel="stylesheet" />

<div id="map" style="width: 100%; height: 500px;"></div>
<form id="direction-form">
    <input type="text" id="start" placeholder="Lokasi Awal" />
    <input type="text" id="end" placeholder="Lokasi Akhir" />
    <button type="submit">Cari Rute</button>
</form>


<script>
    mapboxgl.accessToken = '{{ config("services.mapbox.access_token") }}';

    // Inisialisasi Peta
    const map = new mapboxgl.Map({
        container: 'map', // ID kontainer
        style: 'mapbox://styles/mapbox/streets-v11', // Gaya peta
        center: [107.6191, -6.9175], // Titik pusat awal (Bandung)
        zoom: 10, // Tingkat zoom awal
    });
    
    const directions = new MapboxDirections({
    accessToken: mapboxgl.accessToken,
    unit: 'metric',
    profile: 'mapbox/walking',
    language: 'id',
    // steps: true, // Tampilkan langkah navigasi
    alternatives: true, // Tampilkan rute alternatif
    geocoder: false, // Sembunyikan pencarian lokasi
});
    // Tambahkan Kontrol Directions
    // const directions = new MapboxDirections({
    //     accessToken: mapboxgl.accessToken,
    //     unit: 'metric', // Gunakan metrik (km)
    //     profile: 'mapbox/driving', // Mode transportasi: 'driving', 'walking', 'cycling'
    //     language: 'id', // Bahasa: Indonesia
    // });
    
    // Tambahkan Kontrol Directions ke Peta
    map.addControl(directions, 'top-left');
    
    document.getElementById('direction-form').addEventListener('submit', function (e) {
        e.preventDefault();
    
        const start = document.getElementById('start').value;
        const end = document.getElementById('end').value;
    
        // Tetapkan lokasi berdasarkan input
        directions.setOrigin(start); // Lokasi awal
        directions.setDestination(end); // Lokasi akhir
    });


</script>
