@extends('layouts.admin.master')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 mt-4">
                    <div class="col-12">
                        <h1 class="m-0 text-dark">
                            <a class="nav-link drawer" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                            کاربران
                            <a class="btn btn-primary float-left text-white py-2 px-4" href="users-add.php">افزودن کاربر
                                جدید</a>
                        </h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">لیست کاربران</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="جستجو">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i
                                                    class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="table table-striped table-valign-middle mb-0">
                                <table class="table table-hover mb-0">
                                    <tbody>
                                        <tr>
                                            <th>آیدی</th>
                                            <th>نام و نام خانوادگی</th>
                                            <th>ایمیل</th>
                                            <th>موبایل</th>
                                            <th>نقش کاربری</th>
                                            <th>تاریخ عضویت</th>
                                            <th>عملیات</th>
                                        </tr>
                                        <tr>
                                            <td>۱۸۳</td>
                                            <td>میلاد بسحاق</td>
                                            <td>miladboshaghh@gmail.com</td>
                                            <td>09168167426</td>
                                            <td>کاربر عادی</td>
                                            <td>۲۵ مرداد ۱۴۰۰</td>
                                            <td>
                                                <a href="#" class="btn btn-default btn-icons"><i class="fa fa-edit"></i></a>
                                                <a href="#" class="btn btn-default btn-icons"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>۱۸۳</td>
                                            <td>میلاد بسحاق</td>
                                            <td>miladboshaghh@gmail.com</td>
                                            <td>09168167426</td>
                                            <td>کاربر عادی</td>
                                            <td>۲۵ مرداد ۱۴۰۰</td>
                                            <td>
                                                <a href="#" class="btn btn-default btn-icons"><i class="fa fa-edit"></i></a>
                                                <a href="#" class="btn btn-default btn-icons"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>۱۸۳</td>
                                            <td>میلاد بسحاق</td>
                                            <td>miladboshaghh@gmail.com</td>
                                            <td>09168167426</td>
                                            <td>کاربر عادی</td>
                                            <td>۲۵ مرداد ۱۴۰۰</td>
                                            <td>
                                                <a href="#" class="btn btn-default btn-icons"><i class="fa fa-edit"></i></a>
                                                <a href="#" class="btn btn-default btn-icons"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>۱۸۳</td>
                                            <td>میلاد بسحاق</td>
                                            <td>miladboshaghh@gmail.com</td>
                                            <td>09168167426</td>
                                            <td>کاربر عادی</td>
                                            <td>۲۵ مرداد ۱۴۰۰</td>
                                            <td>
                                                <a href="#" class="btn btn-default btn-icons"><i class="fa fa-edit"></i></a>
                                                <a href="#" class="btn btn-default btn-icons"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>۱۸۳</td>
                                            <td>میلاد بسحاق</td>
                                            <td>miladboshaghh@gmail.com</td>
                                            <td>09168167426</td>
                                            <td>کاربر عادی</td>
                                            <td>۲۵ مرداد ۱۴۰۰</td>
                                            <td>
                                                <a href="#" class="btn btn-default btn-icons"><i class="fa fa-edit"></i></a>
                                                <a href="#" class="btn btn-default btn-icons"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>۱۸۳</td>
                                            <td>میلاد بسحاق</td>
                                            <td>miladboshaghh@gmail.com</td>
                                            <td>09168167426</td>
                                            <td>کاربر عادی</td>
                                            <td>۲۵ مرداد ۱۴۰۰</td>
                                            <td>
                                                <a href="#" class="btn btn-default btn-icons"><i class="fa fa-edit"></i></a>
                                                <a href="#" class="btn btn-default btn-icons"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="d-flex justify-content-center">
                            <ul class="pagination mt-3">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item"><a class="page-link" href="#">۱</a></li>
                                <li class="page-item"><a class="page-link" href="#">۲</a></li>
                                <li class="page-item"><a class="page-link" href="#">۳</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection