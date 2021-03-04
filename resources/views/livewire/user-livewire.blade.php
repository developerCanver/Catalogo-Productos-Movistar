<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header p-3 mb-2 bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Uusario:

                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" wire:model="nombres" class="form-control" placeholder="Pepito">

                </div>


                <div class="form-group">
                    <label for="email">Email </label>
                    <input type="email" class="form-control" wire:model="email" placeholder="Pepito@gmail.com">
                </div>

                <button type="submit" wire:click="store" class="btn btn-primary">Registrar</button>
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cancelar</button>

            </div>
        </div>
    </div>
</div>

<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="m-t-0 header-title mb-4"><b>Usuarios</b></h4>
                    <button type="button" class="btn btn-success float-right" data-toggle="modal"
                        data-target="#exampleModal" data-whatever="@mdo">Agregar user</button>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>apellidos</th>
                                <th>telefono</th>
                                <th>direccion</th>
                                <th>email</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($consultas as $consulta)
                            <tr>
                                <td class="border px-4 py-2">
                                    <input type="checkbox" wire:model="eliminarselect" onclick="myFunction()" name="chk"
                                        id="myCheck" value="{{$consulta->id_user}}">
                                </td>
                                <td>{{$consulta->id_user}}</td>
                                <td>{{$consulta->nombres}}</td>
                                <td>{{$consulta->apellidos}}</td>
                                <td>{{$consulta->telefono}}</td>
                                <td>{{$consulta->direccion}}</td>
                                <td>{{$consulta->email}}</td>


                                <td>
                                    <button data-toggle="modal" data-target="#updateModal"
                                        wire:click="edit({{ $consulta->id_user }})"
                                        class="btn btn-primary btn-sm">Edit</button>


                                    <button onclick="MuestraAlert({{$consulta->id_user}})"
                                        class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt "></i>
                                    </button>

                                </td>
                                <td>
                                    <input type="text" class="form-control" wire:model="nombres">
                                </td>


                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    {{-- modal para editar cada tarjeta--}}
                    <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header p-3 mb-2 bg-primary text-white">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <input type="hidden" wire:model="user_id">
                                            <label for="exampleFormControlInput1">nombres</label>
                                            <input type="text" class="form-control" wire:model="nombres">
                                            @error('nombres') <span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput2">Email address</label>
                                            <input type="email" class="form-control" wire:model="email"
                                                id="exampleFormControlInput2">
                                            @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                                        </div>


                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                                        data-dismiss="modal">Cerrar</button>
                                    <button type="button" wire:click.prevent="update()" class="btn btn-primary"
                                        data-dismiss="modal">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- FIN ACTUALIZAR USUARIO  --}}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function MuestraAlert(id) {
        Swal.fire({
            title: 'Esta seguro de eliminar ID ' + id + '?',
            text: "Una vez borrado, no se podrá deshacer los cambios!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.isConfirmed) {
                //console.log(id); 
                @this.destroy(id);
            }
        })
    }

</script>

<script>
    function myFunction() {

        //contador de checbox
        var a = document.getElementsByName('chk');
        var newvar = 0;
        var count;
        for (let count = 0; count < a.length; count++) {
            if (a[count].checked == true) {
                newvar = newvar + 1;

                // console.log(a[count].checked);
            }
        }
        //console.log(newvar)
        @this.contSelect(newvar);
    }

</script>
