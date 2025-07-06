<div>

    <div class="bg-white rounded-xl shadow p-4 mb-6">
        <div class="flex-wrap gap-3 items-center overflow-x-auto">
            <div class="flex items-center gap-2 bg-gray-100 rounded-lg px-4 py-2 position-fixed">
                <i class="fas fa-search text-gray-500"></i>
                <input type="text" 
                wire:model.debounce.300ms="search"
                placeholder=" البحث "
                class="bg-transparent focus:outline-none w-40 sm:w-64"
                />
            </div>
            <div class="flex gap-2 pt-2">
            @foreach($cities as $city )
                <button 
                wire:click="$set('city1','{{ $city->id }}')"
                class="px-4 py-2 rounded-full border text-sm {{ $city1 === $city->id ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'}} "
                >
                {{ $city->name }}
                </button>
            @endforeach
          </div>
          {{-- <div class="flex gap-2">
            @foreach(["apartment"=> "شقة" ,"villa"=>"فيلا"] as $type1=> $label )
                <button 
                wire:click="$set('type','{{ $type1 }}')"
                class="px-4 py-1 rounded-full  text-sm {{ $type === $type1 ? 'bg-green-600 text-white' : 'bg-gray-200 text-green-50 hover:bg-gray-200'}} "
                >
                {{ $label }}
                </button>
            @endforeach
        </div> --}}
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @forelse($properties as $property)
    
    <div class="bg-white shadow-md rounded overflow-hidden border hover:shadow-lg transition">
        <a href="/property/{{ $property->id }} ">
            @if($property->primary_path)
            <img src="{{ asset('storage/'.$property->primary_path)}}"  class="w-full h-48 object-cover" />
            @else
            <img src="{{asset('imgs/me.jpg')}}"  class="w-full h-48 object-cover" />
            @endif
            <div class="p-4">
                
                <h2 class="text-xl text-gray-800 font-bold mb-1">{{ $property->name }}</h2>
                <h2 class="text-xl text-gray-800 font-bold mb-1">{{ $property->primary_path }}</h2>
                    <div>

                    </div class="flex justify-between text-sm text-gray-600 mb-2">
                    
                </p class="text-sm text-gray-600 mb-1">
                <i class="fas fa-location-dot text-blue-400 mr-1"></i>
                {{ $property->district->name ?? "غير معروف" }}</p>
                <p class="text-sm text-gray-600 mb-1"> 
                    <i class="fas fa-tags text-yellow-500 mr-1"></i>
                    {{ $property->type }}<p>
                    </div>
                    <p class="text-green-700 font-bold text-sm mb-3">
                        <i class="fas fa-dollar-sign mr-1"></i>
                        {{ $property->price }}</p>
                    </a>
                    
                    <a class="block bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 text-center rounded"
                    >
                    <i class="fas fa-eye mr-1"></i>
                    عرض التفاصيل
                </a>
            </div>
            @empty
            <div>لا يوجد نتائج</div>
            @endforelse
        </div>
        {{-- @else
        <p class="text-gray-500 mt-6 text-center"> لا يوجد مطابقة</p>
        @endif --}}
    </div>
    
    
</div>
    
