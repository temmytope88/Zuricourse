<?php
  function firstname(){
    if(isset($_SESSION["firstname"])){
      echo "<div class='alert-danger'>".$_SESSION["firstname"]."</div>";
      unset($_SESSION["firstname"]);
    }
  }

  function lastname(){
    if(isset($_SESSION["surname"])){
      echo "<div class='alert-danger' >".$_SESSION["surname"]."</div>";
      unset($_SESSION["surname"]);
    }
    
  }

  function email(){
    if(isset($_SESSION["email"])){
      echo "<div class='alert-danger'>".$_SESSION["email"]."</div>";
      unset($_SESSION["email"]);
    }
  
  }

  function password(){
    if(isset($_SESSION["password"])){
      echo "<div class='alert-danger'>".$_SESSION["password"]."</div>";
      unset($_SESSION["password"]);

    }
  }

  function gender(){
    if(isset($_SESSION["gender"])){
      echo "<div class='alert-danger'>".$_SESSION["gender"]."</div>";
    unset($_SESSION["gender"]);

    }
  }

  function error(){
    if(isset($_SESSION["error"])){
      echo "<div class='alert-danger'>".$_SESSION["error"]."</div>";
      unset($_SESSION["error"]);
    }
  }

  function success(){
    if(isset($_SESSION["success"])){
      echo "<div class='alert-success'>".$_SESSION["success"]."</div>";
      unset($_SESSION["success"]);
    }
  }
