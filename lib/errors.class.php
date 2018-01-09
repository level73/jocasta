<?php

  /**
   * Manages
   *
   * @private $dictionary : sets message to corresponding error code.
   *  0   -> 299 : success messages
   *  299 -> 499 : warning messages
   *  500 -> 699 : error messages
   *  700 -> 999 : notices
   **/

  class Errors {

    public $errors = array();

    private $dictionary = array(
      /** Success **/
      0   => 'Email sent! Please check your inbox <strong> and your spam directory</strong>.',
      1   => 'The User has been correctly created',
      2   => 'The User has been correctly updated',
      3   => 'Organizzazione creata con successo.',
      4   => 'Organizzazione modificata con successo.',
      5   => 'Spesa creata con successo.',
      6   => 'Spesa modificata con successo.',
      /** Warnings **/

      /** Errors **/
      500 => 'Could not connect to the database!',
      501 => 'Could not run the query (missing or wrong type parameters).',
      502 => 'Could not run the query',
      503 => 'Invalid parameter, I couldn\'t execute the query',

      520 => 'Could not reset the metadata references',
      550 => 'Could not fetch the entity\'s fields',
      551 => 'Couldn\'t create the data record.',
      552 => 'There are missing required (*) fields. Data not saved.',
      580 => 'Could not send the email, there might be an issue with our server. Please contact the ILC Secretariat.',

      600 => 'Email cannot be empty',
      601 => 'Please use a valid email address',
      602 => 'Password cannot be empty',
      603 => 'Could not create user session',
      604 => 'Could not retrieve user profile',
      605 => 'Could not execute query. (session.model.php, 113)',
      606 => 'Incorrect password.',
      607 => 'No active account found with that email',
      608 => 'Could not retrieve a permission list',
      609 => 'The passwords do not match',
      610 => 'This email is already in use',

      650 => 'Error uploading a file.',
      651 => 'File type not allowed.',
      652 => 'Error saving the file to our filesystem.',

      /** Notices **/
    );

    public function __construct(){
      if(!isset($this->errors)){
        $this->errors = array();
      }
      else {
        return $this->errors;
      }
    }

    public function set($code){
      $this->errors[$code] = $this->dictionary[$code];
    }

    public function display(){
      echo "<div class=\"container\"><div class=\"row errors\"><div class=\"col-xs-12\">";

      foreach($this->errors as $code => $message){

        if($code < 300) {
          /** success **/
          echo '<div class="alert alert-success"><i class="fal fa-check"></i> ' . $message . ' [' . $code . ']</div>';
        }
        else if($code < 500 && $code > 299){
          /** warning **/
          echo '<div class="alert alert-warning"><i class="fal fa-exclamation-triangle"></i> ' . $message . ' [' . $code . ']</div>';
        }
        else if($code < 700 && $code > 499){
          /** error **/
          echo '<div class="alert alert-danger"><i class="fal fa-times"></i> ' . $message . ' [' . $code . ']</div>';
        }
        else if($code < 1000 && $code > 699){
          /** notice **/
          echo '<div class="alert alert-notice"><i class="fal fa-exclamation-circle"></i> ' . $message . ' [' . $code . ']</div>';
        }
      }
      echo "</div></div></div>";
    }

  }
