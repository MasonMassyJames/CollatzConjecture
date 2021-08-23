<?php 

  // Define base url for API
  define("API_PATH", dirname(__DIR__));

  // Define API folder name (used to ensure correctness of request array no matter the url of the API is)
  define("API_FOLDER", 'API');

  // Define max allowed starting number
  define("MAX_STARTING_NUMBER", 1000000000000);
  
  // include the base controller file
  require_once API_PATH . "/Controller/MainController.php";
