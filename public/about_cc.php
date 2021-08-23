<?php include __DIR__ . '/partials/header.php'; ?>

<!-- Content section 1-->
<section id="scroll" class="mb-5">
  <div class="container mt-5">
    <div class="row gx-5 align-items-center mt-5">
      <div class="col-lg-4 order-lg-2 pb-5">
        <div class="p-5 equation"><img class="img-fluid" src="public/assets/img/eq.svg" alt="collatz conjecture equation" /></div>
      </div>
      <div class="col-lg-8 order-lg-1">
          <h2 class="display-4">The Mathemathic Conjecture</h2>
          <p>Introduced in 1937 and named after <strong>Lothar Collatz</strong> (German mathematician, 1910 - 1990), this is a still unsolved mathematic conjecture about a numeric sequence following this rule: given a Natural number greater than 0 (any positive integer), <strong>if this is odd</strong>, the next number in the sequence will be 3 times the previous plus 1. <strong>If it’s even</strong>, the next number will be half the previous. <em><strong>The conjecture states that, no matters what the first number is, the sequence will end in a 4->2->1 loop.</strong></em> </br>
          This is known with many other names such as: the <strong>3n + 1 problem</strong>, the <strong>3n + 1 conjecture</strong>, the <strong>Ulam conjecture</strong> (after Stanisław Ulam), <strong>Kakutani's problem</strong> (after Shizuo Kakutani), the <strong>Thwaites conjecture</strong> (after Sir Bryan Thwaites), <strong>Hasse's algorithm</strong> (after Helmut Hasse), or the <strong>Syracuse problem</strong>.</p>
      </div>

    </div>

    <div class="row align-items-center mt-5">
      <div class="col-lg-4">
        <div class="p-5"><img class="img-fluid rounded-circle" src="public/assets/img/fractal-1280110_1920.jpg" alt="collatz_conjecture" /></div>
      </div>
      <div class="col-lg-8">
        <h2 class="display-4">A Black Hole</h2>
        <p>As the matematician Paul Erdos once stated: "Mathematics is not yet ripe enough for such questions."</br>
        This conjecture is so controversial that some mathematicians describe it as infamous, and some people thought it could be invented by Soviet Union to slow down U.S. science.</br>
        The result sequences of the Collatz Conjecture are fascinating because generated paths looks random and even the closest numbers can create very different sequences. Besides that, still today no one has proven that really ANY integer positive number will surely end in the 4->2->1 loop. There it could be a number that end in a different loop or grow the sequence to infinity.</br>
        Anyway, any number from 1 to 2E68 have been tried by brutal force, almost 300 quintillion numbers. No one escaped the 4->2->1 loop and disproving the conjecture.</br>
        Mathematicians has tried in vain to disprove Collatz Conjecture in so many ways, some suggests others to waste no time in it, for it could absorb their mental energy (and careers) forever.</br>
        I find it very interesting. If the Collatz Conjecture will be disproved or not, for sure it already proved one thing: humans are a strange strange species that could spend time, money and energy in things they just made up, while the real world just falls apart under their feet.</p>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>

</body>
</html>