@extends('Adminarea/Layouts/app')





@section('gellary')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Edit Portfolio</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/showPort">Portfolio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Portfolio</li>
                        </ol>
                    </nav>

                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="/admin/showPort" class="btn btn-neutral"> <i class="ni ni-settings text-danger"></i>&nbsp;Manage Portfolio</a>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection



@section('content')

<div class="container-fluid">
    <div class="row">

      <div class="col-xl-8 order-xl-1 center">

         @if(session()->has('success'))
         <div class="alert alert-success" role="alert">
                {{session('success')}}

        </div>
        @endif




        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">

              </div>

            </div>
          </div>
          <div class="card-body">
            <form role="form" action="/admin/updatePort/{{$pro->id}}" method="POST" enctype="multipart/form-data">

                {{csrf_field()}}
                {{method_field('PUT')}}

              <h6 class="heading-small text-muted mb-4">Portfolio information</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Title </label>
                      <input type="text" id="input-username" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{$pro->title}}">

                         @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                  </div>

                </div>




                <div class="row">

                    <div class="col-lg-6">

                      <div class="form-group">
                          <label class="form-control-label" for="image">Thumbnail Picture :</label>


                           <div class="custom-file">

                              <input type="file" id="dropify" required accept="image/x-png,image/gif,image/jpeg" name="thumb"
                            data-default-file="{{ $pro->Thumb_image?asset('public/uploads/'.$pro->Thumb_image->name):asset('img/no.jpeg') }}">

                          </div>
                      </div><br>
                    </div>




                    <div class="col-lg-6">
                      <div class="form-group">
                          <label class="form-control-label" for="image">Banner Picture :</label>


                          <div class="custom-file">


                              <input type="file" id="dropify2" required accept="image/x-png,image/gif,image/jpeg" name="banner"
                              data-default-file="{{ $pro->banner_image?asset('public/uploads/'.$pro->banner_image->name):asset('img/no.jpeg') }}">
                          </div>
                      </div><br>
                    </div>
                  </div>

                </div>





              <hr class="my-4" />

              <div class="pl-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Impact</label>
                  <textarea  name="impact" rows="4" class="form-control @error('impact') is-invalid @enderror " placeholder="Impact">{{$pro->impact}}</textarea>
                  @error('impact')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror

                </div>
              </div>

              <div class="pl-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Requirment</label>
                  <textarea  name="requirment" rows="4" class="form-control @error('requirment') is-invalid @enderror " placeholder="Requirment">{{$pro->requirment}}</textarea>
                  @error('requirment')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror

                </div>
              </div>

              <div class="pl-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Solution</label>
                  <textarea name="solution" rows="4" class="form-control @error('solution') is-invalid @enderror" placeholder="Solution">{{$pro->solution}}</textarea>
                  @error('solution')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror

                </div>
              </div>


              <div class="pl-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Description</label>
                  <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{$pro->description}}</textarea>
                  @error('description')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror

                </div>
              </div>

              <div class="col-4 text-center">
                <button type="submit" class="btn  btn-primary">Submit</button>
                <a href="#!" class="btn btn-danger">Back</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection

@section('js')

<script>
$('#dropify').dropify();

</script>

<script>
    $('#dropify2').dropify();

    </script>

@endsection
