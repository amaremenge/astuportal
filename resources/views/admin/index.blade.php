@extends('layouts.admin')


@section('content')
@widget('breadcumb',['header'=>'Dashboard','sub-header'=>'Everything about the portal','link0'=>'Home','link9'=>'Dashbord'])


<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-yellow">
    <div class="inner">
      <h3>{{$students->count()}}</h3>
      <p>Students</p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fa fa-arrow-circle-right"></i>
    </a>
  </div>
</div>

<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-yellow">
    <div class="inner">
      <h3>{{$employees->count()}}</h3>
      <p>Employees</p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fa fa-arrow-circle-right"></i>
    </a>
  </div>
</div>

<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-red">
    <div class="inner">
      <h3>?</h3>
      <p>Unique Visitors</p>
    </div>
    <div class="icon">
      <i class="ion ion-pie-graph"></i>
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fa fa-arrow-circle-right"></i>
    </a>
  </div>
</div>

<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-red">
    <div class="inner">
      <h3>?</h3>
      <p>Page Views</p>
    </div>
    <div class="icon">
      <i class="ion ion-pie-graph"></i>
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fa fa-arrow-circle-right"></i>
    </a>
  </div>
</div>
<!-- ./col -->



<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
            <h3 class="box-title">Modules</h3>
        </div>
        <div class="box-body no-padding">
          <table class="table table-striped">
            <tr> 
              <th style="width: 10px">#</th>
              <th>Title</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            <?php $module_index =1;?>
            @foreach(Module::all() as $k=>$m)
            <tr>
              <td>{{$module_index}}</td>
              <td>{{$m}}</td>
              <td>
                @if($m->enabled())
                <a class="badge bg-green">Active</a>
                @else
                <a class="badge bg-red">Inactive</a>
                @endif
              </td>
              <td>
                    <a class="btn label label-success" href="{{route('admin.module.status_toggle',['module'=>$m])}}" >Change status</a>
              </td>
            </tr>
            <?php $module_index++;?>
            @endforeach

<!--             <tr>
              <td>2</td><td>Meeting management</td><td><a class="badge bg-green">Active</a></td>
            </tr>
            <tr>
              <td>3</td><td>Staff Evaluation</td><td><a class="badge bg-green">Active</a></td>
            </tr>
            <tr>
              <td>4</td><td>File Sharing</td><td></td>
            </tr> -->
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      @widget('Chart.pie',[
          'header' => 'Users Sex ratio',
          'value1' => $males,
          'label1' => 'Male',
          'value2' => $females,
          'label2' => 'Female',
      ])
    </div>
  </div>
</section>






@endsection




@section('js')

@endsection