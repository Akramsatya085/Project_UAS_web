<?php include __DIR__ . "/../templates/_header.php"; ?>

<div class="card">
    <div class="card-header border-0 pt-6">
        <div class="card-toolbar">
            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                    <i class="ki-duotone ki-plus fs-2"></i>Add User</button>
            </div>
            <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                <div class="fw-bold me-5">
                    <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                </div>
                <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
            </div>
            <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        <div class="modal-header" id="kt_modal_add_user_header">
                            <h2 class="fw-bold">Add User</h2>
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close" data-bs-dismiss="modal">
                                <i class="ki-duotone ki-cross fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                        </div>
                        <div class="modal-body px-5 my-7">
                            <form id="kt_modal_add_user_form" method="post" class="form" action="<?= BASE_URL ?>/users/add_user">
                                <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="fv-row mb-7">
                                                <label class="required fw-semibold fs-6 mb-2">Username</label>
                                                <input type="text" name="username" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Username" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="fv-row mb-7">
                                                <label class="required fw-semibold fs-6 mb-2">Email</label>
                                                <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                                        <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" required />
                                    </div>

                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Password</label>
                                        <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Password" />
                                    </div>

                                    <div class="mb-5">
                                        <label class="required fw-semibold fs-6 mb-5">Role</label>
                                        <div class="d-flex fv-row">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input me-3" name="role" type="radio" value="1" id="kt_modal_update_role_option_0" />
                                                <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                    <div class="fw-bold text-gray-800">Administrator</div>
                                                    <div class="text-gray-600">Full manage dari aplikasi ini</div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class='separator separator-dashed my-5'></div>
                                        <div class="d-flex fv-row">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input me-3" name="role" type="radio" value="2" id="kt_modal_update_role_option_1" />
                                                <label class="form-check-label" for="kt_modal_update_role_option_1">
                                                    <div class="fw-bold text-gray-800">User</div>
                                                    <div class="text-gray-600">Hanya bisa checklist toilet setiap harinya</div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center pt-10">
                                    <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel" data-bs-dismiss="modal">Discard</button>
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
    <div class="card-body py-4">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
            <thead>
                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                    <th class="w-10px pe-2 d-none">
                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                        </div>
                    </th>
                    <th class="min-w-125px">User</th>
                    <th class="min-w-125px">Fullname</th>
                    <th class="min-w-125px">Role</th>
                    <th class="min-w-125px">Status</th>
                    <th class="min-w-125px">Joined Date</th>
                    <th class="min-w-100px">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 fw-semibold">
                <?php if (!empty($users)) : ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td class="d-none">
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td class="d-flex align-items-center gap-5">
                                <div class="bg-light rounded-circle d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                                    <span><?= $this->initial($user['name']); ?></span>
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1"><?= $user['username'] ?></a>
                                    <span><?= $user['email'] ?></span>
                                </div>
                            </td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['role'] == 1 ? "Admin" : "User" ?></td>
                            <td>
                                <div class="badge badge-<?= $user['status'] == 1 ? "success" : "danger" ?> fw-bold"><?= $user['status'] == 1 ? "Active" : "Non-active" ?></div>
                            </td>
                            <td><?= date('d M Y, g:i a', strtotime($user['created_at'])) ?></td>
                            <td>
                                <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3 btn-get-user" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_user" data-id_user="<?= $user['id'] ?>">Edit</a>
                                    </div>
                                    <div class="menu-item px-3">
                                        <?php if ($user['status'] == 1) : ?>
                                            <a href="/toilet/users/non_active/<?= $user['id'] ?>" class="menu-link px-3">Nonaktifkan</a>
                                        <?php elseif ($user['status'] == 2) : ?>
                                            <a href="/toilet/users/active/<?= $user['id'] ?>" class="menu-link px-3">Aktifkan</a>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" class="text-center bg-light">Tidak ada data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="kt_modal_edit_user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_edit_user_header">
                <h2 class="fw-bold">Edit User</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <form id="kt_modal_edit_user_form" method="post" class="form" action="<?= BASE_URL ?>/users/edit_user">
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_edit_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_user_header" data-kt-scroll-wrappers="#kt_modal_edit_user_scroll" data-kt-scroll-offset="300px">
                        <input type="hidden" name="id" id="field_id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Username</label>
                                    <input type="text" name="username" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Username" required id="field_username" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="fv-row mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">Email</label>
                                    <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" required id="field_email" />
                                </div>
                            </div>
                        </div>

                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" required id="field_name" />
                        </div>

                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Password (optional)</label>
                            <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Password" />
                        </div>

                        <div class="mb-5">
                            <label class="required fw-semibold fs-6 mb-5">Role</label>
                            <div class="d-flex fv-row">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input me-3" name="role" type="radio" value="1" id="field_admin" />
                                    <label class="form-check-label" for="field_admin">
                                        <div class="fw-bold text-gray-800">Administrator</div>
                                        <div class="text-gray-600">Full manage dari aplikasi ini</div>
                                    </label>
                                </div>
                            </div>
                            <div class='separator separator-dashed my-5'></div>
                            <div class="d-flex fv-row">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input me-3" name="role" type="radio" value="2" id="field_user" />
                                    <label class="form-check-label" for="field_user">
                                        <div class="fw-bold text-gray-800">User</div>
                                        <div class="text-gray-600">Hanya bisa checklist toilet setiap harinya</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-info">
                            <span class="indicator-label">Save</span>
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
    let table = new DataTable('#kt_table_users', {scrollX: true});

    $(".btn-get-user").on('click', function() {
        var id = $(this).data('id_user');

        $.ajax({
            url: "/toilet/users/get_detail/" + id,
            method: "GET",
            dataType: "JSON",
            success: function(result) {
                $("#field_id").val(result.id)
                $("#field_username").val(result.username)
                $("#field_email").val(result.email)
                $("#field_name").val(result.name)

                switch (result.role) {
                    case '1':
                        $("#field_admin").attr('checked', true);
                        break;
                    case '2':
                        $("#field_user").attr('checked', true);
                        break;
                }
            }
        });
    })
</script>
<?php include __DIR__ . "/../templates/_footer.php"; ?>