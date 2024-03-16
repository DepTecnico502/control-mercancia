<div>
    <form wire:submit.prevent='editarMercancia' enctype="multipart/form-data"
        x-data="{ uploading: false, progress: 0 }"
        x-on:livewire-upload-start="uploading = true"
        x-on:livewire-upload-finish="uploading = false"
        x-on:livewire-upload-cancel="uploading = false"
        x-on:livewire-upload-error="uploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress"
    >
        @csrf
        <div class="mx-auto mt-4 grid gap-4  md:grid-cols-2">
            <div>

                <label for="imagen" class="label-text">Seleccionar imagen</label>
                <input type="file" wire:model.live="imagen_nueva" id="imagen" accept="image/*" class="file-input file-input-success w-full" />
                <!-- Progress Bar -->
                <div x-show="uploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>
                <x-input-error :messages="$errors->get('imagen_nueva')" class="mt-2" />
            </div>
        </div>
        <div class="my-5 w-80">
            <label for="imagen_actual" class="label-text">Imagen actual</label>
            <img 
                src="{{ $imagen ? asset('storage/fotos/mercancia/'.$imagen) : asset('assets/img/sin_imagen.png') }}"
                    alt="Mercancia No. {{ $mercancia_id }}"
                    width="250px"
                    class="imagen-modal"
                    {{-- onclick="my_modal_2.showModal()" --}}
            >
        </div>
        <div class="my-5 w-80">
            @if ($imagen_nueva)
                Imagen Nueva:
                <img src="{{ $imagen_nueva->temporaryUrl() }}">
            @endif
        </div>

        <div class="py-5">
            <button x-bind:disabled="uploading" class="btn btn-active btn-success text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                  </svg>                  
            </button>
        </div>
    </form>
</div>
