@extends('Adminarea/Layouts/app')


@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">

<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="http://example.com/image-uploader.min.css">
@endsection


@section('gellary')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Add Portfolio</h6>

                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="/admin/showPort" class="btn btn-sm btn-neutral">Manage Portfolio</a>

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


            <form role="form" action="/admin/storePort" method="POST" enctype="multipart/form-data">

                {{csrf_field()}}


              <div class="pl-lg-4">

                <div class="row">

                  <div class="col-lg-12">

                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Title </label>
                      <input type="text" id="input-username" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="">
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
                            <input type="file" name="thumb" accept=".jpg, .jpeg, .png" class="custom-file-input" id="customFileLang" lang="en">
                            <label class="custom-file-label" for="customFileLang">Select file</label>
                        </div>
                    </div><br>
                  </div>




                  <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label" for="image">Banner Picture :</label>


                        <div class="custom-file">
                            <input type="file" name="banner" accept=".jpg, .jpeg, .png" class="custom-file-input" id="customFileLang" lang="en">
                            <label class="custom-file-label" for="customFileLang">Select file</label>
                        </div>
                    </div><br>
                  </div>
                </div>

              </div>

              <hr class="my-4" />


              <div class="pl-lg-4">

                <div class="row">

                  <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label" for="image">Other Pictures :</label>


                        <div class="custom-file">
                            <input type="file" name="multi[]" accept=".jpg, .jpeg, .png" class="custom-file-input" id="customFileLang" lang="en" multiple>
                            <label class="custom-file-label" for="customFileLang">Select file</label>
                        </div>
                    </div><br>

                    </div>
                  </div>


                </div>



              <hr class="my-4" />

              <div class="pl-lg-4">

                <div class="form-group">
                  <label class="form-control-label">Impact</label>
                  <textarea  name="impact" rows="4" class="form-control @error('impact') is-invalid @enderror " placeholder="Impact"></textarea>
                  @error('impact')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror

                </div>
              </div>

              <div class="pl-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Requirment</label>
                  <textarea  name="requirment" rows="4" class="form-control @error('requirment') is-invalid @enderror " placeholder="Requirment"></textarea>
                  @error('requirment')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror

                </div>
              </div>

              <div class="pl-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Solution</label>
                  <textarea name="solution" rows="4" class="form-control @error('solution') is-invalid @enderror" placeholder="Solution"></textarea>
                  @error('solution')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror

                </div>
              </div>


              <div class="pl-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Description</label>
                  <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Description"></textarea>
                  @error('description')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror

                </div>
              </div>

              <div class="col-4 text-center">
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                <a href="#!" class="btn btn-sm btn-danger">Back</a>
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

<script type="text/javascript" src="http://example.com/jquery.min.js"></script>
<script type="text/javascript" src="http://example.com/image-uploader.min.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>



          @endsection
