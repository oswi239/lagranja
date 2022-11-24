<div class="card-body">


    <form wire:submit.prevent='login'>

        {{-- user --}}
        <div class="input-group 
             @error('datos.user')
             @else                     
             mb-3
             @enderror                                  
             ">
            <input wire:model='datos.user' type="text" class="form-control  @error('datos.user')
                border-danger
                 @enderror" placeholder="Usuario">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
        @error('datos.user')
        <small class="text-danger mb-3"> {{ $message }}</small>
        @enderror

        {{-- end user --}}
        {{-- password --}}
        <div class="input-group 
             @error('datos.password')

             @else
                 
             mb-3
             @enderror                 
             ">
            <input wire:model='datos.password' type="password" class="form-control @error('datos.password')
            border-danger
             @enderror" placeholder="Contraseña">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        @error('datos.password')
        <small class="text-danger mb-3"> {{ $message }}</small>
        @enderror
        {{-- end password --}}
        <div class="row">
            <div class="col-8">

            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <!-- /.social-auth-links -->

    @section('scripts')
    @include('includes.common.sweetAlert')
    @endsection


    @include('includes.common.modal')


</div>
