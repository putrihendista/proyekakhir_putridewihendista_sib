@extends('layouts.main')
@section('konten')


<div class="content-wrapper mt-2">
    <div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Products</h3>
                  @if ($role === 'admin')
                  <a href="{{ url('/products/create')}}" style="float:right;" type="button" class="btn btn-rounded btn-success mb-5">Tambah Products</a>
                  @endif
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Category ID</th>
                        <th>Product Code</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        @if($role === 'admin')
                        <th>Aksi</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $key => $pr)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $pr->product_name }}</td>
                            <td>{{ $pr->category_id }}</td>
                            <td>{{ $pr->product_code }}</td>
                            <td>{{ $pr->description }}</td>
                            <td>{{ $pr->price }}</td>
                            <td>{{ $pr->stock }}</td>
                            <td>
                              @if($role === 'admin')
                              <a href="{{ url('product/'. $pr->id) }}" class="btn btn-info">Edit</a>
                              <form onsubmit= 'return deleteData()' action="{{ url('product/'. $pr->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button class='btn btn-danger'>Delete</button></a>
                              </form>
                              @endif
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->

    </div>
</div>

@endsection