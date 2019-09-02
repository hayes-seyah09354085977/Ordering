<?php 
require_once("include/initialize.php"); 
$content='home.php';
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';
switch ($view) { 
	case 'apply' :
        $title="Submit Application";	
		$content='applicationform.php';		
		break;
	case 'login' : 
        $title="Login";	
		$content='login.php';		
		break;
	case 'company' :
        $title="Company";	
		$content='company.php';		
		break;
	case 'map' :
		$title = isset($_GET['search']) ?  $_GET['search'] :"Map"; 
		$content='map.php';		
		break;		
	case 'category' :
        $title='SEARCH FOR CATEGORY';	
		$content='category.php';		
		break;
	case 'product-view' :
		$title='View Product';	
		$content='product-view.php';		
		break;	
	case 'checkout' :
        $title='Checkout';	
		$content='checkout.php';		
		break; 
	case 'paymentMethod':
		$title='Payment Method';	
		$content='payment.php';
		break;

	case 'products' :
        $title="Product Details";	
		$content='viewproduct.php';		
		break;
	case 'success' :
        $title="Success";	
		$content='success.php';		
		break;
	case 'register/customer' :
        $title="Register New Account";	
		$content='register.php';		
		break;
	case 'register/store' :
        $title="Register New Member";	
		$content='registerstore.php';		
		break;
	case 'Contact' :
        $title='CONTACT US';	
		$content='Contact.php';		
		break;	
	case 'About' :
        $title='ABOUT US';	
		$content='About.php';		
		break;	
	case 'advancesearch' :
        $title='Advance Search';	
		$content='advancesearch.php';		
		break;	

	case 'result' :
        $title='Advance Search';	
		$content='advancesearchresult.php';		
		break;
	case 'search/store' :
        $title='Search by Store';	
		$content='searchbystore.php';		
		break;	
	case 'search/category' :
        $title='Search by Category';	
		$content='searchbycategory.php';		
		break;	
	case 'search-jobtitle' :
        $title='Search by Job Title';	
		$content='searchbytitle.php';		
		break;	
	case 'cart' :
        $title='Cart';	
		$content='cart.php';		
		break;						
	default :
	    $active_home='active';
	    $title="Home";	
		$content ='home.php';		
}
require_once("theme/templates.php");
?>