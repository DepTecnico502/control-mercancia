<div>
    <form wire:submit.prevent='editarUsuario' novalidate>
        @csrf
        <div class="mx-auto mt-4 grid gap-4  md:grid-cols-2">
            <div>
                <label for="name" class="label-text">Username</label>
                <span class="text-sm text-red-600 space-y-1">*</span>
                <input type="text" wire:model.live="name" id="name" placeholder="Tu respuesta" class="input input-bordered w-full" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <label for="email" class="label-text">Email</label>
                <span class="text-sm text-red-600 space-y-1">*</span>
                <input type="email" wire:model.live="email" id="email" placeholder="Tu respuesta" class="input input-bordered w-full" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div>
                <label for="rol_id" class="label-text">Rol</label>
                <span class="text-sm text-red-600 space-y-1">*</span>
                <select class="select select-bordered w-full" wire:model.live="rol_id" id="rol_id">
                    <option>-- Seleccione --</option>
                    @foreach ($roles as $rol)
                        <option value="{{ $rol->id }}">{{ $rol->rol }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('rol_id')" class="mt-2" />
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