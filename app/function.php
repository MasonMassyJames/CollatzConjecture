<?php 

  // Define API url
  if ($_SERVER['HTTP_HOST'] === 'localhost') {
    define('BASE_API_URL', 'http://localhost/collatzconjecture/API/');
  } else {
    define('BASE_API_URL', 'https://www.pgxstudio.com/collatzconjecture/API/');
  }

  if (isset($_POST['number']) && isset($_POST['limit'])) {

    // Grab values & clean from "'"
    $num = preg_replace("@'@", "", $_POST['number']);
    $limit = preg_replace("@'@", "", $_POST['limit']);
    
    if (!ctype_digit($num)) {
      $response['status'] = 'Please insert a natural number';
      $response['field'] = 'number_input';
      echo json_encode($response);
      die();
    }

    if ($limit !== '' && !ctype_digit($limit)) {
      $response['status'] = 'Please insert a natural number';
      $response['field'] = 'limit_input';
      echo json_encode($response);
      die();
    }

    $result = call_CC_API($num, $limit);

    $resultArr = json_decode($result, true);

    // Check API response status, build a custom response and echo it out
    if ($resultArr['status'] === 'ok') { 

      $sequence = json_encode($resultArr['sequence'], JSON_FORCE_OBJECT);

      $response = '{
        "status" : "ok",
        "numbers" : ' . $sequence . ',
        "even" : ' . $resultArr['even'] . ',
        "odd" : ' . $resultArr['odd'] . '
      }';

    } else {

      $response = '{
        "status" : "API_error",
        "api_output" : "' . $resultArr['message'] . '"
      }';
      
    }

    echo $response;
    die();

  } else {
    http_response_code(404);
    exit;
  }

  function call_CC_API($num, $limit) {

    // Build url: if no limit is set, 
    // append only one parameter (url/$number/[$limit])
    $url = BASE_API_URL . $num;
    $url .= $limit ? '/' . $limit : '';

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;

  }

?>