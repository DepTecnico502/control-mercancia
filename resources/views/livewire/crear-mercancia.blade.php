<div>
    <form wire:submit.prevent='crearMercancia'>
        @csrf
        <div class="mx-auto mt-4 grid gap-4  md:grid-cols-2">
            <div>
                <label for="transporte_id" class="label-text">Transporte</label>
                <span class="text-sm text-red-600 space-y-1">*</span>
                <select class="select select-bordered w-full" wire:model.live="transporte_id" id="transporte_id">
                    <option>-- Seleccione --</option>
                    @foreach ($transportes as $transporte)
                        <option value="{{ $transporte->id }}">{{ $transporte->transporte }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('transporte_id')" class="mt-2" />
            </div>
            <div>
                <label for="no_guia" class="label-text">No. Guia</label>
                <span class="text-sm text-red-600 space-y-1">*</span>
                <input type="text" wire:model.live="no_guia" id="no_guia" placeholder="Tu respuesta" class="input input-bordered w-full" />
                <x-input-error :messages="$errors->get('no_guia')" class="mt-2" />
            </div>
            <div>
                <label for="bultos" class="label-text">Bultos</label>
                <span class="text-sm text-red-600 space-y-1">*</span>
                <input type="text" wire:model.live="bultos" id="bultos" placeholder="Tu respuesta" class="input input-bordered w-full" />
                <x-input-error :messages="$errors->get('bultos')" class="mt-2" />
            </div>
            <div>
                <label for="monto" class="label-text">Monto</label>
                <input type="number" step="0.01" wire:model.live="monto" id="monto" placeholder="Tu respuesta" class="input input-bordered w-full" />
                <x-input-error :messages="$errors->get('monto')" class="mt-2" />
            </div>
            <div>
                <label for="proveedor_id" class="label-text">Proveedor</label>
                <span class="text-sm text-red-600 space-y-1">*</span>
                <select class="select select-bordered w-full" wire:model.live="proveedor_id" id="proveedor_id">
                    <option>-- Seleccione --</option>
                    @foreach ($proveedores as $proveedor)
                        <option value="{{ $proveedor->id }}">{{ $proveedor->proveedor }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('proveedor_id')" class="mt-2" />
            </div>
            <div>
                <label for="recibido" class="label-text">Recibido</label>
                <span class="text-sm text-red-600 space-y-1">*</span>
                <select class="select select-bordered w-full" wire:model.live="recibido_id" id="recibido_id">
                    <option>-- Seleccione --</option>
                    @foreach ($recibidos as $recibido)
                        <option value="{{ $recibido->id }}">{{ $recibido->recibido }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('recibido_id')" class="mt-2" />
            </div>
            <div>
                <label for="no_pedido" class="label-text">No. pedido</label>
                <span class="text-sm text-red-600 space-y-1">*</span>
                <input type="text" wire:model.live="no_pedido" id="no_pedido" placeholder="Tu respuesta" class="input input-bordered w-full" />
                <x-input-error :messages="$errors->get('no_pedido')" class="mt-2" />
            </div>
            <div>
                <label for="imagen_doc" class="label-text">Imagen doc</label>
                <input type="file" wire:model.live="imagen_doc" id="imagen_doc" class="file-input file-input-success w-full" />
                <div wire:loading wire:target="imagen_doc">Uploading...</div>
                <x-input-error :messages="$errors->get('imagen_doc')" class="mt-2" />
            </div>
        </div>
        <div class="py-5">
            <button wire:loading.attr="disabled" class="btn btn-active btn-success text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                  </svg>                  
            </button>
        </div>
    </form>
</div>
