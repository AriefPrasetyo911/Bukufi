@extends('Back-end.Master-Layout.master-admin')

@section('push-style')
<style type="text/css">
    .users-list>li
    {
        width: 20%;
    }
</style>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Version 1.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-8">
                  <!-- MAP & BOX PANE -->
                  <div class="box box-success">
                    <div class="box-header with-border">
                      <h3 class="box-title">Visitors Report</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                      <div class="row">
                        <div class="col-md-9 col-sm-8">
                          <div class="pad">
                            <!-- Map will be created here -->
                            <div id="world-map-markers" style="height: 325px;"></div>
                          </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-4">
                          <div class="pad box-pane-right bg-green" style="min-height: 280px">
                            <div class="description-block margin-bottom">
                              <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                              <h5 class="description-header">8390</h5>
                              <span class="description-text">Visits</span>
                            </div>
                            <!-- /.description-block -->
                            <div class="description-block margin-bottom">
                              <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                              <h5 class="description-header">30%</h5>
                              <span class="description-text">Referrals</span>
                            </div>
                            <!-- /.description-block -->
                            <div class="description-block">
                              <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                              <h5 class="description-header">70%</h5>
                              <span class="description-text">Organic</span>
                            </div>
                            <!-- /.description-block -->
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                  <div class="row">
                    <div class="col-md-12">
                      <!-- USERS LIST -->
                      <div class="box box-danger">
                        <div class="box-header with-border">
                          <h3 class="box-title">Latest Members</h3>

                          <div class="box-tools pull-right">
                            <span class="label label-danger">8 New Members</span>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                          </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                          <ul class="users-list clearfix">
                            <li>
                              <img src="{{asset('theme/icons/avatar.png')}}" alt="User Image">
                              <a class="users-list-name" href="#">Alexander Pierce</a>
                              <span class="users-list-date">Today</span>
                            </li>
                            <li>
                              <img src="{{asset('theme/icons/avatar5.png')}}" alt="User Image">
                              <a class="users-list-name" href="#">Norman</a>
                              <span class="users-list-date">Yesterday</span>
                            </li>
                            <li>
                              <img src="{{asset('theme/icons/avatar2.png')}}" alt="User Image">
                              <a class="users-list-name" href="#">Jane</a>
                              <span class="users-list-date">12 Jan</span>
                            </li>
                            <li>
                              <img src="{{asset('theme/icons/avatar5.png')}}" alt="User Image">
                              <a class="users-list-name" href="#">John</a>
                              <span class="users-list-date">12 Jan</span>
                            </li>
                            <li>
                              <img src="{{asset('theme/icons/avatar5.png')}}" alt="User Image">
                              <a class="users-list-name" href="#">Alexander</a>
                              <span class="users-list-date">13 Jan</span>
                            </li>
                            <li>
                              <img src="{{asset('theme/icons/avatar2.png')}}" alt="User Image">
                              <a class="users-list-name" href="#">Sarah</a>
                              <span class="users-list-date">14 Jan</span>
                            </li>
                            <li>
                              <img src="{{asset('theme/icons/avatar3.png')}}" alt="User Image">
                              <a class="users-list-name" href="#">Nora</a>
                              <span class="users-list-date">15 Jan</span>
                            </li>
                            <li>
                              <img src="{{asset('theme/icons/avatar2.png')}}" alt="User Image">
                              <a class="users-list-name" href="#">Nadia</a>
                              <span class="users-list-date">15 Jan</span>
                            </li>
                          </ul>
                          <!-- /.users-list -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                          <a href="javascript:void(0)" class="uppercase">View All Users</a>
                        </div>
                        <!-- /.box-footer -->
                      </div>
                      <!--/.box -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.col -->

                <div class="col-md-4">
                  <!-- Info Boxes Style 2 -->
                  <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Inventory</span>
                      <span class="info-box-number">5,200</span>

                      <div class="progress">
                        <div class="progress-bar" style="width: 50%"></div>
                      </div>
                      <span class="progress-description">
                            50% Increase in 30 Days
                          </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                  <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Mentions</span>
                      <span class="info-box-number">92,050</span>

                      <div class="progress">
                        <div class="progress-bar" style="width: 20%"></div>
                      </div>
                      <span class="progress-description">
                            20% Increase in 30 Days
                          </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                  <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Downloads</span>
                      <span class="info-box-number">114,381</span>

                      <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                      </div>
                      <span class="progress-description">
                            70% Increase in 30 Days
                          </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                  <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Direct Messages</span>
                      <span class="info-box-number">163,921</span>

                      <div class="progress">
                        <div class="progress-bar" style="width: 40%"></div>
                      </div>
                      <span class="progress-description">
                            40% Increase in 30 Days
                          </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->

                  <div class="box box-default">
                    <div class="box-header with-border">
                      <h3 class="box-title">Browser Usage</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-8">
                          <div class="chart-responsive">
                            <canvas id="pieChart" height="150"></canvas>
                          </div>
                          <!-- ./chart-responsive -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                          <ul class="chart-legend clearfix">
                            <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
                            <li><i class="fa fa-circle-o text-green"></i> IE</li>
                            <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                            <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
                            <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
                            <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
                          </ul>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                      <ul class="nav nav-pills nav-stacked">
                        <li><a href="#">United States of America
                          <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                        <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
                        </li>
                        <li><a href="#">China
                          <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
                      </ul>
                    </div>
                    <!-- /.footer -->
                  </div>
                  <!-- /.box -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
