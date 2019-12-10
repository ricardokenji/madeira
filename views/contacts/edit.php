<div class="row mt-4">
    <div class="col-md-12">
        <div class="card  mb-4">
            <div class="card-block">
                <h4 class="card-title">Editar Contato</h4>
                <form action="<?= route('contact.update') ?>" method="post">    
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="contact_id" value="<?= $contact->id ?>">
                    <div class="form-group">
                          <label for="name">Name</label>
                          <input type="name" class="form-control" id="name" name="name" value="<?= $contact->name ?>" placeholder="Contact name" required>
                    </div>
                    <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" name="email" value="<?= $contact->email ?>" placeholder="Contact email" required>
                    </div>
                    <div class="form-group">
                          <label for="phone">Phone</label>
                          <input type="text" data-mask="(00) #0000-0000" class="form-control" id="phone" name="phone"  value="<?= $contact->phone ?>" pattern="\([0-9]{2}\) [9]{0,1}[0-9]{4}-[0-9]{4}" placeholder="Contact phone" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="<?=route('contact.index')?>">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>