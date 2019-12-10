<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>YetAnotherPhonebook</title>
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?= url('css/bootstrap.min.css') ?>" >
    </head>
    <body>
        <div class="container">
            <nav class="navbar sticky-top navbar-light bg-faded navbar-toggleable-md">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="h6">
                    <a class="navbar-brand" href="<?= route('home') ?>">YAP</a>
                </h1>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="nav navbar-nav ml-auto"> 
                        <li class="nav-item">
                            <?php if(!auth()->check()): ?>
                                <a class="nav-link" href="<?= route('user.login.form') ?>">Sign-in</a>
                            <?php else: ?>
                                <a class="nav-link" href="<?= route('user.logout') ?>">Sign-out</a>
                            <?php endif ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        
        <?php if($message = flash()->get('errors')):?>
            <div class="container ">
                <div class="alert alert-danger mt-4" role="alert">
                  <?= $message ?>
                </div>
            </div>
        <?php endif?>
        
        <?php if($message = flash()->get('info')):?>
            <div class="container ">
                <div class="alert alert-info mt-4" role="alert">
                  <?= $message ?>
                </div>
            </div>
        <?php endif?>
        
        <div class="container">
            <?php include __DIR__ . '/' . $name . '.php';  ?>
        </div>

        <!-- jQuery first, then Tether, then Bootstrap JS. -->
        <script src="<?= url('js/jquery.min.js') ?>"></script>
        <script src="<?= url('js/tether.min.js') ?>"></script>
        <script src="<?= url('js/bootstrap.min.js') ?>"></script>
        <script src="<?= url('js/jquery.mask.js') ?>"></script>
    </body>
</html>