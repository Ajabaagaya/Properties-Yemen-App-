<div>

    <form action="" class="">
        <div class=" flex-1">
            <div class="flex-row justify-between  place-items-center">
            <div class="bg-slate-100 w-5/12  p-3 border border-solid border-slate-300 rounded shadow-2xl">
                            <div class="flex flex-row px-4 py-3 justify-around">
                                <input type="number" wire:model="rooms" placeholder="عداد الغرف" />
                                <input list="datalist" wire:model="type" placeholder=" النوع" />
            
                            </div>
                            <div class="flex flex-row px-4 py-3 justify-around ">
                                <input type="text" wire:model="price" placeholder="السعر" />
                                <input list="datastatus"  wire:model="status" placeholder="الحالة" />
                                <datalist id="datastatus" name="datalist" >
                                    <option value="متاحة"></option>
                                    <option value="محجوز"></option>
                                    <option value="قيد الانتظار"></option>
                                </datalist>
                            </div>
                            <div class="flex flex-row px-4 justify-around">
                                <input type="text" placeholder="العنوان" wire:model="address" />
                                <input type="text" placeholder="المدينة" wire:model="city" />
                            </div>
                            <div class="flex flex-row px-4 py-3 justify-around">
                                <textarea wire:model="description" placeholder="الوصف" cols="50" rows="10"></textarea>
                            </div>
                        
                    </div>
                  </div>
                </div> 
            </form>
        </div>
    