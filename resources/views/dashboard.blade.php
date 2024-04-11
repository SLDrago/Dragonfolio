<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        @if (session('success'))
            <div id="successAlert" class="alert alert-success " role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div id="errorAlert" class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <script>
            // Function to fade out the success and error messages after 3 seconds
            setTimeout(function() {
                $('#successAlert, #errorAlert').fadeOut('slow');
            }, 3000);
        </script>

        <div class="col-md-12">
            <div class="mt-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="hero_desc">Projects</h1>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        New Project
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form class="form-horizontal" method="POST" action="/project/store/">
                                @csrf
                                <div class="modal-body">
                                    <div class="container">
                                        <label for="projName" class="form-label">Project Name</label>
                                        <input type="text" id="projName" class="my-input"
                                            aria-describedby="projName" name="name">
                                        <label for="projDescription" class="form-label">Project
                                            Description</label>
                                        <textarea id="projDescription" class="my-input" name="description"></textarea>
                                        <label for="projUrl" class="form-label">Project URL</label>
                                        <input type="text" id="projUrl" class="my-input" aria-describedby="projUrl"
                                            name="project_url">
                                        <label for="imgUrl" class="form-label">Project Image
                                            URL</label>
                                        <input type="text" id="imgName" class="my-input" aria-describedby="imgName"
                                            name="image_url">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add Project</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Discription</th>
                                <th scope="col">Methods</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($projects as $project)
                                <tr>
                                    <th scope="row">{{ $project->id }}</th>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>
                                        <button type="button" title="Edit" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $project->id }}"><i
                                                class="bi bi-pencil-fill"></i></button>
                                        &nbsp;&nbsp;&nbsp;
                                        <button type="button" title="Delete" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $project->id }}"><i
                                                class="bi bi-trash3-fill text-red-600"></i></button>
                                    </td>
                                </tr>
                                {{-- Edit details of project Model --}}
                                <div class="modal fade" id="editModal{{ $project->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Project
                                                    Details
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form class="form-horizontal" method="POST"
                                                action="/project/edit/{{ $project->id }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <label for="projName" class="form-label">Project Name</label>
                                                        <input type="text" id="projName" class="my-input"
                                                            aria-describedby="projName" name="name"
                                                            value="{{ $project->name }}">
                                                        <label for="projDescription" class="form-label">Project
                                                            Description</label>
                                                        <textarea id="projDescription" class="my-input" name="description">{{ $project->description }}</textarea>
                                                        <label for="projUrl" class="form-label">Project URL</label>
                                                        <input type="text" id="projUrl" class="my-input"
                                                            aria-describedby="projUrl" name="project_url"
                                                            value="{{ $project->project_url }}">
                                                        <label for="imgUrl" class="form-label">Project Image
                                                            URL</label>
                                                        <input type="text" id="imgName" class="my-input"
                                                            aria-describedby="imgName" name="image_url"
                                                            value="{{ $project->image_url }}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save
                                                        changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- delete confirmation model --}}
                                <div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do you really want to delete this project?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="/project/delete/{{ $project->id }}" method="POST">
                                                    @csrf

                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete
                                                        Project</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src='https://code.jquery.com/jquery-3.7.0.js'></script>
    <!-- Data Table JS -->
    <script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                // Disable sorting on last column
                "columnDefs": [{
                    "orderable": false,
                    "targets": 3
                }],
                // Customize pagination prev and next buttons: use arrows instead of words
                language: {
                    'paginate': {
                        'previous': '<span class="fa fa-chevron-left"></span>&nbsp;&nbsp;',
                        'next': '&nbsp;&nbsp;<span class="fa fa-chevron-right"></span>'
                    },
                    // Customize number of elements to be displayed
                    "lengthMenu": 'Display &nbsp; <select class="form-control input">' +
                        '<option value="10">10</option>' +
                        '<option value="20">20</option>' +
                        '<option value="-1">All</option>' +
                        '</select>&nbsp; results'
                }
            });
            var searchInput = $('div.dataTables_filter input');
            searchInput.addClass(
                'my-input rounded-md input'
            );
        });
    </script>

</x-app-layout>
