<div class="container">
  <div class="row">
    <header class="col-md-12">
      <h1>Aggiungi Anagrafica</h1>
    </header>
  </div>
  <div class="row">
    <form class="" action="/organisation/create" method="post">
      <div class="col-md-6">
        <div class="form-group">
          <label for="name">NOME</label>
          <input class="form-control" id="name" name="name" type="text">
        </div>
        <div class="form-group">
          <label for="address">INDIRIZZO</label>
          <textarea class="form-control" id="address" name="address"></textarea>
        </div>
        <div class="form-group">
          <label for="vat"># IVA</label>
          <input class="form-control" id="vat" name="vat" type="text">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="email">EMAIL</label>
          <input class="form-control" id="email" name="email" type="text">
        </div>
        <div class="form-group">
          <label for="notes">NOTE</label>
          <textarea class="form-control" id="notes" name="notes"></textarea>
        </div>
      </div>
      <div class="col-md-12">
        <button class="btn btn-jocasta" type="submit"><i class="fal fa-save"></i> SALVA</button>
      </div>
    </form>
  </div>
</div>
