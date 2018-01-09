<div class="container">
  <header class="row">
    <div class="col-md-6">
      <h1>Anagrafica</h1>
    </div>
    <div class="col-md-6">
      <a href="/organisation/create" class="btn btn-default pull-right"><i class="fal fa-plus"></i> Nuova Anagrafica</a>
    </div>
  </header>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-condensed table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($orgs as $org){ ?>
          <tr>
            <td><?php echo $org->idorganisation; ?></td>
            <td><?php echo $org->name; ?></td>
            <td><?php echo $org->email; ?></td>
            <td><a href="/organisation/edit/<?php echo $org->idorganisation; ?>"><i class="fal fa-pencil"></i></a></td>
            <td><a href="/organisation/delete/<?php echo $org->idorganisation; ?>"><i class="fal fa-eraser"></i></a></td>
          </tr>
          <?php } ?>
      </table>
    </div>
  </div>
</div>
