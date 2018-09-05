
<?php

	require_once 'imgdbconfig.php';
	
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT userPic FROM image WHERE userID =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("user_images/".$imgRow['userPic']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM image WHERE userID =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		header("Location: index.php");
	}

?>

<?php
session_start();
require_once 'loginclass.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$user_home->redirect('loginindex.php');
}

$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>

<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Music Club</title>
	<meta name="description" content="Free Html5 Templates and Free Responsive Themes Designed by Kimmy | zerotheme.com">
	<meta name="author" content="www.zerotheme.com">
	
    <!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- CSS
  ================================================== -->
  	<link rel="stylesheet" href="css/zerogrid.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/responsiveslides.css" />
	
	
	
	<link href='./images/favicon.ico' rel='icon' type='image/x-icon'/>
	<script src="js/jquery.min.js"></script>
	<script src="js/responsiveslides.js"></script>
	<script>
		$(function () {
		  $("#slider").responsiveSlides({
			auto: true,
			pager: false,
			nav: true,
			speed: 500,
			maxwidth: 962,
			namespace: "centered-btns"
		  });
		});
	</script>
  <style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial;
}

.header {
    text-align: center;
    padding: 32px;
}

.row {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    -ms-flex-wrap: wrap; /* IE10 */
    flex-wrap: wrap;
 
}

/* Create four equal columns that sits next to each other */
.column {
    -ms-flex: 33%; /* IE10 */
    flex: 33%;
    max-width: 33%;
    padding: 10px;
}

.column img {
    margin-top: 0px;
    vertical-align: middle;
}

/* Responsive layout - makes a two column-layout instead of four columns */


/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
 @media screen and (max-width: 800px) {
    .column {
        -ms-flex: 50%;
        flex: 50%;
        max-width: 50%;
    }
}
@media screen and (max-width: 625px) {
    .column {
        -ms-flex: 100%;
        flex: 100%;
        max-width: 100%;
    }
}
     
</style>
    
    
    
    <style>
   @import url(https://fonts.googleapis.com/css?family=Roboto:100,700;);
.snip1576 {
  background-color: #fff;
  color: #444;
  display: inline-block;
  font-family: 'Roboto', sans-serif;
  font-size: 24px;
  margin: 0px;
  
  overflow: hidden;
  position: relative;
  text-align: center;
  width: 100%;
}

.snip1576 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.45s ease;
  transition: all 0.45s ease;
}

.snip1576:after {
  background-color: #ff0066;
  height: 150%;
  bottom: -145%;
  content: '';
  left: 0;
  right: 0;
  position: absolute;
  -webkit-transition: all 0.5s linear;
  transition: all 0.5s linear;
}

.snip1576 img {
  vertical-align: top;
  max-width: 100%;
  backface-visibility: hidden;
}

.snip1576 figcaption {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  align-items: center;
  z-index: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
  line-height: 1.1em;
  opacity: 0;
  -webkit-transition-delay: 0s;
  transition-delay: 0s;
}

.snip1576 h3 {
  font-size: 1em;
  font-weight: 400;
  letter-spacing: 1px;
  margin: 0;
  text-transform: uppercase;
}

.snip1576 h3 span {
  display: block;
  font-weight: 700;
}

.snip1576 a {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 1;
}

.snip1576:hover > img,
.snip1576.hover > img {
  opacity: 0.1;
}

.snip1576:hover:after,
.snip1576.hover:after {
  bottom: 95%;
}

.snip1576:hover figcaption,
.snip1576.hover figcaption {
  opacity: 1;
  -webkit-transition-delay: 0.4s;
  transition-delay: 0.4s;
}


/* Demo purposes only */

</style>
    
    <script>
function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[1];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}
</script>
    <script>
    $("#slideshow > div:gt(0)").hide();

setInterval(function() { 
  $('#slideshow > div:first')
    .fadeOut(2000)
    .next()
    .fadeIn(2000)
    .end()
    .appendTo('#slideshow');
},  30000);
    </script>
    
    <style>
    #slideshow { 
    margin: 0px auto; 
    position: relative; 
    width: 240px; 
    height: 240px; 
    padding: 1px; 
    box-shadow: 0 0 20px rgba(0,0,0,0.4); 
}

#slideshow > div { 
    position: absolute; 
    top: 1px; 
    left: 1px; 
    right: 1px; 
    bottom: 1px; 
}</style>
   
   
    
</head>
<body>
<!--------------Header--------------->
<header>
	<div class="wrap-header zerogrid">
		<div id="logo"><a href="#"><img src="./images/logo.png"/></a></div>
		
		<div id="search">
			<div class="button-search"></div>
			<input type="text" id="myInput" onkeyup="myFunction()" value="Search..." onfocus="if (this.value == &#39;Search...&#39;) {this.value = &#39;&#39;;}" onblur="if (this.value == &#39;&#39;) {this.value = &#39;Search...&#39;;}">
		</div>
	</div>
</header>

<?php include 'loginnav.php'; ?>



<!--------------Content--------------->
<section id="content">
	<div class="wrap-content zerogrid">
        <div class="row block01">
        <ul id="myUL">
            
		<div class="row">
          
			         
<?php
	
	$stmt = $DB_con->prepare('SELECT userID, userName, userProfession, userPic, size, type FROM image ORDER BY userID DESC');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
            
			<div class="column">
                <li>
                 <a href="user_images/<?php echo $row['userPic'] ?>" target="_blank"/>    
               <figure class="snip1576" >
                  
                <img  src="user_images/<?php echo $row['userPic']; ?>" onclick="myFunction(this);"  width="100%"  />
                       
                  <figcaption >
                    <h3>Size: <?php echo $size?>kb <span><?php echo $type?></span></h3>
                  </figcaption>
                  
                  </figure>
              
				<p class="page-header">
				 
                    <td><a href="user_images/<?php echo $row['userPic'] ?>" target="_blank">Download File:- 
                    <?php echo $userName."&nbsp;/&nbsp;".$userProfession; ?>  </a></td> 
                    
				</p>
                    </li>
                </div> 
			      
			<?php
		}
	}
	else
	{
		?>
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>
        <?php
	}
	
?>
            
        
            </div>
            </ul>
		</div>
        
        <div class="row block01">
			<div class="col-1-3">
				<div class="wrap-col box">
					<h2>The White Night</h2>
					<p>Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis.</p>
					<div class="more"><a href="#">[...]</a></div>
				</div>
			</div>
			<div class="col-1-3">
				<div class="wrap-col box">
					<h2>Tons of Fans</h2>
					<p>Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis.</p>
					<div class="more"><a href="#">[...]</a></div>
				</div>
			</div>
			<div class="col-1-3">
				<div class="wrap-col box">
					<h2>Best DJ's Ever</h2>
					<p>Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis.</p>
					<div class="more"><a href="#">[...]</a></div>
				</div>
			</div>
        </div>
		<div class="row block02">
			<div class="col-2-3">
				<div class="wrap-col">
					<div class="heading"><h2>Latest Blog</h2></div>
					<article class="row">
						<div class="col-1-3">
							<div class="wrap-col">
								<img src="images/img1.png"/>
							</div>
						</div>
						<div class="col-2-3">
							<div class="wrap-col">
								<h2><a href="#">Dreaming With Us All Night</a></h2>
								<div class="info">By Admin on December 01, 2012 with <a href="#">01 Commnets</a></div>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra convallis auctor [...]</p>
							</div>
						</div>
					</article>
					<article class="row">
						<div class="col-1-3">
							<div class="wrap-col">
								<img src="images/img2.png"/>
							</div>
						</div>
						<div class="col-2-3">
							<div class="wrap-col">
								<h2><a href="#">Welcome To Our Great Site</a></h2>
								<div class="info">By Admin on December 01, 2012 with <a href="#">01 Commnets</a></div>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra convallis auctor [...]</p>
							</div>
						</div>
					</article>
					<article class="row">
						<div class="col-1-3">
							<div class="wrap-col">
								<img src="images/img3.png"/>
							</div>
						</div>
						<div class="col-2-3">
							<div class="wrap-col">
								<h2><a href="#">Stereosonic Is Back Just For You</a></h2>
								<div class="info">By Admin on December 01, 2012 with <a href="#">01 Commnets</a></div>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra convallis auctor [...]</p>
							</div>
						</div>
					</article>
					<article class="row">
						<div class="col-1-3">
							<div class="wrap-col">
								<img src="images/img4.png"/>
							</div>
						</div>
						<div class="col-2-3">
							<div class="wrap-col">
								<h2><a href="#">Club Galaxy White Night Show</a></h2>
								<div class="info">By Admin on December 01, 2012 with <a href="#">01 Commnets</a></div>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra convallis auctor [...]</p>
							</div>
						</div>
					</article>
				</div>
			</div>
			<div class="col-1-3">
				<div class="wrap-col">
					<div class="box">
						<div class="heading"><h2>Latest Albums</h2></div>
						<div class="content">
							<div id="slideshow">
   <div>
     <img src="user_images/618601.jpg">
   </div>
   <div>
    <img src="user_images/717730.jpg">
   </div>
   <div>
     <img src="user_images/152046.jpg">
   </div>
</div>
						</div>
					</div>
					<div class="box">
						<div class="heading"><h2>Upcoming Events</h2></div>
						<div class="content">
							<div class="list">
								<ul>
									<li><a href="#">Magic Island Ibiza</a></li>
									<li><a href="#">Bamboo Is Just For You</a></li>
									<li><a href="#">Every Hot Summer</a></li>
									<li><a href="#">Magic Island Ibiza</a></li>
									<li><a href="#">Bamboo Is Just For You</a></li>
									<li><a href="#">Every Hot Summer</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
        
</section>
<!--------------Footer--------------->
<?php include 'loginfooter.php'; ?>
</body></html>


