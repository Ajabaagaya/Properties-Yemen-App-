<?php
use App\Livewire\Property\ListProperty;
use App\Livewire\Property\PropertyFilter;
use App\Livewire\RoomForm;
use App\Livewire\propertyForm;
use App\Livewire\Property\ApartmentCreate;
use App\Livewire\Property\VillaForm;
use App\Livewire\Property\PropertyDetails;
use App\Http\Middleware\RoleMiddleware;
use App\Livewire\Property\OwnerForm;
use App\Livewire\Property\Mybookings;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// use App\Http\Controllers\LoginController;
Route::get('/', function () {

    return view('welcome');
});

// Route::get('/table',RoomForm::class);
// Route::get('/apartment',ApartmentCreate::class);
Route::get('property/form',propertyForm::class);
Route::get('property/mybooking',Mybookings::class);
Route::get('property/form/{id}',[Mybookings::class,'navigate']);
Route::get('/property/{id}',[PropertyDetails::class,"render"]);

Route::get('/villa',VillaForm::class)->name("villa")->middleware(["auth","role:owner"]);

Route::get('/redirect-user',function(){
    $user = auth()->user();
    if($user->role === 'tanant'){
        return redirect()->route("property");
    }else if($user->role === 'owner'){
        return redirect()->route("villa");
    }else {
        return redirect("/admin");
    }
})->middleware(["auth"]);
Route::get('/property',PropertyFilter::class)->name("property");#->middleware(["auth","role:tanant"]);
Route::get('/user',function (Request $request){
    return $request->user();
})->name("user")->middleware(["auth","role:tanant"]);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
