<?php include __DIR__ . "/../templates/_header.php"; ?>

<div class="card">
    <div class="card-header border-0 pt-6">

        <div class="card-toolbar">
            <div class="d-flex justify-content-end" data-kt-toilet-table-toolbar="base">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_toilet">
                    <i class="ki-duotone ki-plus fs-2"></i>Add Toilet</button>
            </div>

            <div class="modal fade" id="kt_modal_add_toilet" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        <div class="modal-header" id="kt_modal_add_toilet_header">
                            <h2 class="fw-bold mb-0">Add Toilet</h2>
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" data-kt-toilets-modal-action="close">
                                <i class="ki-duotone ki-cross fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                        </div>
                        <div class="modal-body px-5 my-7">
                            <form id="kt_modal_add_toilet_form" method="post" class="form" action="/toilet/toilet/add_toilet">
                                <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_toilet_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_toilet_header" data-kt-scroll-wrappers="#kt_modal_add_toilet_scroll" data-kt-scroll-offset="300px">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Lokasi</label>
                                        <input type="text" name="location" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Lokasi" required />
                                    </div>

                                    <div class="fv-row mb-7">
                                        <label class="fw-semibold fs-6 mb-2">Note</label>
                                        <textarea name="note" id="" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="text-center pt-10">
                                    <button type="reset" class="btn btn-light me-3" data-kt-toilets-modal-action="cancel" data-bs-dismiss="modal">Discard</button>
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                $no = 1;
                foreach ($toilets as $toilet) :
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $toilet['location'] ?></td>
                        <td><?= $toilet['note'] == "" ? '-' : $toilet['note'] ?></td>
                        <td>
                            <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <i class="ki-duotone ki-down fs-5 ms-1"></i>
                            </a>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <a href="#" data-id_toilet="<?= $toilet['id'] ?>" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_toilet" class="menu-link px-3 btn-get-toilet">Edit</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="/toilet/toilet/delete/<?= $toilet['id'] ?>" class="menu-link px-3">Hapus</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="kt_modal_edit_toilet" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_edit_toilet_header">
                <h2 class="fw-bold mb-0">Edit Toilet</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" data-kt-toilets-modal-action="close" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <form id="kt_modal_edit_toilet_form" method="post" class="form" action="/toilet/toilet/edit_toilet">
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_edit_toilet_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_toilet_header" data-kt-scroll-wrappers="#kt_modal_edit_toilet_scroll" data-kt-scroll-offset="300px">
                        <input type="hidden" name="id" id="field_id">
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Lokasi</label>
                            <input type="text" name="location" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Lokasi" required id="field_location" />
                        </div>

                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Note</label>
                            <textarea name="note" id="" cols="30" rows="3" class="form-control" id="field_note"></textarea>
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
    let table = new DataTable('#kt_table_toilet');

    $(".btn-get-toilet").on('click', function() {
        var id = $(this).data('id_toilet');

        $.ajax({
            url: "/toilet/toilet/get_detail/" + id,
            method: "GET",
            dataType: "JSON",
            success: function(result) {
                $("#field_id").val(id);
                $("#field_location").val(result.location);
                $("#field_note").val(result.note);
            }
        });
    })
</script>
<?php include __DIR__ . "/../templates/_footer.php"; ?>