<div class="container">
  <div class="row">
    <header class="col-md-12">
      <h1>Modifica Spesa</h1>
    </header>
  </div>
  <div class="row">

    <form class="" action="/expense/edit/<?php echo $expense->idexpense; ?>" method="post">
      <input type="hidden" name="id" value="<?php echo $expense->idexpense; ?>">
      <div class="col-md-6">
        <div class="form-group">
          <label for="date">DATA</label>
          <div class="input-group datetimepicker">
            <input class="form-control" id="date" name="date" type="text" value="<?php echo strftime('%d/%m/%Y', strtotime($expense->date)); ?>">
            <span class="input-group-addon">
              <i class="fal fa-calendar"></i>
            </span>
          </div>
        </div>
        <div class="form-group">
          <label for="organisation">ORGANIZZAZIONE</label>
          <select id="organisation" name="organisation" class="form-control selectpicker" data-live-search="true">
            <option></option>
            <?php foreach($orgs as $org){ ?>
            <option value="<?php echo $org->idorganisation; ?>" <?php checkSelect( $org->idorganisation, $expense->organisation ); ?>><?php echo $org->name; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="amount">IMPONIBILE</label>
          <input class="form-control" id="amount" name="amount" type="text" value="<?php echo $expense->amount; ?>">
          <span class="help">Usare il . come separatore decimale</span>
        </div>
        <div class="form-group">
          <label for="vat_amount">IVA</label>
          <input class="form-control" id="vat_amount" name="vat_amount" type="text"  value="<?php echo $expense->vat_amount; ?>">
          <span class="help">Usare il . come separatore decimale</span>
        </div>
        <div class="form-group">
          <label for="paid">PAGATO</label>
          <input class="form-control switch" id="paid" name="paid" type="checkbox" value="1" <?php echo ($expense->paid == 1 ? 'checked' : ''); ?>>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="notes">NOTE</label>
          <textarea class="form-control" id="notes" name="notes"><?php echo $expense->notes; ?></textarea>
        </div>
        <div class="form-group">
          <label for="reimburser">RIMBORSO DA</label>
          <select id="reimburser" name="reimburser" class="form-control selectpicker" data-live-search="true">
            <option></option>
            <?php foreach($orgs as $org){ ?>
            <option value="<?php echo $org->idorganisation; ?>" <?php checkSelect( $org->idorganisation, $expense->reimburser ); ?>><?php echo $org->name; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="reimbursed">RIMBORSATO</label>
          <input class="form-control switch" id="reimbursed" name="reimbursed" type="checkbox" value="1"  <?php echo ($expense->reimbursed == 1 ? 'checked' : ''); ?>>
        </div>
      </div>
      <div class="col-md-12">
        <button class="btn btn-jocasta" type="submit"><i class="fal fa-save"></i> SALVA</button>
      </div>
    </form>
  </div>
</div>
