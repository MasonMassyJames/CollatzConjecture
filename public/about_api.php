<?php include __DIR__ . '/partials/header.php'; ?>

<!-- Content section 1-->
<section id="scroll" class="mb-5">
  <div class="container">
    <div class="row gx-5 align-items-center">
      <div class="col-lg-12 order-lg-1">
        <ul class="api_legend">
          <li><a href="#intro">Introduction</a></li>
          <li><a href="#wiw">How It Works</a></li>
          <li><a href="#o&e">Output & Examples</a></li>
          <li><a href="#errors">Errors</a></li>
          <li><a href="#source">Source Code & Examples</a></li>
        </ul>
      
      </div>

    </div>
    <a name="intro"></a>
    <div class="row gx-5 align-items-center mt-5">
      <div class="col-lg-12 order-lg-1">
          <h2 class="display-4">Introduction</h2>
          <p>Hello, I’m Massimo Geloni (alias MMJ) and I’m a web developer (backend mostly). I developed this website and its related API to practice.
          This is a very simple <strong>PHP REST API</strong> working with a single URL and a single HTTP verb: GET. No authentication is required.</br>
          The purpose is to provide a <strong>Collatz Conjecture sequence</strong> from a starting number specified by the user in the request.</p>
         
          <p>This is meant to be an open API but also an open source free project. The source code, under MIT Licence, is available here: <strong><a href="https://github.com/MasonMassyJames/CollatzConjecture" target="_blank">github.com/MasonMassyJames/CollatzConjecture</a></strong>.</br>
          Please feel free to use it, partially or wholly, as you need to. A link to the source and the reporting of author name is not required but appreciated.</br>
          If you have any advice or correction about it or if you feel this documentation lacks something, I'll be glad to know: <strong><a href="mailto: massimo.geloni@gmail.com">massimo.geloni@gmail.com</a></strong>.</p>

          <p>Note: this application has a limit about the size of the starting number provided to generate the sequence and this size is less the size of the greatest number tested by mathematicians to disprove the Collatz Conjecture. Hence, no number supplied to this API will escape the final 4->2->1 loop. Having said that, my goal was to create something quite realistic, even if only "virtually", therefore the limit size of the starting number can be easly changed and the logic used to build up the sequence is not "blinded" to just stop when the sequence hit "1" but is able to find ANY other loop could occur.</br>
          </p>
      </div>

    </div>

    <a name="wiw"></a>
    <div class="row align-items-center">
      <div class="col-lg-12 mt-5">
        <h2 class="display-4">How It Works</h2>
        <p>The single endpoint of this API is</p>
        <div class="language-text">
          <pre><code>GET | https://pgxstudio.com/collatzconjecture/API/{startingNumber}/[limit]</code></pre>
        </div>

        <div class="mt-3 overflow-auto">
          <p>Parameters specifications:</p>
          <table id="param_tbl" class="table">
            <tr class="table-dark">
              <td>Parameter</td>
              <td>Description</td>
            </tr>
            <tr class="default">
              <td class="parameter"><pre>{startingNumber}</pre></td>
              <td><strong>Required.</strong></br>Must be a Natural number greater than zero (positive integer). This is the number the sequence calculation starts from.</td>
            </tr>
            <tr class="default">
              <td class="parameter"><pre>[limit]</pre></td>
              <td><strong>Optional.</strong></br>Must be a Natural number (positive integer). If zero or no parameter is given, no limit is applied. If a valid number is given, the number sequence length is limited up to that number.</td>
            </tr>

          </table>
        </div>

      </div>
    </div>

    <a name="o&e"></a>
    <div class="row align-items-center">
      <div class="col-lg-12 mt-5">
        <h2 class="display-4">Output & Examples</h2>
        <p>For any request a JSON formatted reply is provided.</p>
        <p>Basing on the request, the response is a JSON with this info (in green info displayed only if request is valid and no error occurred, in red info displayed only if request is invalid or error occurred):</p>
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-8">
            <div class="parameter">
              <pre>
                <code>
  {
    <strong>"status"</strong> : a string with value "ok" or "error" 
    <span class="text-success"><strong>"sequence"</strong> : a JSON holding the indexed number sequence</span> 
    <span class="text-success"><strong>"odd"</strong> : the number of the odd numbers present in the sequence</span>   
    <span class="text-success"><strong>"even"</strong> : the number of the even numbers present in the sequence</span>   
    <span class="text-danger"><strong>"error_code"</strong> : the code number of the error (list of errors below)</span>  
    <span class="text-danger"><strong>"message"</strong> : a string message related to the specific error occurred</span> 
  }             </code>
              </pre>

            </div>
          </div>
          <div class="col-lg-2"></div>
        </div>

        <!-- Example 1 -->
        <h3 class="mt-5">Example of successful request without limit parameter</h3>
        <div class="example_container">
          <div class="row">

            <div class="col-lg-2">
              <p>Request:</p>
            </div>
            <div class="col-lg-10">
              <div class="language-text">
                <pre><code>GET | https://pgxstudio.com/collatzconjecture/API/6</code></pre>
              </div>
            </div>

            <div class="col-12 mt-3"></div>

            <div class="col-lg-2">
              <p>Response:</p>
            </div>
            <div class="col-lg-10">
              <div class="parameter">
                  <pre>
                    <code>
 {
    "status":"ok",
    "sequence":{"0":6,"1":3,"2":10,"3":5,"4":16,"5":8,"6":4,"7":2,"8":1}, 
    "odd":3,
    "even":6
  }</code>
                  </pre>
              </div>
            </div>
          </div>
        </div>
        <!-- End Example 1 -->

        <!-- Example 2 -->
        <h3 class="mt-5">Example of successful request with limit parameter</h3>
        <div class="example_container">
          <div class="row">

            <div class="col-lg-2">
              <p>Request:</p>
            </div>
            <div class="col-lg-10">
              <div class="language-text">
                <pre><code>GET | https://pgxstudio.com/collatzconjecture/API/6/4</code></pre>
              </div>
            </div>

            <div class="col-12 mt-3"></div>

            <div class="col-lg-2">
              <p>Response:</p>
            </div>
            <div class="col-lg-10">
              <div class="parameter">
                  <pre>
                    <code>
  {
    "status":"ok",
    "sequence":{"0":6,"1":3,"2":10,"3":5}, 
    "odd":2,
    "even":2
  }</code>
                  </pre>
              </div>
            </div>
          </div>
        </div>
        <!-- End Example 2 -->

        <!-- Example 2 -->
        <h3 class="mt-5">Example of failed request</h3>
        <div class="example_container">
          <div class="row">

            <div class="col-lg-2">
              <p>Request:</p>
            </div>
            <div class="col-lg-10">
              <div class="language-text">
                <pre><code>GET | https://pgxstudio.com/collatzconjecture/API/string</code></pre>
              </div>
            </div>

            <div class="col-12 mt-3"></div>

            <div class="col-lg-2">
              <p>Response:</p>
            </div>
            <div class="col-lg-10">
              <div class="parameter">
                  <pre>
                    <code>
  {
    "status":"error",
    "error_code":3, 
    "message":"ERROR. Starting number must be a positive integer between 1 and 1000000000000."
  }</code>
                  </pre>
              </div>
            </div>
          </div>
        </div>
        <!-- End Example 2 -->

      </div>
    </div>

    <a name="errors"></a>
    <div class="row gx-5 align-items-center mt-5">
      <div class="col-lg-12 order-lg-1">
        <h2 class="display-4">Errors</h2>
          <p>
            Here's the list of possible errors coming from API
          </p>
          <div class="mt-3 overflow-auto">
          <table class="table">
            <tr class="table-dark">
              <td class="text-nowrap">Error Code</td>
              <td>Message</td>
              <td>Description</td>
            </tr>
            <tr class="default">
              <td>1</td>
              <td>"ERROR. Too many parameters in request."</td>
              <td>The GET URL used is passing other parameters besides the starting number and the limit.</td>
            </tr>
            <tr class="default">
              <td>2</td>
              <td>"ERROR. Too few parameters in request."</td>
              <td>The GET URL used is not passing the starting number.</td>
            </tr>
            <tr class="default">
              <td>3</td>
              <td>"ERROR. Starting number must be a positive integer between 1 and [MAX_STARTING_NUMBER]"</td>
              <td>The starting number parameter is passed but is not a positive integer or it is 0 or it is greater than the maximum number allowed (set in the <code>API/include/bootstrap.php</code> and now is set to 1'000'000'000'000).</td>
            </tr>
            <tr class="default">
              <td>4</td>
              <td>"ERROR. Limit number be a positive integer."</td>
              <td>The limit parameter passed is not a positive integer.</td>
            </tr>
            <tr class="default">
              <td>5</td>
              <td>"ERROR. Unknown error. Something went wrong."</td>
              <td>Something got f*cked up somehere and I have no clue :(</td>
            </tr>

          </table>
        </div>
      </div>

    </div>

    <a name="source"></a>
    <div class="row gx-5 align-items-center mt-5">
      <div class="col-lg-12 order-lg-1">
        <h2 class="display-4">Source Code & Examples</h2>
          <p>
            This is meant to be an open API but also an open source free project. The source code is available at this link. Please feel free to use it, partially or wholly, as you need to. Any advice or correction about it will be very appreciated: <strong><a href="mailto: massimo.geloni@gmail.com">massimo.geloni@gmail.com</a></strong>.
          </p>
          <h3 class="mt-3">Project tree</h3>
          <div class="row">
            <div class="col-lg-3">
              <img class="img-fluid mb-3 code-screen" src="public/assets/img/tree.png" alt="project tree" />
            </div>
            <div class="col-lg-9">
              <p>
                In the previous image you can see the complete project tree you will find in the github repo. The application consuming the API is written in a functional-procedural style, while the API is an Object driven architecture.</br>
                The JS client-side logic interpreting JSON and showing graphs lies in the scripts.js file.</br>
                The API lies in the the omonym folder you can see in details in the image below.</br>
              </p>
                <img class="img-fluid mb-3 code-screen" src="public/assets/img/tree_api.png" alt="project tree" />
                
            </div>
            <p>So, if you need just the API, all it takes is inside that folder, you can grab it and put it in your project. The API is built with its own .htaccess and even if you change the request like </p>
            <pre><code>https://www.yourwebsite.com/something/somethingelse/API</code></pre>
            <p>it will work unless you change the name of the API folder. If you plan to change it just set it accordingly in <strong>API/include/bootstrap.php</strong> and it will work again.</p>
            <img class="mb-3 code-screen" id="api_folder_img" src="public/assets/img/API_folder.png" alt="folder api name" width="574" />
            <p>In this same file you can set the MAX accepted number for the starting number.</p>

          </div>
          <h3 class="mt-3">Example of a PHP Call to the API</h3>
          <div class="row">
            <div class="col-lg-6 d-flex">
              <img class="img-fluid mb-3 code-screen" src="public/assets/img/call_api_function.png" alt="call api function" />
            </div>
            <div class="col-lg-6">
              <div class="parameter">
                <pre>
                  <code>
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

  }</code>
                </pre>
              </div>  
            </div>

            <p>In this function I passed the (previously checked) starting number and  limit provided by the user. Then I built the URL string basing on the presence of the limit value. The BASE_API_URL is a constant defined at the beginning of the same file (function.php).</p>

          </div>


      </div>

    </div>


  </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>

</body>
</html>
