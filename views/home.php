<div class="row mt-4">
    <div class="col-10 offset-1">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to YetAnotherPhonebook</h1>
            <p class="lead">Fill the form bellow and start using the service right now!</p>
        </div>
    </div>
</div>

<div class="mt-3">
    <div class="col-6 offset-3">
        <h2 class="h3">Sign-up</h2>
    </div>
</div>
<div class="row mt-4">
    <div class="col-6 offset-3">
        <form action="<?= route('user.save') ?>" method="post">                        
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Your email" >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Your password" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-secondary" href="<?= route('user.login.form') ?>">I already have an account!</a>
        </form>
    </div>
</div>