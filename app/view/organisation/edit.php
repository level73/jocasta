<div class="container">
  <header class="row">
    <div class="col-md-6">
      <h1>Modifica Anagrafica</h1>
    </div>
    <div class="col-md-6">
      <a href="/organisation/create" class="btn btn-default pull-right"><i class="fal fa-plus"></i> Nuova Anagrafica</a>
      <a href="/organisation/all" class="btn btn-default pull-right"><i class="fal fa-users"></i> Lista Anagrafica</a>
    </div>
  </header>
  <div class="row">
    <form class="" action="/organisation/edit/<?php echo $org->idorganisation; ?>" method="post">
      <input class="form-control" id="idorganisation" name="idorganisation" type="hidden" value="<?php echo $org->idorganisation; ?>">
      <div class="col-md-6">
        <div class="form-group">
          <label for="name">NOME</label>
          <input class="form-control" id="name" name="name" type="text" value="<?php echo $org->name; ?>">
        </div>
        <div class="form-group">
          <label for="address">INDIRIZZO</label>
          <textarea class="form-control" id="address" name="address"><?php echo $org->address; ?></textarea>
        </div>
        <div class="form-group">
          <label for="vat"># IVA</label>
          <input class="form-control" id="vat" name="vat" type="text" value="<?php echo $org->vat; ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="email">EMAIL</label>
          <input class="form-control" id="email" name="email" type="text" value="<?php echo $org->email; ?>">
        </div>
        <div class="form-group">
          <label for="notes">NOTE</label>
          <textarea class="form-control" id="notes" name="notes"><?php echo $org->notes; ?></textarea>
        </div>
      </div>
      <div class="col-md-12">
        <button class="btn btn-jocasta" type="submit"><i class="fal fa-save"></i> SALVA</button>
      </div>
    </form>
  </div>
</div>
