<a href="javascript:void(0)" class="list-group-item draggable " data-price="<?= $model->price_export ?>">
    <i class="fa fa-plus fa-fw"></i>   <?= $model->name;?>
    <span class="pull-right text-muted small">
        <em><?= $model->formatPrice($model->price_export) ?></em>
    </span>
</a>