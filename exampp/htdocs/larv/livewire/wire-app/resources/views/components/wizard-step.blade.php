@props(["active"=>false])
<div class="@if($active) bg-blue-600 text-black @else bg-gray-300 text-white @endif flex-row  justify-between text-2xl font-extrabold">
    {{ $slot }}
</div>