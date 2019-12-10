
<div class="row mt-4">
    <div class="col-md-4 col-sm-12">
        <div class="card  mb-4">
            <div class="card-block">
                <h4 class="card-title">Novo Contato</h4>
                <form action="<?= route('contact.save') ?>" method="post">    
                    <div class="form-group">
                          <label for="name">Name</label>
                          <input type="name" class="form-control" id="name" name="name" placeholder="Contact name" required>
                    </div>
                    <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="Contact email" required>
                    </div>
                    <div class="form-group">
                          <label for="phone">Phone</label>
                          <input type="text" data-mask="(00) #0000-0000" class="form-control" id="phone" name="phone" pattern="\([0-9]{2}\) [9]{0,1}[0-9]{4}-[0-9]{4}" placeholder="Contact phone" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-sm-12">
        <?php if(count($contacts)): ?>
            <?php foreach($contacts as $contact): ?>
                <div class="card mb-4">
                    <div class="card-block">
                        <h4 class="card-title"><?= $contact->name ?></h4>        
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <?= $contact->email ?> <br>
                            <?= $contact->phone ?>
                        </li>
                    </ul>
                    <div class="card-footer text-muted">
                        <a class="btn btn-info" href="<?= route('contact.edit') ?>?contact_id=<?= $contact->id ?>">Edit</a>
                        <form class="d-inline" action="<?= route('contact.delete') ?>" method="post">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="contact_id" value="<?= $contact->id ?>">
                            <button type="submit" class="btn btn-danger" href="#">Delete</button>
                        </form>
                    </div>
                </div>
            <?php endforeach ?>
        <?php else: ?>
            <div class="alert alert-info" role="alert">
                Não há contatos cadastrados.
            </div>
        <?php endif ?>
    </div>
</div>

