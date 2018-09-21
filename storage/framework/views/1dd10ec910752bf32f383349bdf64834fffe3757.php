<?php $__env->startSection('content'); ?>
    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="th-sm">Id
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Name
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">PRICE
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">DISCOUNT
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">PRICE WITH DISCOUTN
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">ACTION
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($product->id); ?></td>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e($product->price); ?></td>
                <td><?php echo e($product->discount); ?></td>
                <td><?php echo e($product->priceWithDiscount); ?></td>
                <td><a href="<?php echo e(route('products.buy', $product->id)); ?>">
                        <button type="button" class="btn btn-lg btn-primary">BUY</button>
                    </a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.website', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>