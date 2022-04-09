<x-app-layout>
    <x-slot name="header_content">
        <h1>Candidates</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Candidates</div>
        </div>
    </x-slot>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List Candidate</h4>
                        <div class="card-header-action">
                            @can('add')
                                <a href="{{ route('candidates.create') }}"
                                    class="btn btn-icon icon-left btn-primary ml-auto mr-1">
                                    <i class="fas fa-plus"></i> Add New Candidate
                                </a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body p-0">
                        @if (session('candidate'))
                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>×</span>
                                    </button>
                                    {{ session('candidate') }}
                                </div>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped" id="sortable-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            <i class="fas fa-th"></i>
                                        </th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Education</th>
                                        <th>Experience</th>
                                        <th>Last Position</th>
                                        <th>Applied Position</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="ui-sortable">
                                    @foreach ($candidates as $candidate)
                                        <tr>
                                            <td>
                                                <div class="sort-handler ui-sortable-handle">
                                                    <i class="fas fa-th"></i>
                                                </div>
                                            </td>
                                            <td>{{ $candidate->name }}</td>
                                            <td>{{ $candidate->email }}</td>
                                            <td>{{ $candidate->phone }}</td>
                                            <td>{{ $candidate->education }}</td>
                                            <td>{{ $candidate->experience }}</td>
                                            <td>{{ $candidate->last_position }}</td>
                                            <td>{{ $candidate->applied_position }}</td>
                                            <td>
                                                @can('view')
                                                    <span>
                                                        <a href="{{ route('candidates.show', $candidate->id) }}"
                                                            class="btn btn-icon btn-light" data-toggle="tooltip"
                                                            data-original-title="Detail">
                                                            <i class="fas fa-bars"></i>
                                                        </a>
                                                    </span>
                                                @endcan
                                                @can('edit')
                                                    <span>
                                                        <a href="{{ route('candidates.edit', $candidate->id) }}"
                                                            class="btn btn-icon btn-info edit-btn" data-toggle="tooltip"
                                                            data-original-title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </span>
                                                @endcan
                                                @can('delete')
                                                    <span>
                                                        <a href="javascript:" data-toggle="tooltip"
                                                            data-original-title="Delete"
                                                            class="btn btn-icon btn-danger delete-confirm-btn"
                                                            data-action="{{ route('candidates.destroy', $candidate->id) }}">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </span>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @slot('modal')
        <div class="modal fade" id="delete-confirmation" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form id="delete-confirm-form" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <h4>Delete?</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure want to delete this data?</p>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                            <button class="btn btn-default" type="button" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endslot

    @slot('script')
        <script>
            $(document).ready(function() {
                $('table').on('click', '.delete-confirm-btn', function() {
                    $('#delete-confirm-form').get(0).setAttribute('action', $(this).data('action'));
                    $('#delete-confirmation').modal('show');
                });
            })
        </script>
    @endslot
</x-app-layout>
