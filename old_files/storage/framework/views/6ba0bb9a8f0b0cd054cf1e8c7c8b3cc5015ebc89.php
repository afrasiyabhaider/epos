<?php $__env->startSection('title', __('report.expense_report')); ?>

<?php $__env->startSection('css'); ?>
    <?php echo Charts::styles(['highcharts']); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo e(__('report.expense_report'), false); ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row no-print">
        <div class="col-md-12">
            <?php $__env->startComponent('components.filters', ['title' => __('report.filters')]); ?>
              <?php echo Form::open(['url' => action('ReportController@getExpenseReport'), 'method' => 'get' ]); ?>

                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('location_id',  __('purchase.business_location') . ':'); ?>

                        <?php echo Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%']);; ?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('category_id','Category:'); ?>

                        <?php echo Form::select('category', $categories, null, ['placeholder' =>
                        __('report.all'), 'class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'category_id']);; ?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo Form::label('trending_product_date_range', __('report.date_range') . ':'); ?>

                        <?php echo Form::text('date_range', \Carbon::createFromTimestamp(strtotime('first day of this month'))->format(session('business.date_format')) . ' ~ ' . \Carbon::createFromTimestamp(strtotime('last day of this month'))->format(session('business.date_format')) , ['placeholder' => __('lang_v1.select_a_date_range'), 'class' => 'form-control', 'id' => 'trending_product_date_range', 'readonly']);; ?>

                    </div>
                </div>
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-primary pull-right"><?php echo app('translator')->getFromJson('report.apply_filters'); ?></button>
                </div> 
                <?php echo Form::close(); ?>

            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <?php $__env->startComponent('components.widget', ['class' => 'box-primary']); ?>
                <?php echo $chart->html(); ?>

            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
    <div class="row no-print">
        <div class="col-sm-12">
            <button type="button" class="btn btn-primary pull-right" 
            aria-label="Print" onclick="window.print();"
            ><i class="fa fa-print"></i> <?php echo app('translator')->getFromJson( 'messages.print' ); ?></button>
        </div>
    </div>

</section>
<!-- /.content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/report.js?v=' . $asset_v), false); ?>"></script>
    <?php echo Charts::assets(['highcharts']); ?>

    <?php echo $chart->script(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>