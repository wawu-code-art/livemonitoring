<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Live Monitoring Stock
                </div>
                <div class="card-body">
                    <h2 class="card-title">Barcode: <?= $historymonitoringstock['bc_entried']; ?></h3>
                    <p class="card-text">Judge Date In: <?= $historymonitoringstock['jdge_date_in']; ?></p>
                    <p class="card-text">Date Shift In: <?= $historymonitoringstock['date_shift_in']; ?></p>
                    <p class="card-text">Ydate Shift In: <?= $historymonitoringstock['ydate_shift_in']; ?></p>
                    <p class="card-text">Judge Date Out: <?= $historymonitoringstock['jdge_date_out']; ?></p>
                    <p class="card-text">Date Shift Out: <?= $historymonitoringstock['date_shift_out']; ?></p>
                    <p class="card-text">Ydate Shift Out: <?= $historymonitoringstock['ydate_shift_out']; ?></p>
                    <p class="card-text">Judge: <?= $historymonitoringstock['jdge']; ?></p>
                    <p class="card-text">Probcode: <?= $historymonitoringstock['probcode']; ?></p>
                    <p class="card-text">PIC: <?= $historymonitoringstock['pic']; ?></p>
                    <p class="card-text">PIC Out: <?= $historymonitoringstock['pic_out']; ?></p>
                    <p class="card-text">Operator: <?= $historymonitoringstock['opr']; ?></p>
                    <p class="card-text">Operator Out: <?= $historymonitoringstock['opr_out']; ?></p>
                    <p class="card-text">Catatan: <?= $historymonitoringstock['catatan']; ?></p>
                    <a href="<?= base_url(); ?>historymonitoringstock" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
