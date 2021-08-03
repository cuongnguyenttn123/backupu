@extends('user.layout.layout')
@section('content')
<!-- Data Table area Start-->
<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">
                    <div class="basic-tb-hd">
                        <h2>Transaction Report</h2>
                        <p>All Transaction Report</p>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>No#</th>
                                    <th>Amount</th>
                                    <th>Mode</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>$39.50</td>
                                    <td>Paypal</td>
                                    <td>25-Mar-2020</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>$29.50</td>
                                    <td>Stripe</td>
                                    <td>25-Mar-2020</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>$300.50</td>
                                    <td>Paypal</td>
                                    <td>26-Mar-2020</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>$56.00</td>
                                    <td>Paypal</td>
                                    <td>28-Mar-2020</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No#</th>
                                    <th>Amount</th>
                                    <th>Mode</th>
                                    <th>Date</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Data Table area End-->

@endsection