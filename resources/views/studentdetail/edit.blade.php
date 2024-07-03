<x-app-web-layout>
    <x-slot:title>
        My Laravel Project
    </x-slot:title>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
                            <button type="close" class="close ms-auto" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Students
                                <a href="{{ url('/students') }}" class="btn btn-primary float-end">Back</a>
                            </h4>
                        </div>

                        <div class="card-body">



                            <form action="{{ url('/students/edit/' . $student->id) }}" method="POst"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" value="{{ $student->name }}" class="form-control"
                                        id="name" name="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea name="address" id="address" cols="10" rows="4" class="form-control">{{ $student->address }}</textarea>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="string" value="{{ $student->phone }}" class="form-control"
                                        id="phone" name="phone">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="class" class="form-label">class</label>
                                    <input type="string" value="{{ $student->class }}" class="form-control"
                                        id="class" name="class">
                                    @error('class')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="image">Upload File/Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <button class="btn btn-success " type="submit">Update</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot:scripts>
        <script>
            alert("Hello This Is CURD App Edit Students...!")
        </script>
    </x-slot:scripts>

</x-app-web-layout>
