<?php
/* @var $this yii\web\View */

$this->title = 'Панель управления сайтом';
?>
<div class="row">
    <div class="col-md-8">
    <!-- TABLE: LATEST ORDERS -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Заявки на бронирование</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Item</th>
                        <th>Status</th>
                        <th>Popularity</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><a href="pages/examples/invoice.html">OR9842</a></td>
                        <td>Call of Duty IV</td>
                        <td><span class="label label-danger">Обработана</span></td>
                        <td><div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div></td>
                    </tr>
                    <tr>
                        <td><a href="pages/examples/invoice.html">OR1848</a></td>
                        <td>Samsung Smart TV</td>
                        <td><span class="label label-info">Новая</span></td>
                        <td><div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div></td>
                    </tr>
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
        </div><!-- /.box-body -->
        <div class="box-footer clearfix">
            <a href="#" class="btn btn-sm btn-default btn-flat pull-right">Просмотреть все заявки</a>
        </div><!-- /.box-footer -->
    </div><!-- /.box -->
</div><!-- /.col -->
</div>