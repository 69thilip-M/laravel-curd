<x-app-web-layout>
    <x-slot:title>
        My Laravel Project
    </x-slot:title>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Categories
                                <a href="{{ url('/students/create') }}" class="btn btn-primary float-end">Add Student</a>
                            </h4>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>class</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($students as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>

                                            <td><img src={{ asset($item->image) }} class=""
                                                    style="width:70px;height:70px" alt="Image"></td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->class }}</td>
                                            <td>
                                                <a href="{{ '/students/edit/' . $item->id }}"
                                                    class="btn btn-warning">Edit</a>
                                                <a href="{{ '/students/delete/' . $item->id }}" class="btn btn-success"
                                                    onclick="return confirm('Are You Sure ?')">Delete</a>
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

    <x-slot:scripts>
        <script>
            alert("Hello This Is CURD App...!")
        </script>
    </x-slot:scripts>

</x-app-web-layout>
