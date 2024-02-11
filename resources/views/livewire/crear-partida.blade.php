<div>
    <form wire:submit.prevent='crearPartida'>
        @csrf
        <div class="mx-auto mt-4 grid gap-4  md:grid-cols-2">
            <div>
                <label for="no_partida" class="label-text">No. Partida</label>
                <span class="text-sm text-red-600 space-y-1">*</span>
                <input type="text" wire:model.live="no_partida" id="no_partida" placeholder="Tu respuesta" class="input input-bordered w-full" />
                <x-input-error :messages="$errors->get('no_partida')" class="mt-2" />
            </div>
            <div>
                <label for="url_imagen" class="label-text">Imagen</label>
                <input type="file" wire:model.live="url_imagen" id="url_imagen" class="file-input file-input-success w-full" />
                <div wire:loading wire:target="url_imagen">Uploading...</div>
                <x-input-error :messages="$errors->get('url_imagen')" class="mt-2" />
            </div>
            <div>
                <label for="comentario" class="label-text">Comentario</label>
                <input type="text" wire:model.live="comentario" id="comentario" placeholder="Tu respuesta" class="input input-bordered w-full" />
                <x-input-error :messages="$errors->get('comentario')" class="mt-2" />
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