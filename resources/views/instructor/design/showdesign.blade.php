@extends('admin/layouts.master')
@section('title', 'All Content - Instructor')
@section('body')

<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">All Content</h3>
          @php
          $id=Auth::id();
          @endphp
          <a class="btn btn-info btn-sm" href={{url('http://localhost/product-design?user_id='.$id)}}>+ Add New Design</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Cart Id</th>
            <th>Instructor</th>
            <th>Thumbnail</th>
            <th>Product Name</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_data as $design_data)
            <tr>
              <td>{{$design_data->cart_id}}</td>
              @php
                      $cors = App\User::where('id', $design_data->user_id)->first();
                    @endphp
              <td>{{ $cors->fname }}</td>
              <td></td>
              <td>{{$design_data->product_name}}</td> 
              <td>
                <form action="{{ url('ansr.quick',$design_data->id) }}" method="POST">
                  {{ csrf_field() }}
                  <button type="Submit" class="btn btn-xs {{ $design_data->status ==1 ? 'btn-success' : 'btn-danger' }}">
                    @if($design_data->status ==1)
                    Active
                    @else
                    Deactive
                    @endif
                  </button>
                </form>
              </td>
              <td><a class="btn btn-success btn-sm" href="{{url('page/'.$design_data->id.'/edit')}}">
                  <i class="glyphicon glyphicon-pencil"></i></a>
                </td>
               <td>
                <form  method="post" action="{{url('instructorquestion/'.$design_data->id)}}" data-parsley-validate class="form-horizontal form-label-left">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <button type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button>
                </form>
              </td>
            </tr>  
          @endforeach
        </tbody>
      </table>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@endsection
