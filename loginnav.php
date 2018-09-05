<style>
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: relative;
    background-color:gainsboro;
    min-width: 100%;
    box-shadow: 0px 0px 0px 0px black);
    padding: 12px 16px;
    z-index: 1;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>

<nav>
	<div class="wrap-nav zerogrid">
		<div class="menu" align="right">
			<ul>
				<li class="current"><a href="loginhome.php">Home</a></li>
				<li><a href="vidindex.php">Video</a></li>
				<li><a href="mpview.php">MP3 Songs</a></li>
				<li><a href="imgindex.php">Wallpaer</a></li>
				
                    
                                   
            </ul>
            
              <ul class="dropdown" align="center">
                   <li class="current">
                    <a>
				     <?php echo $row['userEmail']; ?>
                    </a>
                 
                    <ul class="dropdown-content" >
                      
                                   
                                         
                                        <a href="loginlogout.php">Logout</a>
                       
                                   
                    </ul>
                    </li>
              </ul>
		</div>
		
		<div class="minimenu"><div>MENU</div>
			<select onchange="location=this.value">
				
				<option value="loginhome.php">Home</option>
				<option value="vidindex.php">Video</option>
				<option value="mpview.php">MP3 Songs</option>
				<option value="imgindex.php">Wallpaper</option>
				
			</select>
		</div>		
	</div>
</nav>






