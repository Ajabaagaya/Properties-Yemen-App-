{{-- @if($f) --}}
{{--  
    @if($property)
        <div>
            <div>
                    <x-form-section submit="save">
                            <x-slot name="title">
                                {{ __('منطقة عقارك') }}
                            </x-slot>

                    <x-slot name="description">
                        {{ __('تاكد من العنوان المحافظة والمنطقة والشارع ') }}
                    </x-slot>
                    
                    <x-slot name="form">
                        {{-- <div class="col-span-6 sm:col-span-4">
                            <x-label for="" value="{{ __('المحافظة') }}" />
                            <select id=""  class="mt-1 block w-full" wire:model.lazy="city" >
                                @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                            {{-- <x-input-error for="current_password" class="mt-2" /> --}}
                        {{-- </div> --}}

                        {{-- <div class="col-span-6 sm:col-span-4">
                            <x-label for="password" value="{{ __('اسم المنطقة') }}" />
                            <select id="current_password"  class="mt-1 block w-full" wire:model.lazy="district" >
                                @foreach($districts as $d)
                                <option value="{{$d->id}}">{{$d->name}}</option>
                                @endforeach
                            </select>            
                            <x-input-error for="اسم المنطقة" class="mt-2" />
                        </div> --}}

                        {{-- <div class="col-span-6 sm:col-span-4">
                            <x-label for="password_confirmation" value="{{ __('الشارع') }}" />
                            <select id="current_password" class="mt-1 block w-full" wire:model.lazy="street" >
                                @foreach($streets as $d)
                                <option value="{{$d->id}}">{{$d->street}}</option>
                                @endforeach
                            </select>           
                            <x-input-error for="password_confirmation" class="mt-2" />
                        </div>  --}}

                    

                    
                            {{-- <div class="col-span-6 sm:col-span-4">
                                <x-label for="name" value="{{ __('اسم') }}" />
                                <x-input id="name" type="text" 
                                class="mt-1 block  w-full"  value={{ $property->name }}/>
                                <x-input-error for="الاسم" class="mt-2" />
                            </div>
                    
                            <div class="col-span-6 sm:col-span-4">
                                <x-label for="type" value="{{ __('النوع') }}" />
                                <select id=""  class="mt-1 block w-full" wire:model.lazy="type" value={{ $property->type }}>
                                <option value="room">غرفة</option>
                                <option value="apartment">شقة</option>
                                <option value="villa">فيلا</option>
                                </select>            
                                <x-input-error for="النوع" class="mt-2" />
                            </div> --}}
                            {{-- @if($a)
                                <div class="col-span-6 border sm:col-span-4">
                                    <x-label for="room" value="{{ __('عدد الغرف ') }}" />
                                    <x-input id="rooms" type="text" class="mt-1 block w-full" wire:model="rooms" value={{ $property->rooms }} />
                                    <x-input-error for="" class="mt-2" />
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label for="" value="{{ __('مطبخ') }}" />
                                    <x-input id="" type="radio" class="mt-1 block w-full" wire:model="kitchen" value={{ $property->kitchen }}/>
                                    <x-input-error for="" class="mt-2" />
                                </div>
                                
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label for="الدور" value="{{ __('الدور') }}" />
                                    <select id=""  class="mt-1 block w-full" wire:model="afloors" >
                                    <option value={{ $property->floors }}>{{ $property->floors }}</option>
                                    <option value="1">الاول</option>
                                    <option value="2">الثاني</option>
                                    <option value="3">الثالث</option>
                                    <option value="4">الرابع</option>
                                    <option value="5">الخامس</option>
                                    </select>            
                                    <x-input-error for="الدور" class="mt-2" />
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label for="الدور" value="{{ __('الحمام') }}" />
                                    <select id=""  class="mt-1 block w-full" wire:model="abathrooms"  >
                                    
                                    <option selected  value={{ $property->bathrooms }}>{{ $property->bathrooms }}</option>
                                    <option  value="1">حمام واحد فقط</option>
                                    <option value="2">حمامين مع مجلس منعزال</option>

                                    </select>            
                                    <x-input-error for="الدور" class="mt-2" />
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <x-label for="الدور" value="{{ __('الصالة') }}" />
                                    <select id=""  class="mt-1 block w-full" wire:model="hall" >
                                    
                                    <option value="wide">واسعة</option>
                                    <option value="small">صغيرة</option>
                                    <option value="no-exists">لايوجد صالة</option>

                                    </select>            
                                    <x-input-error for="الدور" class="mt-2" />
                                </div> --}}
{{-- 

                         
                            
                            
                            <div class="col-span-6 sm:col-span-4">
                                <x-label for="status" value="{{ __('الحالة') }}" />
                                <select id="status"  class="mt-1 block w-full" wire:model="status" >
                                <option value="available">متاحة</option>
                                <option value="booked">محجوز</option>
                                <option value="pendding">بنتظار المعالجة</option>
                                </select>            
                                <x-input-error for="الحالة" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <x-label for="status" value="{{ __('الغرض') }}" />
                                <select id="status"  class="mt-1 block w-full" wire:model="purpose" >
                                <option value="selling">بيع</option>
                                <option value="renting">تاحير</option>
                                </select>            
                                <x-input-error for="الحالة" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <x-label for="price" value="{{ __('السعر') }}" />
                                <input id="price" type="text" class="mt-1 block w-full" wire:model="price" value={{ $property->price }} />
                                <x-input-error for="price" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <x-label for="price" value="{{ __('الوصف') }}" />
                                <textarea wire:model="description"  id="" cols="30" rows="10">{{ $property->description }}</textarea>
                                <x-input-error for="price" class="mt-2" />
                            </div>

                            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                                <!-- Profile Photo File Input -->
                                <input type="file" id="photo" 
                                            multiple
                                            wire:model="photo"
                                            x-ref="photo"
                                            x-on:change="
                                                    photoName = $refs.photo.files[0].name;
                                                    const reader = new FileReader();
                                                    reader.onload = (e) => {
                                                        photoPreview = e.target.result;
                                                    };
                                                    reader.readAsDataURL($refs.photo.files[0]);
                                            " />

                                <x-label for="photo" value="{{ __('الصور') }}" />

                        </x-slot>
                    
                        <x-slot name="actions">
                            <x-action-message class="me-3" on="save">
                                {{ __('Saved.') }}
                            </x-action-message>
                    
                            <x-button>
                                {{ __('حفظ') }}
                            </x-button>
                        </x-slot>
                    </x-form-section>

                </div> --}}
        {{-- </div>
    @endif   
     --}}
{{-- @else --}}
   <div>
        <div>
                <x-form-section submit="save">
                        <x-slot name="title">
                            {{ __('منطقة عقارك') }}
                        </x-slot>

                <x-slot name="description">
                    {{ __('تاكد من العنوان المحافظة والمنطقة والشارع ') }}
                </x-slot>
                
                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="" value="{{ __('المحافظة') }}" />
                        <select id=""  class="mt-1 block w-full" wire:model.lazy="city" >
                            @foreach($cities as $city)
                                 <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        {{-- <x-input-error for="current_password" class="mt-2" /> --}}
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="password" value="{{ __('اسم المنطقة') }}" />
                        <select id="current_password"  class="mt-1 block w-full" wire:model.lazy="district" >
                                @foreach($districts as $d)
                                   <option value="{{$d->id}}">{{$d->name}}</option>
                                @endforeach
                        </select>            
                        <x-input-error for="اسم المنطقة" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="password_confirmation" value="{{ __('الشارع') }}" />
                        <select id="current_password" class="mt-1 block w-full" wire:model.lazy="street_id" >
                                @foreach($streets as $d)
                                <option value="{{$d->id}}">{{$d->title}}</option>
                                @endforeach
                        </select>           
                        <x-input-error for="password_confirmation" class="mt-2" />
                    </div>

                

                
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="name" value="{{ __('اسم') }}" />
                            <x-input id="name" type="text" 
                            class="mt-1 block  w-full" wire:model="name" />
                            <x-input-error for="الاسم" class="mt-2" />
                        </div>
                
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="type" value="{{ __('النوع') }}" />
                            <select id=""  class="mt-1 block w-full" wire:model.lazy="type" >
                            <option value="room">غرفة</option>
                            <option value="apartment">شقة</option>
                            <option value="villa">فيلا</option>
                            </select>            
                            <x-input-error for="النوع" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="name" value="{{ __('المساحة') }}" />
                            <x-input type="text" 
                            class="mt-1 block  w-full" wire:model="area_2m" />
                            <x-input-error for="الاسم" class="mt-2" />
                        </div>
                 
                        @if($a)
                        <div class="col-span-6 border sm:col-span-4">
                            <x-label for="room" value="{{ __('عدد الغرف ') }}" />
                            <x-input id="rooms" type="text" class="mt-1 block w-full" wire:model="apartment.rooms" />
                            <x-input-error for="" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="" value="{{ __('مطبخ') }}" />
                            <x-input id="" type="radio" class="mt-1 block w-full" wire:model="apartment.kitchen" />
                            <x-input-error for="" class="mt-2" />
                        </div>
                        
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="الدور" value="{{ __('الدور') }}" />
                            <select id=""  class="mt-1 block w-full" wire:model="apartment.floors" >
                            <option value="غرفه">الادور الارضي</option>
                            <option value="1">الاول</option>
                            <option value="2">الثاني</option>
                            <option value="3">الثالث</option>
                            <option value="4">الرابع</option>
                            <option value="5">الخامس</option>
                            </select>            
                            <x-input-error for="الدور" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="الدور" value="{{ __('الحمام') }}" />
                            <select id=""  class="mt-1 block w-full" wire:model="apartment.bathrooms" >
                            
                            <option value="1">حمام واحد فقط</option>
                            <option value="2">حمامين مع مجلس منعزال</option>

                            </select>            
                            <x-input-error for="الدور" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="الدور" value="{{ __('الصالة') }}" />
                            <select id=""  class="mt-1 block w-full" wire:model="apartment.hall" >
                            
                            <option value="wide">واسعة</option>
                            <option value="small">صغيرة</option>
                            <option value="no-exists">لايوجد صالة</option>

                            </select>            
                            <x-input-error for="الدور" class="mt-2" />
                        </div>

  
                        @endif
                        @if($v)

                        @endif   
                        @if($r)

                        @endif
                        
                        
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="status" value="{{ __('الحالة') }}" />
                            <select id="status"  class="mt-1 block w-full" wire:model="status" >
                            <option value="available">متاحة</option>
                            <option value="booked">محجوز</option>
                            <option value="pendding">بنتظار المعالجة</option>
                            </select>            
                            <x-input-error for="الحالة" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="status" value="{{ __('الغرض') }}" />
                            <select id="status"  class="mt-1 block w-full" wire:model="purpose" >
                            <option value="selling">بيع</option>
                            <option value="renting">تاجير</option>
                            </select>            
                            <x-input-error for="الحالة" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="price" value="{{ __('السعر') }}" />
                            <x-input id="price" type="text" class="mt-1 block w-full" wire:model="price"  />
                            <x-input-error for="price" class="mt-2" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="name" value="{{ __('قابل لتفاوض') }}" />
                            <x-input type="radio" 
                            class="form-radio" wire:model="negotiable" />
                            <x-input-error for="الاسم" class="mt-2" />
                        </div>

                        <div class="relative col-span-6 sm:col-span-4">
                            <label for="" class=" block mb-2 text-sm text-gray-600">حدد الموقع على الخريطة</label>
                                <div class=" block w-full rounded-md shadow" 
                                
                                id="map" 
                                style="z-index: 10;height: 350px;"
                               
                                >
                                <input id="altitude" type="text" wire:models="altitude"  hidden />
                                <input id="longitude"  type="text" wire:models="longitude"  hidden />
                            </div>
                            <div 
                            class="hidden absolute top-2 right-2 bg-green-600 text-white px-1 text-sm rounded shadow"
                            id="check-icon"
                            >
                         
                        تم اختيار الموقع  
                        </div>
                        
                        <div class="col-span-6 sm:col-span">
                            @if($primary_path)
                                   Photo Preview :
                                   <div class="flex flex-row justify-start ">
                                            <img src="{{ $primary_path->temporaryUrl() }}" width="150">
                                    </div>
                            @endif
                            <input type="file" wire:model="primary_path" />
                          
                        </div>
                        <div class="col-span-6 sm:col-span">
                            @if($photos)
                                   Photo Preview :
                                   <div class="flex flex-row justify-start ">
                                       @foreach($photos as $photo)
                                            <img src="{{ $photo->temporaryUrl() }}" width="150">
                                        @endforeach
                                    </div>
                            @endif
                            <input type="file" wire:model="photos" multiple />
                            @error("photos.*")
                            <span>{{$message}}</span>
                            @enderror
                        </div>
                      
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="price" value="{{ __('الوصف') }}" />
                            <textarea wire:model="description" id="" cols="30" rows="10"></textarea>
                            <x-input-error for="price" class="mt-2" />
                        </div>
                    </x-slot>
                    <x-slot name="actions">
                        <x-action-message class="me-3" on="save">
                            {{ __('Saved.') }}
                        </x-action-message>
                
                        <x-button id="save">
                            {{ __('حفظ') }}
                        </x-button>
                    </x-slot>
                </x-form-section>








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
        const map = L.map("map").setView([15.3694,44.1910],13);
    
        let marker; 
        // var mapElement= document.getElementById('');
        // var latField= mapElement.getAttribute("data-lat-field");
        // var lngField= mapElement.getAttribute("data-lng-field");

        var latInput= document.getElementById("altitude");
        var save= document.getElementById("save");
        save.disabled = true;
        var lngInput= document.getElementById("longitude");
        // const defaultLat = parseFloat(latInput?.value) || 15.3694;
        // const defaultLng = parseFloat(lngInput?.value) || 44.1910;
        // const map = L.map("map").setView([defaultLat,defaultLng],13);
        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",{
            maxZoom:19,
            attribution: '@ حدد مواقع عقارك بدقة'
        }).addTo(map);
        map.on('click', function(e){
            const lat = e.latlng.lat.toFixed(6);
            const lng = e.latlng.lng.toFixed(6);
            Livewire.dispatch('updateCoordinates',
            { altitude: lat, longitude: lng });
            if(marker){
                if(lat){
                    alert("dooood");
                }
                marker.setLatLng([lat, lng]);
            }else{
                marker = L.marker([lat, lng],{
                    icon: customIcon,
                    draggable:false
                }).addTo(map);
            }
       
            marker.bindPopup(`lat ${lat} lng: ${lng} `).openPopup();
       
              
            
        });
    })

</script>
@endpush