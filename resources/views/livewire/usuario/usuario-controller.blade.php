<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('includes.contentheader')
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">



                <button class="btn btn-primary" wire:click="open_modal(0,'agregar_usuario')">Agregar</button>


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
                                #
                            </th>
                            <th style="width: 20%">
                                Project Name
                            </th>
                            <th style="width: 30%">
                                Team Members
                            </th>
                            <th>
                                Project Progress
                            </th>
                            @if (auth()->user()->type_user == 1)

                            <th style="width: 8%" class="text-center">
                                Status
                            </th>
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
                                        <img alt="Avatar" class="table-avatar" src="{{ $d->img }}">
                                    </li>

                                </ul>
                            </td>
                            <td>
                                <a>
                                    {{ $d->name }}
                                </a>
                                <br />
                                <small>
                                    {{ $d->user }}
                                </small>
                            </td>

                            <td class="project_progress">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                                    </div>
                                </div>
                                <small>
                                    57% Complete
                                </small>
                            </td>
                            <td></td>
                            @if (auth()->user()->type_user == 1)
                            <td class="project-state">
                                <div class="custom-control custom-switch">
                                    <input wire:change='status({{ $d->id }})' type="checkbox" class="custom-control-input" {{ $d->status ?'checked':'' }} id="status{{ $d->id }}">
                                    <label class="custom-control-label" for="status{{ $d->id }}">{{ $d->status ?'act':'des' }}</label>
                                </div>
                            </td>


                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="#" wire:click.prevent="open_modal({{ $d->id }},'agregar_usuario')">
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
