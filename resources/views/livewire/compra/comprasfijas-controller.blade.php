<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('includes.contentheader')
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">



                @if(auth()->user()->type_user ==1)

                <button class="btn btn-primary" wire:click="open_modal(0,'compra_fija')">Agregar</button>
                @endif


                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>

                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                Nombre
                            </th>

                            @if (auth()->user()->type_user == 1)


                            <th style="width: 20%">
                            </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($data as $d )
                        <tr>
                            <td>

                                <ul class="list-inline">
                                    <li class="list-inline-item">

                                        <p>{{ $d->name }}</p>
                                    </li>

                                </ul>
                            </td>




                            @if (auth()->user()->type_user == 1)



                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="#" wire:click.prevent="open_modal({{ $d->id }},'compra_fija')">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </td>
                            @endif
                        </tr>
                        @empty

                        @endforelse


                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>



    </section>
    <!-- /.content -->
    @include('includes.common.modal')
</div>
