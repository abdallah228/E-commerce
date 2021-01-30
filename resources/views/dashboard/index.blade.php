@extends('layouts.admin')

@section('content')

<div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div id="crypto-stats-3" class="row">
                    <div class="col-xl-3 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc BTC warning font-large-1" title="BTC"></i></h1>
                                        </div>
                                        <div class="col-5 pl-1">
                                            <h4>
                                            {{__('admin/index/index.TotalSales')}}
                                            </h4>
                                            
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>$2878</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="btc-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc ETH blue-grey lighten-1 font-large-1" title="ETH"></i></h1>
                                        </div>
                                        <div class="col-5 pl-1">
                                            <h4>{{__('admin/index/index.TotalRequests')}}</h4>
                                            
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>$944</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="eth-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc XRP info font-large-1" title="XRP"></i></h1>
                                        </div>
                                        <div class="col-5 pl-1">
                                            <h4>{{__('admin/index/index.ProductNumber')}}</h4>
                                            
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>1000</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="xrp-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc XRP info font-large-1" title="XRP"></i></h1>
                                        </div>
                                        <div class="col-5 pl-1">
                                            <h4>{{__('admin/index/index.ClientsNumber')}}</h4>
                                            
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>2000</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="xrp-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Candlestick Multi Level Control Chart -->

                <!-- Sell Orders & Buy Order -->
                <div class="row match-height">
                    <div class="col-12 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{__('admin/index/index.LatestRequests')}}</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                        <tr>
                                            <th>{{__('admin/index/index.OrderNumber')}}</th>
                                            <th>{{__('admin/index/index.ClientName')}}</th>
                                            <th>{{__('admin/index/index.Price')}}</th>
                                            <th>{{__('admin/index/index.OrderStatus')}}</th>
                                            <th>{{__('admin/index/index.TotalPrice')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="bg-success bg-lighten-5">
                                            <td>1001</td>
                                            <td> عبدالله خالد</td>
                                            <td><i class="cc BTC-alt"></i>1000</td>
                                            <td> متاح</td>
                                            <td> 1001</td>
                                        </tr>
                                     
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{__('admin/index/index.LatestEvaluation')}}</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <p class="text-muted"></p>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                        <tr>
                                            <th>{{__('admin/index/index.ClientName')}}</th>
                                            <th>{{__('admin/index/index.ProductType')}}</th>
                                            <th>{{__('admin/index/index.Evaluation')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="bg-danger bg-lighten-5">
                                            <td>عبدالله</td>
                                            <td><i class="cc BTC-alt"></i>ساعه يد</td>
                                            <td>8</td>
                                        </tr>
                                      
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Sell Orders & Buy Order -->
                
            </div>
        </div>
    </div>
------------------------------------------------------

@endsection




