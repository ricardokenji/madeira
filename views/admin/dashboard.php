
<div class="row mt-4">
    <div class="col-12">
        <div class="card-deck">
            <div class="card card-inverse card-primary mb-4">
                <div class="card-block">
                    <h4 class="card-title">Usuários</h4>
                    <p class="card-text"><?= $usersCount ?></p>
                </div>
            </div>
            <div class="card card-inverse card-primary  mb-4">
                <div class="card-block">
                    <h4 class="card-title">Contatos</h4>
                    <p class="card-text"><?= $contactsCount ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <h1 class="display-5">Últimos Usuários</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($latestUsers as $user): ?>
                    <tr>            
                        <td><?= $user->id ?></td>
                        <td><?= $user->email ?></td>                   
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

