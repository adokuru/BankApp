@extends('layouts.userdashboard.app')
@section('main')

<div class="container">
    <div class="page-title">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-4">
                <div class="page-title-content">
                    <h3>Invoice</h3>
                    <p class="mb-2">Welcome Intez Invoice page</p>
                </div>
            </div>
            <div class="col-auto">
                <div class="breadcrumbs"><a href="#">Home </a><span><i
                            class="ri-arrow-right-s-line"></i></span><a href="#">Invoice</a></div>
            </div>
        </div>
    </div>
    <div class="row">
        
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header flex-row">
                    <h4 class="card-title">Invoice </h4>
                    <a class="btn btn-primary" href="create-invoice.html"><span><i
                                class="bi bi-plus"></i></span>Create Invoice</a>
                </div>
                <div class="card-body">
                    <div class="invoice-table">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check"><input class="form-check-input"
                                                    type="checkbox" id="flexCheckDefault" value=""></div>
                                        </th>
                                        <th>Client</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Due</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check"><input class="form-check-input"
                                                    type="checkbox" id="flexCheckDefault" value=""></div>
                                        </td>
                                        <td><img src="images/avatar/1.jpg" alt="" width="30"
                                                class="me-2">Weston P. Thomas</td>
                                        <td>$254</td>
                                        <td><span class="badge px-3 py-2 bg-success">Paid</span></td>
                                        <td>February 16, 2021</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check"><input class="form-check-input"
                                                    type="checkbox" id="flexCheckDefault" value=""></div>
                                        </td>
                                        <td><img src="images/avatar/2.jpg" alt="" width="30"
                                                class="me-2">William D. Gibson</td>
                                        <td>$254</td>
                                        <td><span class="badge px-3 py-2 bg-success">Paid</span></td>
                                        <td>December 21, 2021</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check"><input class="form-check-input"
                                                    type="checkbox" id="flexCheckDefault" value=""></div>
                                        </td>
                                        <td><img src="images/avatar/3.jpg" alt="" width="30" class="me-2">John
                                            C. Adams</td>
                                        <td>$254</td>
                                        <td><span class="badge px-3 py-2 bg-success">Paid</span></td>
                                        <td>March 21, 2021</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check"><input class="form-check-input"
                                                    type="checkbox" id="flexCheckDefault" value=""></div>
                                        </td>
                                        <td><img src="images/avatar/4.jpg" alt="" width="30" class="me-2">John
                                            L. Foster</td>
                                        <td>$254</td>
                                        <td><span class="badge px-3 py-2 bg-warning">Due</span></td>
                                        <td>April 29, 2021</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check"><input class="form-check-input"
                                                    type="checkbox" id="flexCheckDefault" value=""></div>
                                        </td>
                                        <td><img src="images/avatar/5.jpg" alt="" width="30" class="me-2">Terry
                                            P. Camacho</td>
                                        <td>$254</td>
                                        <td><span class="badge px-3 py-2 bg-danger">Cancel</span></td>
                                        <td>November 26, 2021</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection