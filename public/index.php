<?php 


if (isset($_REQUEST['q'])) {

	$req = explode('/', $_REQUEST['q']);

  switch ($req[0]) {

    /* Home */
    case '':
    case 'home':
      $title = 'Collatz Conjecture | Generate';
      $headerTitle = 'Collatz Conjecture';
      $headerSubTitle = 'Insert your number and calculate';
      include('home.php');
      break;

    /* About CC */
    case 'what-is-collatz-conjecture':
      $title = 'Collatz Conjecture | What is it';
      $headerTitle = 'Collatz Conjecture';
      $headerSubTitle = 'What is all about';
      include('about_cc.php');
      break;

    /* About CC */
    case 'about-api':
      $title = 'Collatz Conjecture | The API';
      $headerTitle = 'Collatz Conjecture';
      $headerSubTitle = 'The API';
      include('about_api.php');
      break;

    /* Error page not found 404.php */
    case '404':
    default:
      $title = '404 | Page not found';
      $headerTitle = '404';
      $headerSubTitle = 'Page Not Found';
      include('404.php');
      break;

  }


}

?>



