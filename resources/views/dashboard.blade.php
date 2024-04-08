<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="col-md-12">
            <div class="mt-5">
                <h1 class="hero_desc">Projects</h1>
                <div class="mt-5">
                    <table class="table">
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
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Project Details
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <label for="projName" class="form-label">Project Name</label>
                                                    <input type="text" id="projName" class="form-control"
                                                        aria-describedby="projName" name="name">
                                                    <label for="projDescription" class="form-label">Project
                                                        Description</label>
                                                    <textarea id="projDescription" class="form-control" aria-describedby="projDescription" name="description">
                                                    </textarea>
                                                    <label for="projUrl" class="form-label">Project URL</label>
                                                    <input type="text" id="projUrl" class="form-control"
                                                        aria-describedby="projUrl" name="project_url">
                                                    <label for="imgUrl" class="form-label">Project Image URL</label>
                                                    <input type="text" id="imgName" class="form-control"
                                                        aria-describedby="imgName" name="image_url">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
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
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger"><a
                                                        href="/delete/{{ $project->id }}">Delete
                                                        Project</a></button>
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
</x-app-layout>
