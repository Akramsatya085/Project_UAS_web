<?php include __DIR__ . "/../templates/_header.php"; ?>
<div class="row">
    <div class="col-md-5 mx-auto">

        <div class="card">
            <div class="card-body">
                <h2 class="mb-5">Login</h2>
                <hr>
                <form action="<?= BASE_URL ?>/auth/process_login" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Username OR Email</label>
                        <input type="text" name="username" class="form-control" placeholder="Username or email">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    
                    <p>Belum memiliki akun? <a href="/toilet/auth/register">Daftar</a></p>

                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . "/../templates/_footer.php"; ?>