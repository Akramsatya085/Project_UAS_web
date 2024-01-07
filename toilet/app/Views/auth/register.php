<?php include __DIR__ . "/../templates/_header.php"; ?>
<div class="row">
    <div class="col-md-5 mx-auto">

        <div class="card">
            <div class="card-body">
                <h2 class="mb-5">Register</h2>
                <hr>
                <form action="<?= BASE_URL ?>/auth/process_register" method="post">
                    <!--begin::Scroll-->
                    <div class="row">
                        <div class="col-md-6">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Username</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="username" class="form-control mb-3 mb-lg-0" placeholder="Username" required />
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Input group-->
                        <div class="col-md-6">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">Email</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" name="email" class="form-control mb-3 mb-lg-0" placeholder="example@domain.com" required />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>

                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="name" class="form-control mb-3 mb-lg-0" placeholder="Full name" required />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">Password</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="password" name="password" class="form-control mb-3 mb-lg-0" placeholder="Password" />
                        <!--end::Input-->
                    </div>
                    <p>Sudah memiliki akun? <a href="/toilet/auth/login">Login</a></p>
                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . "/../templates/_footer.php"; ?>