<?php
  class Invoice extends Model {
    protected $table = 'invoice';
    protected $hasOrg = true;

    public function getReimbursables($organisation = null){
      $sql = 'SELECT * FROM expense WHERE reimburser > 0 AND reimbursed IS NULL';
      $stmt = $this->database->prepare($sql);
      $stmt->bindParam(':id', $organisation, PDO::PARAM_INT);
      $q = $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

  }
