<?php
require_once "pdo.php";
session_start();

if ($_SESSION['loggedIn'] == false){
    header("Location:login.php");
}  






?>

<html>
<head></head><body>
<?php
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}

/*if ( isset($_SESSION['login']) ) {
    echo '<p style="color:green">'.$_SESSION['login']."</p>\n";
    unset($_SESSION['login']);
    
}*/


$stmt = $pdo->query("SELECT * FROM personal ");
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$edu = $pdo->query("SELECT * FROM education ");
$rowedu = $edu->fetch(PDO::FETCH_ASSOC);

$extra = $pdo->query("SELECT * FROM extracurricular ");
$rowextra = $extra->fetch(PDO::FETCH_ASSOC);

$hobby = $pdo->query("SELECT * FROM hobbies ");
$rowhobby = $hobby->fetch(PDO::FETCH_ASSOC);

$skills = $pdo->query("SELECT * FROM skills ");
$rowskills = $skills->fetch(PDO::FETCH_ASSOC);

$projects = $pdo->query("SELECT * FROM projects ");
$rowprojects = $projects->fetch(PDO::FETCH_ASSOC);




?>
</table>




<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Krish's Resume</title>
    <meta name="description" content="Creative CV is a HTML resume template for professionals. Built with Bootstrap 4, Now UI Kit and FontAwesome, this modern and responsive design template is perfect to showcase your portfolio, skils and experience."/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/aos.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="styles/main.css" rel="stylesheet">
  </head>
  <body id="top">
    <header>
      <div class="profile-page sidebar-collapse">
        <nav class="navbar navbar-expand-lg fixed-top navbar-transparent bg-info" color-on-scroll="400">
          <div class="container">
            <div class="navbar-translate"><a class="navbar-brand" href="#" rel="tooltip">Krish's Resume</a>
              <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-bar bar1"></span><span class="navbar-toggler-bar bar2"></span><span class="navbar-toggler-bar bar3"></span></button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
              <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#about">Personal</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#skill">Skills</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#education">Education</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#projects">Projects</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#exc">Extracurricular</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#hobbies">Hobbies</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#contact">Contact</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="edit.php">Edit</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="logout.php">Logout</a></li>


              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <div class="page-content">
      <div>
<div class="profile-page">
  <div class="wrapper">
    <div class="page-header page-header-small" filter-color="white">
      <div class="page-header-image" data-parallax="true" style="background-image: url('images/1234.jpg');"></div>
      <div class="container">
        <div class="content-center">
          <div class="cc-profile-image"><a href="#"><img src="https://iic.spit.ac.in/img/krish.jpeg" alt="Image"/></a></div>
          <div class="h2 title">Krish Sukhani</div>
          <p class="category text-white">Web Developer</p>
          
        </div>
      </div>
      
      
    </div>
  </div>
</div>
<div class="section" id="about">
  <div class="container">
    <div class="card" data-aos="fade-up" data-aos-offset="10">
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card-body">
            <div class="h4 mt-0 title">Personal Information</button>
</div>

            <div class="row">
              <div class="col-sm-4 "><strong class="text-uppercase">Name:</strong></div>
              <div class="col-sm-8"><?= htmlentities($row['name'])  ?></div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-4"><strong class="text-uppercase">Email:</strong></div>
              <div class="col-sm-8"><?= htmlentities($row['Email'])  ?></div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-4"><strong class="text-uppercase">Phone:</strong></div>
              <div class="col-sm-8"><?= htmlentities($row['mobile'])  ?></div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-4"><strong class="text-uppercase">Occupation:</strong></div>
              <div class="col-sm-8"><?= htmlentities($row['occupation'])  ?></div>
            </div>
            
            </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
<center>

<div class="section" id="skill">
  <div class="container">
    <div class="card" data-aos="fade-up" data-aos-offset="10">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card-body">
            <div class="h4 mt-0 title">Skills</div>
                <table border = "1px">
                <tr><td><b>Skill</td><td><b>Skill Type</td><td><b>Value</td></tr>
                <?php
                    while ( $rowskills = $skills->fetch(PDO::FETCH_ASSOC) ) {
                        echo "<tr><td>";
                        echo(htmlentities($rowskills['skill']));
                        echo("</td><td>");
                        echo(htmlentities($rowskills['skill_type']));
                        echo("</td><td>");
                        echo(htmlentities($rowskills['skill_value']));
                        
                        
                        
                        echo("</td></tr>\n");
                        }
                        ?>

            </table>
                                
            </div>
            
        </div>
        
        
      </div>
      
    </div>
  </div>
</div>
</center>


<center>

<div class="section" id="education">
  <div class="container">
    <div class="card" data-aos="fade-up" data-aos-offset="10">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card-body">
            <div class="h4 mt-0 title">Education</div>
            <table border = "1px">
                <tr><td><b>Qualification</td><td><b>University</td><td><b>Percentage</td><td><b>Year of Passing</td></tr>
                <?php
                    while ( $rowedu = $edu->fetch(PDO::FETCH_ASSOC) ) {
                        echo "<tr><td>";
                        echo(htmlentities($rowedu['qualification']));
                        echo("</td><td>");
                        echo(htmlentities($rowedu['university']));
                        echo("</td><td>");
                        echo(htmlentities($rowedu['percentage']));
                        echo("</td><td>");
                        echo(htmlentities($rowedu['passingyear']));
                        echo("</td></tr>\n");
                        }
                        ?>

            </table>
                                
            </div>
            
        </div>
        
        
      </div>
      
    </div>
  </div>
</div>
</center>

<div class="section" id="projects">
<div class="container">
<div class="h3 text-center mb-4 title">Projects</div>
<div class="card-deck">

<?php
                    while ( $rowprojects = $projects->fetch(PDO::FETCH_ASSOC) ) {
                        echo '<div class="card"><div class="card-header"><h3><center><b>';
                        echo(htmlentities($rowprojects['title']));
                        echo('</h3></b></div><div class="card-body"><h3><p class="para card-text"><center>');
                        echo(htmlentities($rowprojects['description']));
                        echo('</p><p class="card-text"><small class="text-muted">Domain: ');
                        echo(htmlentities($rowprojects['domain']));
                        echo("</small></p></div></div>");
                        }
                        ?>
              
              </div>
              
            </div>  
            </div>
                    </div>




<div class="section" id="exc">
  <div class="container">
    <div class="card" data-aos="fade-up" data-aos-offset="10">
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card-body">
            <div class="h4 mt-0 title">Extra Curricular Activities</div>
            <?php
                    while ( $rowextra = $extra->fetch(PDO::FETCH_ASSOC) ) {
                        echo '<div class="row"><div class="col-sm-6"><strong class="text-uppercase">';
                        echo(htmlentities($rowextra['name']));
                        echo('</strong></div><div class="col-sm-6">');
                        echo(htmlentities($rowextra['year']));
                        echo('</div></div><hr>');
                        
                        }
            ?>

            
            </div>
        </div>
        
      </div>
    </div>
  </div>
</div>


<div class="section" id="hobbies">
  <div class="container">
    <div class="card" data-aos="fade-up" data-aos-offset="10">
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card-body">
            <div class="h4 mt-0 title">Hobbies</div>
            <?php
                    while ( $rowhobby = $hobby->fetch(PDO::FETCH_ASSOC) ) {
                        echo '<div class="row"><div class="col-sm-12"><strong class="text-uppercase">';
                        echo(htmlentities($rowhobby['hobby']));
                        echo('</strong></div>');
                        
                        echo('</div><hr>');
                        
                        }
            ?>

            
            </div>
        </div>
        
      </div>
    </div>
  </div>
</div>















<div class="section" id="contact">
  <div class="cc-contact-information" >
    <div class="container">
      <div class="cc-contact">
        <div class="row">
          <div class="col-md-9">
            <div class="card mb-0" >
              <div class="h2 text-center title">Contact Me</div>
              <div class="row">
                <div class="col-md-6">
                  <div class="card-body">
                    <form  method="POST">
                      <div class="p pb-3"><strong></strong></div>
                      <div class="row mb-3">
                        <div class="col">
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input class="form-control" type="text" name="name" placeholder="Name" required="required"/>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col">
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input class="form-control" type="text" name="Subject" placeholder="Subject" required="required"/>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col">
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input class="form-control" type="email" name="_replyto" placeholder="E-mail" required="required"/>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col">
                          <div class="form-group">
                            <textarea class="form-control" name="message" placeholder="Your Message" required="required"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <button class="btn btn-link " type="submit"><a href = "mailto: krish.sukhani@spit.ac.in">Send</a></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card-body">
                    <p class="mb-0"><strong>Address </strong></p>
                    <p class="pb-2">92/18, Sind Sagar, opp Andhra School,Wadala, Mumbai 31</p>
                    <p class="mb-0"><strong>Phone</strong></p>
                    <p class="pb-2">9819686640</p>
                    <p class="mb-0"><strong>Email</strong></p>
                    <p>krish.sukhani@gamil.com</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div></div>
    </div>
    <footer class="footer">
      <div class="container text-center"><a class="cc-facebook btn btn-link" href="https://www.facebook.com/krish.sukhani/"><i class="fa fa-facebook fa-4x " aria-hidden="true"></i></a><a class="cc-instagram btn btn-link" href="https://www.instagram.com/krish_sukhani/"><i class="fa fa-instagram fa-4x " aria-hidden="true"></i></a></div>
      <div class="h4 title text-center">Krish Sukhani</div>
      
    </footer>
    <script src="js/core/jquery.3.2.1.min.js"></script>
    <script src="js/core/popper.min.js"></script>
    <script src="js/core/bootstrap.min.js"></script>
    <script src="js/now-ui-kit.js?v=1.1.0"></script>
    <script src="js/aos.js"></script>
    <script src="scripts/main.js"></script>
  </body>
</html>
