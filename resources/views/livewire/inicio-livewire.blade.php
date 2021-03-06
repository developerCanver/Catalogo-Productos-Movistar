<div>
    <style>
        .myButton {

            box-shadow: 0px 8px 15px -1px #276873;
            background: linear-gradient(to bottom, #009ef4 5%, #015988 100%);
            background-color: ##b48484;
            border-radius: 0 0 15px 15px;
            border: hidden;
            display: inline-block;
            cursor: pointer;
            color: #ffffff;

            font-size: 15px;
            font-weight: bold;
            padding: 5px 76px;
            text-decoration: none;
            text-shadow: 0px 0px 0px #3d768a;
        }

        .myButton:hover {
            background: linear-gradient(to bottom, #1a2942 5%, #1a2942 100%);
        }

        .myButton:active {
            position: relative;
            top: 1px;
        }

    </style>
    <div class="row">
        @foreach ($consultas as $consulta)

        <div class="col-lg-6">
            <div class="card card-inverse text-white">
                <img class="card-img img-fluid" style="box-shadow: 0px 8px 14px 2px #276873;"
                    src="img/users/{{$consulta->imagen}}" alt="Card image">
              
                <button wire:click="edit({{ $consulta->id_imagen }})" class=" btn-block  myButton" data-toggle="modal"
                    data-target="#exampleModal">Ingresar datos </button>
            </div>
        </div>
        @endforeach
    </div>
{{-- modal --}}
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <input type="text" wire:model="id_imagen">
                                <label for="exampleFormControlInput1">Nombres</label>
                                <input type="text" class="form-control" wire:model="nombres">
                                @error('nombres') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput2">Apellidos</label>
                                <input type="text" class="form-control" wire:model="apellidos"
                                    id="exampleFormControlInput2">
                                @error('apellidos') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput2">Email</label>
                                <input type="text" class="form-control" wire:model="email"
                                    id="exampleFormControlInput2">
                                @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput2">Teléfono</label>
                                <input type="text" class="form-control" wire:model="telefono"
                                    id="exampleFormControlInput2">
                                @error('telefono') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput2">Dirección</label>
                                <input type="text" class="form-control" wire:model="direccion"
                                    id="exampleFormControlInput2">
                                @error('direccion') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" style="background: #ffffff;color:#1a2942;"
                                    class="btn btn-secondary close-btn" data-dismiss="modal">Cancelar</button>
                                <button type="submit" wire:click="store" style="background: #009ef4;"
                                    class="btn btn-primary">Registrar</button>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
