<div>
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header p-3 mb-2 bg-success text-white">
                    <h5 style="color:#fff" class="modal-title text-while" id="exampleModalLabel">Agregar Imagen:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Imagen</label>
                        <input type="file" wire:model="imagen" class="form-control">
                        @error('imagen') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="email">titulo </label>
                        <input type="text" class="form-control" wire:model="titulo" value="Pepito@gmail.com">
                        @error('titulo') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group ">
                        <label for="name">Estado</label>                                           
                        <div class="mb-3">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="animal"  wire:model="status" value="on" class="custom-control-input" checked>
                                <label class="custom-control-label text-xs" for="customRadio1" >Activo</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" wire:model="status" name="animal" value="off" class="custom-control-input">
                                <label class="custom-control-label text-xs" for="customRadio2">Desactivada</label>
                            </div>
                        </div>
                        @error('status') <span class="text-danger">{{ $message }}</span>@enderror  
                    </div>

                    <button type="button" style="background: #ffffff;color:#1a2942;" class="btn btn-secondary close-btn"
                    data-dismiss="modal">Cancelar</button>
                <button type="submit" wire:click="store"  style="background: #009ef4;" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="row">
           
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <h4 class="m-t-0 header-title mb-4"><b>Imagenes</b></h4>
                        <button type="button" class="btn btn-success float-right" data-toggle="modal"
                            data-target="#exampleModal" data-whatever="@mdo">Agregar imagenes</button>
                            @if ($consultas->isNotEmpty())
                            @if ($contadorSelect > 1)
                            <button onclick="alertDelAll({{$contadorSelect}})" class="btn btn-danger ml-2 float-right pr-2">
                              Eliminar {{$contadorSelect}}, Registros
                          </button>                                
                            @endif
                        
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>Imagen</th>
                                    <th>Titulo</th>
                                    <th>Estado</th>

                                    <th>Opciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($consultas as $consulta)
                                <tr>
                                    <td class="border px-4 py-2">
                                        <input type="checkbox" wire:model="eliminarselect" onclick="myFunction()"
                                            name="chk" id="myCheck" value="{{$consulta->id_imagen}}">
                                    </td>  
                                    <td>{{ $consulta->id_imagen }}</td>                                 
                                    <td><img src="/img/users/{{$consulta->imagen}}" style="max-width:150px;" alt="user-image" class=""></td>
                                    <td>{{$consulta->titulo}}</td> 

                                    <td> @if ($consulta->status=="on")
                                        <span class="badge badge-primary mb-3">Activo</span>
                                    @else
                                    <span class="badge badge-secondary mb-3">Desactivado</span>
                                    @endif </td>                              
                                    <td>
                                        <button data-toggle="modal" data-target="#updateModal"
                                            wire:click="edit({{ $consulta->id_imagen }})"
                                            class="btn btn-primary btn-sm">Edit</button>

                                        <button onclick="MuestraAlert({{$consulta->id_imagen}})"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt "></i>
                                        </button>
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
                                        <input type="hidden" wire:model="imagen_id" class="form-control">
                                        <div class="form-group">
                                            <label for="name">titulo</label>
                                            <input type="file" wire:model="imagen" class="form-control">
                                        </div>
                    
                                        <div class="form-group">
                                            <label for="email">titulo </label>
                                            <input type="text" class="form-control" wire:ignore="titulo" value="Pepito@gmail.com">
                                            @error('titulo') <span class="text-danger">{{ $message }}</span>@enderror 
                                        </div>   
                                        <div class="form-group ">
                                            <label for="name">Estado</label>                                           
                                            <div class="mb-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="animal" wire:ignore.self="status" value="on" class="custom-control-input" checked>
                                                    <label class="custom-control-label text-xs" for="customRadio1" >Activo</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" wire:ignore.self="status" name="animal" value="off" class="custom-control-input">
                                                    <label class="custom-control-label text-xs" for="customRadio2">Desactivada</label>
                                                </div>
                                            </div>
                                            @error('status') <span class="text-danger">{{ $message }}</span>@enderror  
                                        </div>                 
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"  style="background: #ffffff;color:#1a2942;" wire:click.prevent="cancel()" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                        <button type="submit" wire:click="update({{ $consulta->id_imagen }})"
                                            class="btn btn-primary">Actualizar</button>                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- FIN ACTUALIZAR USUARIO  --}}
                        @else
                        <br><br>
                        <div class="container m-5">   
                            <div class="alert alert-primary" role="alert">
                             <p class="text-center m-3"> Ups! no hay registros 😥</p>
                           </div>
                         </div>        
                        @endif
                    </div>
                </div>
            </div>          
        </div>
    </div>
    <script>
        function MuestraAlert(id) {
            Swal.fire({
                title: 'Esta seguro de eliminar ID ' + id + '?',
                text: "Una vez borrado, no se podrá deshacer los cambios!,  Se recomienda realizar un Bakup en la página Usuarios",
               
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
    <script>
        function alertDelAll(id){
            Swal.fire({
                title: 'Esta seguro de eliminar '+id+', Registros?',
                text: "Una vez borrado, no se podrá deshacer los cambios!, Se recomienda realizar un Bakup en la ágina Usuarios",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Continuar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        //console.log(id); 
                        @this.destroyselect(id);
                    }
                })
            }
        </script>
</div>
