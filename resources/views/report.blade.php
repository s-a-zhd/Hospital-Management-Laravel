@extends('Admin.sidebar')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<div class="page-wrapper">
    <div class="content" id="">
        <div class="row">
            <div class="col-sm-5 col-4">
                <h4 class="page-title">Payslip</h4>
            </div>
            <div class="col-sm-7 col-8 text-right m-b-30">
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-white">CSV</button>
                    <button class="btn btn-white" id="cmd">PDF</button>
                    <button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</button>
                </div>
            </div>
        </div>
        <div class="row" id="content">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="payslip-title">Payslip for the month of July 2018</h4>
                    <div class="row">
                        <div class="col-sm-6 m-b-20">
                            <img src="/assets/img/logo-dark.png" class="inv-logo" alt="">
                            <ul class="list-unstyled mb-0">
                                <li>PreClinic</li>
                                <li>3864 Quiet Valley Lane,</li>
                                <li>Sherman Oaks, CA, 91403</li>
                            </ul>
                        </div>
                        <div class="col-sm-6 m-b-20">
                            <div class="invoice-details">
                                <h3 class="text-uppercase">Payslip #49029</h3>
                                <ul class="list-unstyled">
                                    <li>Salary Month: <span>July, 2018</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 m-b-20">
                            <ul class="list-unstyled">
                                <li>
                                    <h5 class="mb-0"><strong>{{ $list->name }}</strong></h5></li>
                                        <li><span>{{ $list->role }}</span></li>
                                <li>Employee ID: {{ $list->id }}</li>
                                <li>Joining Date: {{ $list->join_date }}</li>
                                <li>Email : {{ $list->email }}</li>
                                <li>Contact : {{ $list->contact }} </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <h4 class="m-b-10"><strong>Earnings</strong></h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Basic Salary</strong>{{ $list->salary }} <span class="float-right"></span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>House Rent Allowance (H.R.A.)</strong> <span class="float-right">$55</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Conveyance</strong> <span class="float-right">$55</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Other Allowance</strong> <span class="float-right">$55</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Earnings</strong> <span class="float-right"><strong>$55</strong></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <h4 class="m-b-10"><strong>Deductions</strong></h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Tax Deducted at Source (T.D.S.)</strong> <span class="float-right">$0</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Provident Fund</strong> <span class="float-right">$0</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>ESI</strong> <span class="float-right">$0</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Loan</strong> <span class="float-right">$300</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Deductions</strong> <span class="float-right"><strong>$59698</strong></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <p><strong>Net Salary: $59698</strong> (Fifty nine thousand six hundred and ninety eight only.)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var doc = new jsPDF();
var specialElementHandlers = {
'#editor': function (element, renderer) {
return true;
}
};

$('#cmd').click(function () {   
doc.fromHTML($('#content').html(), 15, 15, {
'width': 170,
    'elementHandlers': specialElementHandlers
});
doc.save('report.pdf');
});

        </script>
    </div>
    
@endsection