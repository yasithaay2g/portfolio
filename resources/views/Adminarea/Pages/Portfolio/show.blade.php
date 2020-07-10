@extends('Adminarea/Layouts/app')



@section('css')

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('gellary')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h4 class="h2 text-white d-inline-block mb-0">Manage Portfolio</h4>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/showPort">Portfolio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Portfolio</li>
                        </ol>
                    </nav>

                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="/admin/addPort" class="btn btn-neutral"> <i class="ni ni-fat-add text-danger"></i>&nbsp;Add Portfolio</a>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection





@section('content')
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">

                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table id="datatableid" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">#</th>
                                <th scope="col" class="sort" data-sort="budget">Title</th>
                                <th scope="col" class="sort" data-sort="budget">Thumbnail</th>
                                <th scope="col" class="sort" data-sort="budget">Banner Image</th>

                                <th scope="col" class="sort" data-sort="status">Status</th>
                                <th scope="col">Create Date</th>
                                <th scope="col" class="sort" data-sort="completion">Action</th>


                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($pack as $pro)
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">

                                        <div class="media-body">
                                        <span class="name mb-0 text-sm">{{$pro->id}}</span>
                                        </div>
                                </div>
                                </th>
                                <td class="budget">
                                    {{$pro->title}}
                                </td>

                                <td> <img src='{{ asset('public/uploads/'.$pro->Thumb_image->name) }}'  width="75px" height="75px"  class="rounded z-depth-3"></td>


                                <td> <img src='{{ asset('public/uploads/'.$pro->banner_image->name) }}'  width="75px" height="75px"  class="rounded z-depth-3"></td>

                                <td>

                            <input type="checkbox" data-id="{{$pro->id}}" class="toggle-class" data-toggle="toggle" data-on="Show" data-off="Hide" data-onstyle="primary" data-offstyle="danger" {{ $pro->status ? 'checked' : '' }}>

                                </td>
                                <td>
                                {{$pro->created_at}}
                                </td>

                                <td>
                                    <div class="dropdown">

                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                        <a class="dropdown-item" href="{{route('admin-edit',$pro->id)}}">
                                        <i class="fas fa-user-edit text-primary"></i>&nbsp;Edit
                                        </a>


                                        <div class="dropdown-divider responsive-moblile"></div>
                                        <form action="{{route('admin-delete',$pro->id)}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button class="dropdown-item" type="submit">
                                                <i class="fas fa-users text-danger"></i>&nbsp;Delete
                                            </button>
                                        </form>

                                        </div>

                                     </div>

                                </td>



                            </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <table cellspacing="0" cellpadding="0" border="0">
                        <tbody>
                        <tr>
                            <td class="gutter">
                                <div class="line number1 index0 alt2" style="display: none;">1</div>
                            </td>
                            <td class="code">
                                <div class="container" style="display: none;">
                                    <div class="line number1 index0 alt2" style="display: none;">&nbsp;</div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>






</div>



@endsection


@section('js')


<!-- data table-->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {

        $('#datatableid').DataTable();

    });
</script>



<script>
    $(function() {
      $('.toggle-class').change(function() {

          var status = $(this).prop('checked') == true ? 1 : 0;
          var id = $(this).data('id');

          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/admin/changePortStatus',
              data: {'status': status, 'id': id},
              success: function(data){
                console.log(data.success)
              }
          });
      })
    })
  </script>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>



  @endsection


