<?php
  class OrganisationCtrl extends Ctrl {

    public $title = 'Organizzazioni';
    public $pagepath = 'organisation';


    public function all(){
      $this->set('orgs', $this->Organisation->all());
    }
    public function detail(){}
    public function create(){
      if(!empty($_POST)){
        $data = filter_var_array($_POST);
        $id = $this->Organisation->create($data);
        if(is_numeric($id)){
          $this->Errors->set(3);
        } else {
          $this->Errors = $id;
        }
        $this->set('errors', $this->Errors);
      }


    }

    public function edit($id){
      if(!empty($_POST)){
        $data = $_POST;
        $query = $this->Organisation->update($id, $data);
        if($query == true){
          $this->Errors->set(4);
        } else {
          $this->Errors = $id;
        }
        $this->set('errors', $this->Errors);
      }

      $this->set('org', $this->Organisation->find($id));
    }

    public function delete($id){

      $this->Organisation->delete($id);
      header('Location: /organisation/all');

    }

  }
