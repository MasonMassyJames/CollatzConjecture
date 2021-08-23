    <?php include __DIR__ . '/partials/header.php'; ?>

    <!-- Content section 1-->
    <section id="scroll">
      <div class="container">
        <div class="row gx-5 align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="p-5 text-center"><img class="img-fluid rounded-circle" src="public/assets/img/grid-871475_1920.jpg" alt="collatz_conjecture" /></div>
          </div>
          <div class="col-lg-6 order-lg-1">
            <div class="left_container">
              <h2 class="display-4">Here's the deal...</h2>
              <p>Think about a positive natural number and insert it in the field below. If you want to limit the number of results given, optionally you can set a limit number. When you hit submit, a Collatz Conjecture sequence will be generated in the chart below.</br><small>If you don't know what I'm talkin about, take a look <a href="what-is-collatz-conjecture">here</a></small></p>
              <div class="form_container">
                <form action="#" id="cc_form">
                  <div class="input-group input-group-lg">
                    <span class="input-group-text">Your Number</span>
                    <input type="text" id="number_input" name="number_input" class="form-control check_input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                  </div>
                  <div class="input-group input-group-lg">
                    <span class="input-group-text">Limit</span>
                    <input type="text" class="form-control check_input" id="limit_input" name="limit_input" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="none">
                  </div>
                  <div class="w-100 text-center mt-2">
                    <input class="d-none" type="submit" id="submit_btn">
                    <button class="btn btn-primary btn-lg" type="button" id="fake_submit_btn" value="Submit">Submit</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
        
        <a name="view_chart" id="view_chart"></a>
        <div class="row gx-5 align-items-center chart_row">
          <div class="col-12">
            <div>
              <canvas id="sequenceChart"></canvas>
            </div>
          </div>
          <div class="col-12">
            <div>
              <canvas id="evenOddChart" class="mt-5"></canvas>
            </div>
          </div>
        </div>


      </div>
    </section>


    <?php include __DIR__ . '/partials/footer.php'; ?>

    <!-- Core theme JS-->
    <script src="public/js/scripts.js"></script>
  </body>
</html>