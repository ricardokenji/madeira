<div class="mt-3">
    <div class="col-6 offset-3">
        <h2 class="h3">Sign-in</h2>
    </div>
</div>
<div class="row mt-4">
    <div class="col-6 offset-3">
        <div class="container ">
            <div class="alert alert-info mt-4" role="alert">
                Para logar como adminstrador: <br>
                Email: admin@yap.com <br>
                Senha: admin
            </div>
        </div>
        <form action="<?= route('user.login') ?>" method="post">    
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>