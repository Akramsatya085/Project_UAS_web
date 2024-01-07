<?php include __DIR__ . "/../templates/_header.php"; ?>

<div class="card mb-4">
    <div class="card-body">
        <label for="filter_date" class="form-label">Tanggal</label>
        <input type="date" class="form-control" id="filter_date" value="<?= !empty($date) ? $date : date('Y-m-d') ?>">
    </div>
</div>

<div class="card">
    <div class="card-header pt-6" style="display: block !important;">
        <h1 class="">Daftar Toilet Belum Di Cek</h1>
        <p class="text-muted mt-2 mb-3"><?= !empty($date) ? date('d F Y', strtotime($date)) : date('d F Y') ?></p>
    </div>
    <div class="card-body">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_toilet">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Toilet</th>
                    <th>Note</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($unchecked_toilets as $toilet) :
                    if (!$toilet['id']) :
                ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $toilet['location'] ?></td>
                            <td><?= $toilet['note'] == "" ? '-' : $toilet['note'] ?></td>
                            <td>
                                <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <a href="#" data-id_toilet="<?= $toilet['id_toilet'] ?>" data-bs-toggle="modal" data-bs-target="#kt_modal_check_toilet" class="menu-link px-3 btn-check-toilet">Edit</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    <?php endif ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>




<div class="modal fade" id="kt_modal_check_toilet" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_edit_toilet_header">
                <h2 class="fw-bold mb-0">Edit <span id="title_check"></span></h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" data-kt-toilets-modal-action="close" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body px-3 my-7">
                <form id="kt_modal_edit_toilet_form" method="post" class="form" action="/toilet/toilet/check_toilet">
                    <div class="d-flex flex-column scroll-y px-3 px-lg-5" id="kt_modal_edit_toilet_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_toilet_header" data-kt-scroll-wrappers="#kt_modal_edit_toilet_scroll" data-kt-scroll-offset="300px">
                        <input type="hidden" name="id" id="field_id">
                        <div class="mb-5">
                            <label class="required fw-semibold fs-6 mb-5">Kloset</label>

                            <div class="d-flex gap-4">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input required class="form-check-input me-1" name="kloset" type="radio" value="1" id="option_kloset_bersih" />
                                    <label class="form-check-label" for="option_kloset_bersih">
                                        <div class="fw-bold text-gray-800">Bersih</div>
                                    </label>
                                </div>

                                <div class="form-check form-check-custom form-check-solid">
                                    <input required class="form-check-input me-1" name="kloset" type="radio" value="2" id="option_kloset_kotor" />
                                    <label class="form-check-label" for="option_kloset_kotor">
                                        <div class="fw-bold text-gray-800">Kotor</div>
                                    </label>
                                </div>

                                <div class="form-check form-check-custom form-check-solid">
                                    <input required class="form-check-input me-1" name="kloset" type="radio" value="3" id="option_kloset_rusak" />
                                    <label class="form-check-label" for="option_kloset_rusak">
                                        <div class="fw-bold text-gray-800">Rusak</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class='separator separator-dashed my-5'></div>
                        <div class="mb-5">
                            <label class="required fw-semibold fs-6 mb-5">Wastafel</label>

                            <div class="d-flex gap-4">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input required class="form-check-input me-1" name="wastafel" type="radio" value="1" id="option_wastafel_bersih" />
                                    <label class="form-check-label" for="option_wastafel_bersih">
                                        <div class="fw-bold text-gray-800">Bersih</div>
                                    </label>
                                </div>

                                <div class="form-check form-check-custom form-check-solid">
                                    <input required class="form-check-input me-1" name="wastafel" type="radio" value="2" id="option_wastafel_kotor" />
                                    <label class="form-check-label" for="option_wastafel_kotor">
                                        <div class="fw-bold text-gray-800">Kotor</div>
                                    </label>
                                </div>

                                <div class="form-check form-check-custom form-check-solid">
                                    <input required class="form-check-input me-1" name="wastafel" type="radio" value="3" id="option_wastafel_rusak" />
                                    <label class="form-check-label" for="option_wastafel_rusak">
                                        <div class="fw-bold text-gray-800">Rusak</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class='separator separator-dashed my-5'></div>
                        <div class="mb-5">
                            <label class="required fw-semibold fs-6 mb-5">Lantai</label>

                            <div class="d-flex gap-4">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input required class="form-check-input me-1" name="lantai" type="radio" value="1" id="option_lantai_bersih" />
                                    <label class="form-check-label" for="option_lantai_bersih">
                                        <div class="fw-bold text-gray-800">Bersih</div>
                                    </label>
                                </div>

                                <div class="form-check form-check-custom form-check-solid">
                                    <input required class="form-check-input me-1" name="lantai" type="radio" value="2" id="option_lantai_kotor" />
                                    <label class="form-check-label" for="option_lantai_kotor">
                                        <div class="fw-bold text-gray-800">Kotor</div>
                                    </label>
                                </div>

                                <div class="form-check form-check-custom form-check-solid">
                                    <input required class="form-check-input me-1" name="lantai" type="radio" value="3" id="option_lantai_rusak" />
                                    <label class="form-check-label" for="option_lantai_rusak">
                                        <div class="fw-bold text-gray-800">Rusak</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class='separator separator-dashed my-5'></div>
                        <div class="mb-5">
                            <label class="required fw-semibold fs-6 mb-5">Dinding</label>

                            <div class="d-flex gap-4">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input required class="form-check-input me-1" name="dinding" type="radio" value="1" id="option_dinding_bersih" />
                                    <label class="form-check-label" for="option_dinding_bersih">
                                        <div class="fw-bold text-gray-800">Bersih</div>
                                    </label>
                                </div>

                                <div class="form-check form-check-custom form-check-solid">
                                    <input required class="form-check-input me-1" name="dinding" type="radio" value="2" id="option_dinding_kotor" />
                                    <label class="form-check-label" for="option_dinding_kotor">
                                        <div class="fw-bold text-gray-800">Kotor</div>
                                    </label>
                                </div>

                                <div class="form-check form-check-custom form-check-solid">
                                    <input required class="form-check-input me-1" name="dinding" type="radio" value="3" id="option_dinding_rusak" />
                                    <label class="form-check-label" for="option_dinding_rusak">
                                        <div class="fw-bold text-gray-800">Rusak</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class='separator separator-dashed my-5'></div>
                        <div class="mb-5">
                            <label class="required fw-semibold fs-6 mb-5">Kaca</label>

                            <div class="d-flex gap-4">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input required class="form-check-input me-1" name="kaca" type="radio" value="1" id="option_kaca_bersih" />
                                    <label class="form-check-label" for="option_kaca_bersih">
                                        <div class="fw-bold text-gray-800">Bersih</div>
                                    </label>
                                </div>

                                <div class="form-check form-check-custom form-check-solid">
                                    <input required class="form-check-input me-1" name="kaca" type="radio" value="2" id="option_kaca_kotor" />
                                    <label class="form-check-label" for="option_kaca_kotor">
                                        <div class="fw-bold text-gray-800">Kotor</div>
                                    </label>
                                </div>

                                <div class="form-check form-check-custom form-check-solid">
                                    <input required class="form-check-input me-1" name="kaca" type="radio" value="3" id="option_kaca_rusak" />
                                    <label class="form-check-label" for="option_kaca_rusak">
                                        <div class="fw-bold text-gray-800">Rusak</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class='separator separator-dashed my-5'></div>
                        <div class="mb-5">
                            <label class="required fw-semibold fs-6 mb-5">Bau</label>

                            <div class="d-flex gap-4">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input required class="form-check-input me-1" name="bau" type="radio" value="1" id="option_bau_ya" />
                                    <label class="form-check-label" for="option_bau_ya">
                                        <div class="fw-bold text-gray-800">Ya</div>
                                    </label>
                                </div>

                                <div class="form-check form-check-custom form-check-solid">
                                    <input required class="form-check-input me-1" name="bau" type="radio" value="2" id="option_bau_tidak" />
                                    <label class="form-check-label" for="option_bau_tidak">
                                        <div class="fw-bold text-gray-800">Tidak</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class='separator separator-dashed my-5'></div>
                        <div class="mb-5">
                            <label class="required fw-semibold fs-6 mb-5">Sabun</label>

                            <div class="d-flex gap-4">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input required class="form-check-input me-1" name="sabun" type="radio" value="1" id="option_sabun_ada" />
                                    <label class="form-check-label" for="option_sabun_ada">
                                        <div class="fw-bold text-gray-800">Ada</div>
                                    </label>
                                </div>

                                <div class="form-check form-check-custom form-check-solid">
                                    <input required class="form-check-input me-1" name="sabun" type="radio" value="2" id="option_sabun_habis" />
                                    <label class="form-check-label" for="option_sabun_habis">
                                        <div class="fw-bold text-gray-800">Habis</div>
                                    </label>
                                </div>

                                <div class="form-check form-check-custom form-check-solid">
                                    <input required class="form-check-input me-1" name="sabun" type="radio" value="3" id="option_sabun_hilang" />
                                    <label class="form-check-label" for="option_sabun_hilang">
                                        <div class="fw-bold text-gray-800">Hilang</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3" data-kt-toilets-modal-action="cancel" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-success">
                            <span class="indicator-label">Simpan</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
    let table = new DataTable('#kt_table_toilet', {
        scrollX: true
    });
    let table_check = new DataTable('#kt_table_toilet_checked', {
        scrollX: true
    });

    $(".btn-check-toilet").on('click', function() {
        var id = $(this).data('id_toilet');

        $.ajax({
            url: "<?= BASE_URL ?>/toilet/get_check/",
            data: {
                id: id,
                date: "<?= $date ?>"
            },
            method: "GET",
            dataType: "JSON",
            success: function(result) {
                console.log(result);
                $("#title_check").text(result.location)
                $("#field_id").val(result.id_toilet)
            }
        });
    })

    $("#filter_date").on('change', function() {
        window.location.href = "/toilet/toilet/checklist/" + $(this).val();
    })
</script>
<?php include __DIR__ . "/../templates/_footer.php"; ?>