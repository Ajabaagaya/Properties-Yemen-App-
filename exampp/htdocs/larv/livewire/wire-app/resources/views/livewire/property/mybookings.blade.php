
{{-- <div class="flex-1 items-center px-3 py-2 bg-slate-200 w-4/12">
   <x-button > <a href="/property/form">اضافه عقار جديد </a>

   </x-button>
   <div>{{$alert}}</div>
   @foreach($bookings as $b)

   <a href="/property/form/{{$b->id}}"><p class="text-center font-bold">{{ $b->name }}</p></a>
   <p class="text-center font-bold">{{ $b->created_at }}</p>
  
   <div class="flex flex-row justify-between" >
        <i class="heroicon-o-building-library bg-black"></i>
       <p class="text-center font-bold">{{ $b->type }}</p>
       <p class="text-center font-bold">{{ $b->price }} ريال</p>
       <p 
       class="text-center text-slate-400 text-sm bg-green-300 rounded-lg"
       >@if($b->status === "available")
        متاح   
        @endif  
    </p>
   </div>
   @endforeach

</div> --}}


<div class="p-6 max-w-5xl max-auto">
   <h2 class="text-2xl font-bold mb-4">حجوزاتي</h2>
   @forelse($bookings as $b)
         <div class="bg-white shadow rounded p-4 mb-4 flex justify-between items-center">
            <div>
               <h3 class="text-lg font-semibold">{{ $b->name }}</h3>
               <p class="text-gray-600">{{ $b->created_at->format('Y-m-d') }}</p>
               <span class="text-sm text-gray-600">الحالة : <span class="inline-block px-2 py-0.5 rounded text-white
                  {{$b->status === "available" ? "bg-green-600" : "bg-red-600"}}">
                  @if($b->status === "available" )
                       متاح 
                  @elseif($b->status === "booked")
                      محجوز
                  @else 
                    قيد المعالجة
                  @endif
                </span></span>
               <p class="text-green-700 font-bold">{{ $b->price }}</p>
            </div>
            <a href="" class="text-blue-600 hover:underline">عرض العقار</a>
         </div>
   @endforeach
</div>