<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Live Monitoring Stock
                </div>
                <div class="card-body">
                    <h2 class="card-title">Barcode: <?= $livemonitoringstock['bc_entried']; ?></h3>
                    <p class="card-text">Judge Date In: <?= $livemonitoringstock['jdge_date_in']; ?></p>
                    <p class="card-text">Date Shift In: <?= $livemonitoringstock['date_shift_in']; ?></p>
                    <p class="card-text">Ydate Shift In: <?= $livemonitoringstock['ydate_shift_in']; ?></p>
                    <p class="card-text">Judge Date Out: <?= $livemonitoringstock['jdge_date_out']; ?></p>
                    <p class="card-text">Date Shift Out: <?= $livemonitoringstock['date_shift_out']; ?></p>
                    <p class="card-text">Ydate Shift Out: <?= $livemonitoringstock['ydate_shift_out']; ?></p>
                    <p class="card-text">Judge: <?= $livemonitoringstock['jdge']; ?></p>
                    <p class="card-text">Probcode: <?= $livemonitoringstock['probcode']; ?></p>
                    <p class="card-text">PIC: <?= $livemonitoringstock['pic']; ?></p>
                    <p class="card-text">PIC Out: <?= $livemonitoringstock['pic_out']; ?></p>
                    <p class="card-text">Operator: <?= $livemonitoringstock['opr']; ?></p>
                    <p class="card-text">Operator Out: <?= $livemonitoringstock['opr_out']; ?></p>
                    <p class="card-text">Catatan: <?= $livemonitoringstock['catatan']; ?></p>
                    <a href="<?= base_url(); ?>livemonitoringstock" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>
