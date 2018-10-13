<div class="container">
  <header class="row">
    <div class="col-md-6">
      <h1>Fatture</h1>
    </div>
    <div class="col-md-6">
      <a href="/invoice/create" class="btn btn-default pull-right"><i class="fal fa-plus"></i> Nuova Fattura</a>
    </div>
  </header>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-condensed table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>ORGANIZZAZIONE</th>
            <th>DATA</th>
            <th>EUR</th>
            <th width="80">RIMB.</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($invoices as $e){ ?>
          <tr>
            <td><?php echo $e->idexpense; ?></td>
            <td><?php echo $e->organisation_name; ?></td>
            <td><?php echo $e->date; ?></td>
            <td><?php echo $e->amount; ?></td>
            <td><?php status($e->reimbursed, $e->reimburser); ?></td>
            <td><a href="/expense/edit/<?php echo $e->idexpense; ?>"><i class="fal fa-pencil"></i></a></td>
            <td><a href="/expense/delete/<?php echo $e->idexpense; ?>"><i class="fal fa-eraser"></i></a></td>
          </tr>
          <?php } ?>
      </table>
    </div>
  </div>
</div>
