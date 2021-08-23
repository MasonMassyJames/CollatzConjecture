<?php
class MainController
{
    /**
     * __call magic method.
     */
    public function __call($name, $arguments)
    {
        $this->sendOutput('', array('HTTP/1.1 404 Not Found'));
    }

    /**
     * Client error method.
     */
    private function clientError($message = '')
    {
        $message = is_array($message) ? json_encode($message) : $message;
        $this->sendOutput($message, array('HTTP/1.1 404 Not Found'));
    }

    /**
     * Check request. It returns the main number and the limit
     *
     * @param  array $arrReq
     * @return array
     */
    private function checkRequest($arrReq)
    {
        // Get the index of API folder in the request array and slice it from that folder
        $key = array_search(API_FOLDER, $arrReq);
        $arrReq = (array_slice($arrReq, $key));

        $arrLength = count($arrReq);
        $limit = 0; // All numbers

        if ($arrLength > 3) {
          $this->clientError([
            'status' => 'error',
            'error_code' => 1,
            'message' => 'ERROR. Too many parameters in request.'
          ]);
        }

        if ($arrLength < 2 || ($arrLength === 2 && $arrReq[1] == '')) {
          $this->clientError([
            'status' => 'error',
            'error_code' => 2,
            'message' => 'ERROR. Too few parameters in request.'
          ]);
        }

        if (!ctype_digit($arrReq[1]) || $arrReq[1] == 0 || $arrReq[1] > MAX_STARTING_NUMBER ) {
          $this->clientError([
            'status' => 'error',
            'error_code' => 3,
            'message' => 'ERROR. Starting number must be a positive integer between 1 and ' . MAX_STARTING_NUMBER . '.'
          ]);
        }

        if (isset($arrReq[2])) {

          if (!ctype_digit($arrReq[2])) {
            $this->clientError([
              'status' => 'error',
              'error_code' => 4,
              'message' => 'ERROR. Limit number be a positive integer.'
            ]);
          } else {
            $limit = $arrReq[2];
          }
        }

        return ['main_number' => (int) $arrReq[1], 'limit' => (int) $limit];

    }

    /**
     * Main Method with actual calculation of nrs.
     */
    public function bootstrap($arrReq)
    {

        $data = $this->checkRequest($arrReq);

        $result = $this->doTheMath($data);

        if (!is_array($result)) {
          $this->clientError([
            'status' => 'error',
            'error_code' => 5,
            'message' => 'ERROR. Unknown error. Something went wrong.'
          ]);
        } else {
          $output = [
            'status' => 'ok',
            'sequence' => $result['sequence'],
            'odd' => $result['odd'],
            'even' => $result['even']
          ];

          $this->sendOutput(json_encode($output,JSON_FORCE_OBJECT), array('HTTP/1.1 200 OK'));

        }

    }


    /**
     * Main Method with actual calculation of sequence.
     * 
     * @param array $data
     * @return array
     */
    private function doTheMath($data)
    {
      // Set initial variables
      $limit = $data['limit'];
      $nextNr = (int) $data['main_number'];
      $n = []; // Output array
      $i = 0;
      $odd = 0;
      $even = 0;

      try {
        // Start loop to build output array
        while (true) { // I love calculate risks

          // If a limit was set and if the limit is hit
          if ($limit != 0 && $i == $limit) {
            break;
          }

          if ($i !== 0) {
            $prevNr = $n[$i-1];
            // Calculate next n
            $nextNr = $prevNr %2 == 0 ? $prevNr/2 : 3*$prevNr+1;
          }

          // Check if next number is present in output array of nrs = loop
          if (in_array($nextNr, $n)) {
            break;
          } else {
            // Add nr to output array
            $n[] = $nextNr;
            // Count odd/even
            if ($nextNr % 2 === 0) {
              $even++;
            } else {
              $odd++;
            }
            // Exit if 1
            if ($nextNr === 1) {
              break;
            }
          }

          $i++;

        }
      } catch (\Throwable $th) {
        return 'error';
      }
      
      return [
        'sequence' => $n, 
        'even' => $even, 
        'odd' => $odd
      ];

    }

 
    /**
     * Send API output.
     *
     * @param mixed $data
     * @param array $httpHeader
     */
    protected function sendOutput($data, $httpHeaders = array())
    {

        if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }
 
        echo $data;
        exit;
    }
    
}