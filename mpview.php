

<?php
include_once 'mpdbconfig.php';
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
    
    
    <script>
                document.addEventListener("play", function(evt)
        {
          if(window.$_currentlyPlaying && window.$_currentlyPlaying != evt.target)
        {
        window.$_currentlyPlaying.pause();
        } 
        window.$_currentlyPlaying = evt.target;
        }, true);

   </script>
    
    
<style>
    

                    table {
                      border: 1px solid #ccc;
                      border-collapse: collapse;
                      margin: 0;
                      padding: 0;
                      width: 100%;
                      table-layout: auto;
                    }

                    table caption {
                      font-size: 1.5em;
                      margin: .5em 0 .75em;
                    }

                    table tr {
                      background-color: black;
                      border: 1px solid #ddd;
                      padding: .35em;
                    }

                    table th,
                    table td {
                      padding: .625em;
                      text-align: left;
                    }

                    table th {
                      font-size: .85em;
                      letter-spacing: .1em;
                      text-transform: uppercase;
                    }

                    @media screen and (max-width: 800px) {
                      table {
                        border: 0;
                      }

                      table caption {
                        font-size: 1.3em;
                      }

                      table thead {
                        border: none;
                        clip: rect(0 0 0 0);
                        height: 1px;
                        margin: -1px;
                        overflow: hidden;
                        padding: 0;
                        position: absolute;
                        width: 1px;
                      }

                      table tr {
                        border-bottom: 3px solid #ddd;
                        display: block;
                        margin-bottom: .625em;
                      }

                      table td {
                        border-bottom: 1px solid #ddd;
                        display: block;
                        font-size: .8em;
                        text-align: left;
                      }

                      table td::before {
                        /*
                        * aria-label has no advantage, it won't be read inside a table
                        content: attr(aria-label);
                        */
                        content: attr(data-label);
                        float: left;
                        font-weight: bold;
                        text-transform: uppercase;
                      }

                      table td:last-child {
                        border-bottom: 0;
                      }
                    }
        </style>

    
    
        <style>#body table
        {
            margin:0 auto;
            position:relative;
            bottom:50px;
        }
        table td,th
        {
            padding:20px;
            border: solid #9fa8b0 1px;
            border-collapse:collapse;
        }
        </style>
    
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {


      td = tr[i].getElementsByTagName("td")[3];
     
    
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
    
    
</head>
<body>
<!--------------Header--------------->
<header>
	<div class="wrap-header zerogrid">
		<div id="logo"><a href="#"><img src="./images/logo.png"/></a></div>
		
		<div id="search">
			<div class="button-search"></div>
			<input type="text" id="myInput" onkeyup="myFunction()" placeholder"Search">
		</div>
	</div>
</header>

<?php include 'loginnav.php'; ?>



<!--------------Content--------------->
<section id="content">
	<div class="wrap-content zerogrid">
        
        
        <div class="row block01">
			
				
                    
					<table width="100%" border="1" id="myTable">
                <tr>
                    
                <th colspan="4">your uploads...<label><a href="mpindex.php">upload new files...</a></label></th>
                </tr>
                <tr align="left">
                <th>File Name</th>
                <th>File Type</th>
                <th>File Size(KB)</th>
                <th>Play</th>
                
                </tr>
                <?php
                $sql="SELECT * FROM tbl_uploads";
                $result_set=mysql_query($sql);
                while($row=mysql_fetch_array($result_set))
                {
                    ?>
                    <tr>
                    <td><a href="mpuploads/<?php echo $row['file'] ?>" target="_blank" <?php echo $row['file'] ?>><?php echo $row['file'] ?></a>
                    </td>
                   
                    <td><?php echo $row['type'] ?></td>
                    <td><?php echo $row['size'] ?></td>
                    <td>
                        <audio controls>
                            <source src="mpuploads/<?php echo $row['file']; ?>" type='video/mp4'>
                            Your browser does not support the audio element.
                        </audio>
                    </td>
                   
                    </tr>
                            
                    <?php
                }
                ?>
                </table>
				
			
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
							<img src="images/albums.png"/>
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