<?php
  ob_start();
  session_start();
  //fisrt order
  if(!isset($_SESSION["cntLine"]))
  {
    $_SESSION["cntLine"] = 0;
    $_SESSION["strID"][0] = $_GET["ID"];
    $_SESSION["strQty"][0] = 1;
    header("");
  }
  else
  {
    $key = array_search($_GET["ID"], $_SESSION["strID"]);
    {
      if((string)$key!="")
      {
        $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + 1;
      }
      else
      {
        $_SESSION["cntLine"] = $_SESSION["cntLine"] + 1;
        $cntNewLine = $_SESSION["cntLine"];
        $_SESSION["strID"][$cntNewLine] = $_GET["ID"];
        $_SESSION["strQty"][$cntNewLine] = 1;
      }
    }
  header("");
  }
?>
