<?php include __DIR__ . "/../templates/_header.php"; ?>

<div class="card mb-4">
    <div class="card-body">
        <label for="filter_date" class="form-label">Tanggal</label>
        <input type="date" class="form-control" id="filter_date" value="<?= !empty($date) ? $date : date('Y-m-d') ?>">
    </div>
</div>

<div class="card mb-4">
    <div class="card-header d-flex justify-content-center pt-6 flex-column">
        <h1>Daftar Toilet Sudah Dicek</h1>
        <p class="text-muted"><?= date('d F Y', strtotime($date)) ?></p>
    </div>
    <div class="card-body">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="table-report-checked">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Toilet</td>
                    <td>Pengecek</td>
                    <td>#</td>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($toilet_checked as $toilet) :
                    if ($toilet['id']) :
                ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $toilet['location'] ?></td>
                            <td><?= $toilet['username'] ?></td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-get-check" data-bs-toggle="modal" data-bs-target="#detail_check" data-id_toilet="<?= $toilet['id_toilet'] ?>">Info</button>
                            </td>
                        </tr>
                    <?php endif ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header d-flex justify-content-center pt-6 flex-column">
        <h1>Daftar Toilet Belum Dicek</h1>
        <p class="text-muted"><?= date('d F Y', strtotime($date)) ?></p>
    </div>
    <div class="card-body">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="table-report-unchecked">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Toilet</td>
                    <td>Note</td>
                    <td>#</td>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($toilet_checked as $toilet) :
                    if (!$toilet['id']) :
                ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $toilet['location'] ?></td>
                            <td><?= $toilet['note'] == "" ? "-" : $toilet['note'] ?></td>
                            <td>
                                <a href="<?= BASE_URL ?>/toilet/checklist/<?= $date ?>" class="btn btn-sm btn-success">Check!</a>
                            </td>
                        </tr>
                    <?php endif ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<div class="card mb-4">
    <div class="card-header d-flex justify-content-center pt-6 flex-column">
        <h1>Daftar Toilet Rusak / Kotor</h1>
        <p class="text-muted"><?= date('d F Y', strtotime($date)) ?></p>
    </div>
    <div class="card-body">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="table-report-worst">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Toilet</td>
                    <td>Rusak / Kotor</td>
                    <td>Pengecek</td>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($toilet_worst as $toilet) :
                    if (!empty($toilet['result_worst'])) :
                ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $toilet['location'] ?></td>
                            <td>
                                <ul>
                                    <?php foreach ($toilet['result_worst'] as $worst) : ?>
                                        <li><?= ucwords($worst) ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </td>
                            <td><?= $toilet['username'] ?></td>
                        </tr>
                    <?php endif ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="detail_check" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="detail_check_header">
                <h2 class="fw-bold mb-0">Detail Pengecekan Toilet</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" data-kt-toilets-modal-action="close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="detail_check_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_toilet_header" data-kt-scroll-wrappers="#kt_modal_add_toilet_scroll" data-kt-scroll-offset="200px">
                    <table class="table table-hovered table-bordered">
                        <thead>
                            <tr>
                                <th id="location" class="text-center" colspan="2"></th>
                            </tr>
                            <tr>
                                <th>Items</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Kloset</th>
                                <td id="Kloset"></td>
                            </tr>
                            <tr>
                                <th>Wastafel</th>
                                <td id="Wastafel"></td>
                            </tr>
                            <tr>
                                <th>Lantai</th>
                                <td id="Lantai"></td>
                            </tr>
                            <tr>
                                <th>Dinding</th>
                                <td id="Dinding"></td>
                            </tr>
                            <tr>
                                <th>Kaca</th>
                                <td id="Kaca"></td>
                            </tr>
                            <tr>
                                <th>Bau</th>
                                <td id="Bau"></td>
                            </tr>
                            <tr>
                                <th>Sabun</th>
                                <td id="Sabun"></td>
                            </tr>
                        </tbody>
                    </table>

                    <p class="text-end mb-5">Di cek oleh,</p>
                    <p id="pengecek" class="text-end fw-bold"></p>
                </div>
                <div class="text-center pt-10">
                    <button type="reset" class="btn btn-info me-3" data-kt-toilets-modal-action="cancel" data-bs-dismiss="modal">Ok</button>
                    <!-- <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button> -->
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    let table_checked = new DataTable('#table-report-checked');
    let table_unchecked = new DataTable('#table-report-unchecked');
    let table_worst = new DataTable('#table-report-worst');

    $("#filter_date").on('change', function() {
        window.location.href = "<?= BASE_URL ?>/report/index/" + $(this).val();
    })



    function status(status, type = "") {
        var result;
        var bg;

        if (type == "") {
            if (status == 1) {
                bg = "primary"
                result = "Bersih";
            } else if (status == 2) {
                bg = "danger"
                result = "Rusak";
            } else if (status == 3) {
                bg = "warning"
                result = "Kotor";
            }
        } else {
            if (status == 1) {
                bg = "primary"
                result = "Ada";
            } else if (status == 2) {
                bg = "warning"
                result = "Tidak";
            } else if (status == 3) {
                bg = "danger"
                result = "Hilang";
            }
        }

        var html = `<span class='badge bg-${bg} text-white'>${result}</span>`;

        return html;
    }

    $(".btn-get-check").on('click', function() {
        $.ajax({
            url: "<?= BASE_URL ?>/toilet/get_check/",
            data: {
                id: $(this).data('id_toilet'),
                date: "<?= $date ?>"
            },
            dataType: "JSON",
            method: "GET",
            success: function(result) {
                var bau = result.bau == 1 ? `<span class='badge bg-dark text-white'>Ya</span>` : `<span class='badge bg-light'>Tidak</span>`

                $("#location").text(result.location);
                $("#Kloset").html(status(result.kloset));
                $("#Wastafel").html(status(result.wastafel));
                $("#Lantai").html(status(result.lantai));
                $("#Dinding").html(status(result.dinding));
                $("#Kaca").html(status(result.kaca));
                $("#Bau").html(bau);
                $("#Sabun").html(status(result.sabun, 'sabun'));

                $("#pengecek").text(result.username)
            }
        })
    })
</script>

<?php include __DIR__ . "/../templates/_footer.php"; ?>