<?php
require_once "../imu-api/IMu.php";
require_once IMu::$lib . '/Session.php';

class imuSearch
{


  private $server;
  private $port;

  private $session;

  public function __construct($serverURL, $serverPort)
  {
    $server = $serverURL;
    $port = $serverPort;
  }

  public function version()
  {
    return IMu::VERSION
  }

  public function connect()
  {
    try
    {
      $session = new IMuSession($server, $port);
      $session->connect();
      return true;
    }
    catch (Exception $e)
    {
      throw $e;
    }
    return false;
  }

  public function search($module, $columns, $terms=null)
  {
    try
    {
      $mod = new IMuModule($module, $session);
      if(isset($terms))
      {
        $search = $terms;
        $mod->findTerms($search);
      }
      $result = $mod->fetch('start', 0, -1, $columns); //Fetch all
      return $result;
    }
    catch (Exception $e)
    {
      throw $e;
    }
    return null;

  }




}




?>
