<div>
    {{-- <div class="space-y-4">
        <div class="flex gap-4">
         <label for="">المكان</label>
        <select  name="city" class="border p-2 rounded" wire:model="city">
            <option value="">all city</option>
            @foreach ($cities as $city )
            <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>
        </div>
    </div>
       --}}

 
        {{-- <div class="bg-slate-100 w-3/12  p-3 border border-solid border-slate-300 rounded shadow-2xl">
            <a href="/property/ ">
                <div class="flex flex-row ">

                     <p class="text-center text-xl">{{ $property->name }}</p>
                </div>
            </a>
                <hr class="pt-6">
                <div class="flex flex-row justify-between  ">
                   <p class="">{{ $property->price }}</p>
                   <p class="text-sm font-bold text-green-600 p-3 rounded">{{ $property->status=== "available" ? "متاحة" :"booked"}}</p>
                </div>
                <hr color="black" >
                <div class="flex flex-row justify-between divide-y divide-slate-500">
                    <p class="">{{ $property->type }}</p>
                    {{-- <p>{{ $property->address }}</p>
                </div>
                <div class="bg-green-600 rounded-xl px-6"> حجز الان</div>
            </div>
          
             --}}

    
</div>
