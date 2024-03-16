<div>
    <form wire:submit.prevent='crearMercancia' enctype="multipart/form-data"
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
                <label for="transporte_id" class="label-text">Transporte</label>
                <span class="text-sm text-red-600 space-y-1">*</span>
                <input type="hidden" class="input input-bordered w-full" wire:model.live="transporte_id" id="transporte_id" readonly />
                <input type="text" wire:model.live="transporte" id="transporte" class="input input-bordered w-full" onclick="transportes.showModal()" readonly />
                {{-- <select class="select select-bordered w-full" wire:model.live="transporte_id" id="transporte_id">
                    <option>-- Seleccione --</option>
                    @foreach ($transportes as $transporte)
                        <option value="{{ $transporte->id }}">{{ $transporte->transporte }}</option>
                    @endforeach
                </select> --}}
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
                <label for="proveedor" class="label-text">Proveedor</label>
                <span class="text-sm text-red-600 space-y-1">*</span>
                <input type="hidden" class="input input-bordered w-full" wire:model.live="proveedor_id" id="proveedor_id" readonly />
                <input type="text" class="input input-bordered w-full" wire:model.live="proveedor" id="proveedor" readonly onclick="proveedores.showModal()" />
                <x-input-error :messages="$errors->get('proveedor_id')" class="mt-2" />
            </div>
            <div>
                <label for="recibido_id" class="label-text">Recibido</label>
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
                <input type="file" wire:model.live="imagen_doc" id="imagen_doc" accept="image/*" class="file-input file-input-success w-full" />
                <!-- Progress Bar -->
                <div x-show="uploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>
                <x-input-error :messages="$errors->get('imagen_doc')" class="mt-2" />
            </div>
        </div>
        <div class="py-5">
            <button x-bind:disabled="uploading" class="btn btn-active btn-success text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                  </svg>                  
            </button>
        </div>
    </form>

    {{-- Modal Proveedores --}}
    <dialog id="proveedores" class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Proveedores</h3>
            <p class="py-4">Presione la tecla ESC o haga clic en el botón ✕ para cerrar</p>
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Proveedor</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row -->
                        @foreach ($proveedores as $proveedor)
                            <tr>
                                <td>{{ $proveedor->codigo }}</td>
                                <td>{{ $proveedor->proveedor }}</td>
                                <td>
                                    <form method="dialog">
                                        <button wire:click="selectProveedor({{ $proveedor->id }}, '{{ $proveedor->proveedor }}')" class="btn btn-primary">
                                            Seleccionar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="my-10">
                    {{ $proveedores->links() }}
                </div>
            </div>
        </div>
    </dialog>

    {{-- Modal Transporte --}}
    <dialog id="transportes" class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Transportes</h3>
            <p class="py-4">Presione la tecla ESC o haga clic en el botón ✕ para cerrar</p>
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Transporte</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row -->
                        @foreach ($transportes as $transporte)
                            <tr>
                                <td>{{ $transporte->codigo }}</td>
                                <td>{{ $transporte->transporte }}</td>
                                <td>
                                    <form method="dialog">
                                        <button wire:click="selectTransporte({{ $transporte->id }}, '{{ $transporte->transporte }}')" class="btn btn-primary">
                                            Seleccionar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="my-10">
                    {{ $transportes->links() }}
                </div>
            </div>
        </div>
    </dialog>
</div>
