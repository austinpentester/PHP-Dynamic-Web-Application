<?php

include 'conn/conn.php';

$sql = "SELECT * FROM static_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();
    $icon = $row['favIcon'];
    $siteTittle = $row['siteTittle'];

}
?>



<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name=”keywords” content=" MrHandy – Handyman Services Html Template, MrHandy – Handyman Services WordPress Theme,  themes & template, html5 template, WordPress theme, unlimited colors available, ui/ux, ui/ux design, best html template, html template, html, JavaScript, best CSS theme,css3, elementor theme, latest premium themes 2023, latest premium templates 2023, Preyan Technosys Pvt.Ltd, cymol themes, themetech mount, Web 3.0, multi-theme, website theme and template, woocommerce, bootstrap template, web templates, responsive theme, services, web design and development, air conditioning, auto mechanic, carpenter, cleaning, multipurpose services theme, construction, handyman multi services, renovation & repair, home maintenance, appliance repair ">
<meta name="description" content="Solar &#8211; Handyman Services HTML5 Template" />
<meta name="author" content="https://www.cymolthemes.com/" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title> <?php echo $siteTittle ?></title>

<link rel=“canonical” href=%c3%a2%c2%80%c2%9chttps_/www.cymolthemes.com/html/mrhandy/solar/%c3%a2%c2%80%c2%9d.html />
<link rel="shortcut icon" href="admin/uploads/<?php echo $icon; ?>" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/animate.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="css/flaticon.css"/>
<link rel="stylesheet" type="text/css" href="css/themify-icons.css"/>
<link rel="stylesheet" type="text/css" href="css/slick.css">
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
<link rel="stylesheet" type="text/css" href="css/shortcodes.css"/>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<link rel="stylesheet" type="text/css" href="css/megamenu.css"/>
<link rel="stylesheet" type="text/css" href="css/responsive.css"/>

<!-- REVOLUTION LAYERS STYLES -->
<link rel='stylesheet' id='rs-plugin-settings-css' href="revolution/css/rs6.css"> 
<style>
    
.tmtheme_fbar_icons {
    display: none;
    position: relative;
    width: 55px;
    height: 45px;
    line-height: 52px;
    text-align: center;
}



.slider {
  position: relative;
  width: 100%;
  overflow: hidden;
}

.slide {
  display: none;
  position: relative;
}

.slide img {
  width: 100%;
  height: auto;
}

.caption {
  position: absolute;
  bottom: 50px;
  left: 50px;
  color: white;
  background: rgba(0, 0, 0, 0.5);
  padding: 20px;
  border-radius: 5px;
}

.caption h2 {
  margin: 0 0 10px;
  font-size: 2em;
}

.caption p {
  margin: 0 0 20px;
}

.btn {
  display: inline-block;
  padding: 10px 20px;
  color: white;
  background: #57b33e;
  border-radius: 50px;
  text-decoration: none;
}

.btn i {
  margin-left: 10px;
}

.active {
  display: block;
}







body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    font-family: Arial, sans-serif;
}

.image-container {
    position: relative;
    width: 100%;
    max-width: 100%;
    max-height: 600px;
}

.image-container img {
    width: 100%;
    height: auto;
    display: block;
}

.overlay-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
}

.overlay-text h1 {
    font-size: 3em;
    margin: 0;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
}

.overlay-text p {
    font-size: 1.5em;
    margin: 0;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
}

.cmt-custom-row {
    padding: 66px 0;
}

</style>

</head>