<?php
  class ExpenseCtrl extends Ctrl {

    public $title = 'Spese';
    public $pagepath = 'expense';


    public function all(){
      $this->set('expenses', $this->Expense->all());
    }
    public function detail(){}

    public function create(){
      $Organisation = new Organisation;
      $this->set('orgs', $Organisation->all());
      if(!empty($_POST)){
        $data = array_filter($_POST);
        /** Fix date **/
        $payDate = DateTime::createFromFormat('d/m/Y', $data['date']);
        $data['date'] = $payDate->format('Y-m-d');
        dbga($data);
        $id = $this->Expense->create($data);
        if(is_numeric($id)){
          $this->Errors->set(5);
        } else {
          $this->Errors = $id;
        }
        $this->set('errors', $this->Errors);
      }


    }

    public function edit($id){
      if(!empty($_POST)){
        $data = $_POST;

        unset($data['id']);
        $payDate = DateTime::createFromFormat('d/m/Y', $data['date']);
        $data['date'] = $payDate->format('Y-m-d');

        $query = $this->Expense->update($id, $data);
        if($query == true){
          $this->Errors->set(6);
        } else {
          $this->Errors = $id;
        }
        $this->set('errors', $this->Errors);
      }
      $Organisation = new Organisation;
      $this->set('orgs', $Organisation->all());
      $this->set('expense', $this->Expense->find($id));
    }

    public function delete($id){

      $this->Expense->delete($id);
      header('Location: /expense/all');

    }

  }
