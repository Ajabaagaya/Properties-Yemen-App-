@extends('layouts.app')
@push('styles')
      <link rel="stylesheet" href="{{asset('vendor/leaflet/leaflet.css')}}" >
      <style>
        .no-scrollbar::-webkit-scrollbar {
         display: none;
        }
      </style>
@endpush


@section('content')
   <div class="max-w-6xl mx-auto p-6">
        <div class="w-78 h-72 rounded-full overflow-hidden shadow">
            <img src="{{ asset('storage/'.$property->primary_path)}}"  
            id="mainImage"
            class="w-78 h-78 rounded-xl object-cover transition duration-300 " />

        </div>

        <div >
            <h1 class="text-2xl text-center font-bold text-gray-800">
                {{ $property->name }}
                <i class="fas fa-building text-blue-600"></i>
            </h1>
             <p class="text-2xl text-center font-bold text-gray-800">
                {{ $property->created_at }}
                <i class="fas fa-clock text-blue-600"></i>
             </p>
        </div>
      <div class="relative py-8">
        <button  onclick="scrollThumb(-1)" class="absolute left-0 top-1/2 -translate-y-1/2 bg-white shadow p-2 rounded-full z-10 hidden md:block">
          <i class="fas fa-chevron-left text-gray-600 text-xl"></i>
        </button>
        <div id="scrollThumbcontainer" class="flex  gap-3 overflow-x-auto   no-scrollbar" style="scrollbar-width: none; -ms-overflow-style: none;">
            @foreach($photos as $photo)
            <div class="flex-shrink-0 w-32 h-24 cursor-pointer rounded-lg overflow-hidden border">
              <img src="{{ asset('storage/'.$photo->path)}}" 
               class="w-full h-full object-cover transition-transform hover:scale-105" 
              onclick="changeImage(this)"/>
            </div>
            @endforeach
          </div> 

        <button onclick="scrollThumb(1)" class="absolute right-0 top-1/2 -translate-y-1/2 bg-white shadow p-2 rounded-full z-10 hidden md:block">
            <i class="fas fa-chevron-right text-gray-600 text-xl"></i>
          </button>
      </div>
                
      <div class="text-2xl font-semibold text-gray-600">
        <i class="fas fa-money-bill-wave"></i>
        {{ $property->price }} ريال
    </div>
    <div class="bg-white p-4 rounded shadow-lg">
        <h2 class="text-lg font-semibold mb-2">
            <i class="fas fa-align-left"></i>الوصف :
        </h2>
        <p>{{ $property->description }}</p>
    </div>
      <div class="flex flex-row gap-4 px-3  justify-around lg:justify-center mt-4">
      <div class="flex flex-col sm:flex-row justify-between items-end sm:items-center gap-4">
          
     
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-white text-center shadow rounded p-3">
                <i class="fas fa-bed text-blue-400 text-xl"></i>
                <div class="text-gray-500 text-sm mt-1">عداد الغرف</div>
                <div class="text-lg font-bold">5</div>
            </div>
            <div class="bg-white text-center shadow rounded p-3">
                <i class="fas fa-tags text-blue-400 text-xl"></i>
                <div class="text-gray-500 text-sm mt-1"> الحالة</div>
                <div class="text-lg font-bold">{{ $property->status }}</div>
            </div>
            <div class="bg-white text-center shadow rounded p-3">
                <i class="fas fa-location-dot text-blue-400 text-xl"></i>
                <div class="text-gray-500 text-sm mt-1"> المدينة</div>
                <div class="text-lg font-bold">صنعاء</div>
            </div>
        </div>
        
      </div>


        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-white text-center shadow rounded p-3">
                    <i class="fas fa-bed text-blue-400 text-xl"></i>
                    <div class="text-gray-500 text-sm mt-1"> معروض ل</div>
                    <div class="text-lg font-bold">{{ $property->purpose === "renting" ? "تاجير" : "بيع"}}</div>
                </div>
                <div class="bg-white text-center shadow rounded p-3">
                    <i class="fas fa-tags text-blue-400 text-xl"></i>
                    <div class="text-gray-500 text-sm mt-1"> الحالة</div>
                    <div class="text-lg font-bold">
                        {{ $property->status === "pendding"
                         ?( " قيد الانتظار") : ($property->status === "available" ? "متاح" : "تم الحجز") }}
                    </div>
                </div>
                <div class="bg-white text-center shadow rounded p-3">
                    <i class="fas fa-location-dot text-blue-400 text-xl"></i>
                    <div class="text-gray-500 text-sm mt-1">الطول x العرض</div>
                    <div class="text-lg font-bold">{{ $property->area_2m }}</div>
                </div>
            </div>
            
        </div>
    </div>
        <div class="bg-white shadow ">
            <h2 class="text-lg font-semibold mt-6 text-center pt-2 mb-2 text-gray-700" >
                <i class="fas fa-map-marked-alt"></i>
                الموقع على الخريطة
            </h2>
            <div style="height: 400px;" id="map" class="w-full rounded-lg shadow"></div>

        </div>
    </div>
    <div class="flex flex-row justify-around bg-white py-4">
        <button class="px-6 py-3 bg-gray-300 rounded-lg hover:bg-blue-700">
            التواصل مع المالك
        </button>
        <button class="px-6 py-3 bg-gray-300 rounded-lg hover:bg-blue-700">
            واتساب
        </button>
    </div>
   @endsection



  
   @push("scripts")
   <script  src="{{ asset('vendor/leaflet/leaflet.js')}}"></script>
   <script >
        function scrollThumb(direction){
            const container = document.getElementById("scrollThumbcontainer");
            const scrollAmount = 200;
            container.scrollBy({ left:direction * scrollAmount, behavior:'smooth' });
        }


          function changeImage(element){
           const mainImg = document.getElementById("mainImage");
           mainImg.src = element.src;
           document.querySelectorAll('[onclick="changeImage(this)"]').foreach(img=>{
            img.classList.remove("border-blue-500");
            img.classList.add("border-transparent");
           });
           img.classList.remove("border-transparent");
           img.classList.add("border-bg-blue-500");
          }
           document.addEventListener("DOMContentLoaded",function(){
            var map = L.map('map').setView([15.3694, 44.1910], 30);
             L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
             attribution:'$copy; OpenStreetMap contributors'}).addTo(map);
             L.marker([15.3694, 44.1910]).addTo(map)
             .bindPopup("فيلا فاخرة في صنعاء")
             .openPopup();
           })
   </script>

   @endpush