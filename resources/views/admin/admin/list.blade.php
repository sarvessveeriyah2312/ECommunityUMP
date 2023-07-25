@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Administrators</h1>
          </div>
          <div class="col-sm-6" style="text-align: right">
            <a href="{{ url('admin/admin/add')}}" class="btn btn-success"> + Add New Admin</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            @include('_message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Total Administrators : {{ $getRecord->total() }} </h3>
                <div class="row justify-content-end">
                  <div class="col-sm-2.5">
                      <form action="{{ route('admin') }}" method="GET" class="form-inline" id="searchForm">
                          <div class="form-group">
                              <input type="text" name="search" placeholder="Search..." class="form-control" id="searchInput">
                          </div>
                          <!-- Remove the search button from the form -->
                      </form>
                  </div>
              </div>
              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th style="text-align: center" >Name</th>
                      <th style="text-align: center" >Email</th>
                      <th style="text-align: center" >Matrix ID/Username</th>
                      <th style="text-align: center" >Profile Picture</th>
                      <th style="text-align: center" >Created At</th>
                      <th style="text-align: center" >Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
    <!-- Display the record details here -->



                    <tr>
                      <td style="text-align: center" >{{ $loop->iteration }}</td>
                      <td style="text-align: center" >{{ $value->name }}</td>
                      <td style="text-align: center" >{{ $value->email }}</td>
                      <td style="text-align: center" >{{ $value->matrixid }}</td>
                      <td class="text-center">
                        @if($value['profile_image'])
                        <img src="{{asset('storage/'.$value['profile_image']) }}"  height="100" width="80">
                          {{-- Display the image if it exists --}}
                        @endif
                      </td>
                      <td style="text-align: center" >{{ $value->created_at }}</td>
                      <td class="text-center">
                        <a href="{{ route('updateUser', ['id' => $value->id]) }}" class="btn btn-primary mr-2">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('deleteUser', ['id' => $value->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </td>                    
                  </tr>
                    @endforeach
                    @if($getRecord->isEmpty())
    <!-- This block will be displayed when $getRecord is empty -->
    <tr>
        <td colspan="7" class="text-center">Record not found.</td>
    </tr>
@endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </ul>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>
    let timerId;

    // Get the search input and form elements
    const searchInput = document.getElementById('searchInput');
    const searchForm = document.getElementById('searchForm');

    // Add event listener to the search input
    searchInput.addEventListener('input', function () {
        clearTimeout(timerId);

        // Set a timer for 500 milliseconds (adjust as needed)
        timerId = setTimeout(function () {
            // Submit the form after the delay
            searchForm.submit();
        }, 500);
    });
</script>

@endsection