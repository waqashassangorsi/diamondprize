<?php 
if($_SERVER['HTTP_HOST']=="diamondprizes.com"){
    
}else{
    // exit;
};

//echo $this->input->ip_address();
//$getloc = json_decode(file_get_contents("http://ipinfo.io/".$this->input->ip_address()));

$getloc = json_decode(file_get_contents("https://api.ipgeolocationapi.com/geolocate/".$this->input->ip_address()));

//echo "<pre>";var_dump($getloc->name);

if($getloc->name=="Ireland"){
    $this->session->set_userdata("location",1);
}else{
    $this->session->set_userdata("location",2);
}
?>

<?php 

    $array = array(
                    "city"=>$getloc->city
                  );
                  
    $this->Common->insert("visitors",$array);             
    
?> 

 
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php if($this->uri->segment(1)=='Competitons'){
         $descriptio = "All of diamond prizes live competitions in one place look find on that you like and buy a ticket. Diamond prizes win your dreams.";
    }else if($this->uri->segment(1)=='Club'){
         $descriptio = "300 club from diamond prizes you can buy a more expensive ticket for a better chance to win. Here in 300 club, our competitions have a maximum of 300 entries, Diamond prizes win your dreams.";
    }else if($this->uri->segment(1)=='Winner'){
         $descriptio = "See all of the winners that have gone before you and get a taste of what it is like to be a diamond prizes winner. Grab a ticket and your name could be here soon, Diamond prizes win your dreams.";
    }else if($this->uri->segment(1)=='Blog'){
        
         $up_id=$this->uri->segment(3);
         if($up_id!="")
         {
             $descriptio = $this->db->query("SELECT meta_description FROM blog WHERE id =$up_id")->result_array()[0]["meta_description"];
         }
			  
        // $descriptio = "This is the place to be if you want to keep up to date with diamond prizes news and offers, we will also give you glimpses of prizes that are coming up, Diamond prizes win your dreams.";
    }else if($this->uri->segment(1)=='Faq'){
         $descriptio = "You can get answers to our most frequently asked questions and then head over to our live competitions and try your luck, Diamond prizes win your dreams. ";
    }else if($this->uri->segment(1)=='Result'){
         $descriptio = "Check back here after every competition is drawn and check to see of you are a diamond prizes winner, Diamond prizes win your dreams.";
    }?>
    
    <meta name="description" content="<?php echo $descriptio;?>" />
    <title>Diamond Prizes</title>
    <base href="<?php echo base_url(); ?>"> 
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/images/logo.png">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontasome.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flip.min.css">
    <link rel="stylesheet" media="all" href="https://public-assets.envato-static.com/assets/market/core/index-f6dd290ebf32d53ca45a5b75a757a2838c386ee85342921954318260466ee964.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/search/animate.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/search/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/customabout.css" />
    
   
    
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/flip.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
    
    <script>
        (function(w,d,s,r,n){w.TrustpilotObject=n;w[n]=w[n]||function(){(w[n].q=w[n].q||[]).push(arguments)};
            a=d.createElement(s);a.async=1;a.src=r;a.type='text/java'+s;f=d.getElementsByTagName(s)[0];
            f.parentNode.insertBefore(a,f)})(window,document,'script', 'https://invitejs.trustpilot.com/tp.min.js', 'tp');
            tp('register', 'UwuEx11IEMCxHmfu');
    </script>
    
    <!-- TrustBox script -->
<script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
<!-- End TrustBox script -->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-177308915-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-177308915-1');
</script>


<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1085361168561494');
fbq('track', 'PageView');

<?php if($this->uri->Segment(1)=="Tickets"){?>
fbq('track', 'AddToCart');

<?php } ?>
</script>

<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1085361168561494&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->



<!-- Snap Pixel Code -->

<script type='text/javascript'>
  (function(win, doc, sdk_url){ 
  if(win.snaptr) return;
  var tr=win.snaptr=function(){ 
  tr.handleRequest? tr.handleRequest.apply(tr, arguments):tr.queue.push(arguments);
 };
  tr.queue = [];
  var s='script';
  var new_script_section=doc.createElement(s);
  new_script_section.async=!0;
  new_script_section.src=sdk_url;
  var insert_pos=doc.getElementsByTagName(s)[0];
  insert_pos.parentNode.insertBefore(new_script_section, insert_pos);
 })(window, document, 'https://sc-static.net/scevent.min.js';);

  snaptr('init','fda18b20-cb36-4e5d-8bb6-f881474a32a3',{ 
  'user_email':info@diamondprizes.com
 })
  snaptr('track','ADD_CART');
</script>


    
</head>
<body>

   