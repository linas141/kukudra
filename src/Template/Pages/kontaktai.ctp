<?php
$this->layout = false;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Kontaktai » Kukudra | Kavinė Kretingalėje</title>
    <link rel="stylesheet" href="/assets/home/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/home/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/home/css/Bold-BS4-Animated-Back-To-Top.css">
    <link rel="stylesheet" href="/assets/home/css/ebs-contact-form.css">    
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="/assets/home/css/Pretty-Footer.css">
    <link rel="stylesheet" href="/assets/home/css/Juvi---Push-Empty-Space-20px.css">
    <link rel="stylesheet" href="/assets/home/css/sticky-dark-top-nav-with-dropdown.css">
    <link rel="stylesheet" href="/assets/home/css/styles.css">
</head>

<body>
	<?= $this->element('menu') ?>
    <div class="Push-20" style="height: 80px;">
    </div><div style="row"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5508.232723454229!2d21.193434!3d55.834259!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6e8c6d40384124b!2sKukudra!5e1!3m2!1sen!2slt!4v1553258016865" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
    <div class="Push-20" style="height: 60px;">
        <section></section>
    </div>
    <h1 class="display-3 text-uppercase text-center" style="padding-right: 10px;padding-bottom: 10px;font-size: 40px;">kontaktai</h1>
    <div class="container" id="info-container">
        <section></section>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6" id="contact-box">
                <h1 class="display-3 text-uppercase text-center" style="padding-right: 10px;padding-bottom: 10px;font-size: 26px;">Susisiekite šiais būdais</h1>
                <p id="contact-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel nam magnam natus tempora cumque, aliquam deleniti voluptatibus voluptas. Repellat vel, et itaque commodi iste ab, laudantium voluptas deserunt nobis. </p>
                <div class="info-box"><i class="fa fa-map-marker my-info-icons"></i><span class="text-uppercase text-info">&nbsp;ADRESAS: </span><span>Klaipėdos g. 16, Kretingalė, Klaipėdos apskr.</span></div>
                <div class="info-box"><i class="fa fa-envelope my-info-icons"></i><span class="text-uppercase text-info">El. paštas: </span><span>Kukudra@Kukudra.lt </span></div>
                <div class="info-box"><i class="fa fa-phone-square my-info-icons"></i><span class="text-uppercase text-info">telefono nr.: </span><span>(8-46) 446736</span></div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 site-form"><form id="my-form">
    <div class="form-group"><label class="sr-only" for="firstname">Vardas</label><input type="text" name="firstname"  placeholder="Vardas" class="form-control" id="firstname"/></div>
    <div class="form-group"><label class="sr-only" for="lastname">Pavardė</label><input type="text" name="lastname" placeholder="Pavardė" class="form-control" id="lastname" /></div>
    <div class="form-group"><label class="sr-only" for="phonenumber">Telefono nr.</label><input type="tel" name="phonenumber"  placeholder="Telefono nr." class="form-control" id="phonenumber" /></div>
    <div class="form-group"><label class="sr-only" for="email">El. pašto adresas</label><input type="text" name="email" required placeholder="El. pašto adresas" class="form-control" id="email" oninvalid="this.setCustomValidity('Įveskite el. pašto adresą')"/></div>
    <div class="form-group"><label class="sr-only" for="messages">Žinutė</label><textarea rows="8" name="messages" required placeholder="Žinutė" class="form-control" oninvalid="this.setCustomValidity('Įveskite žinutę')"/></textarea></div><button class="btn btn-light btn-lg" type="submit" id="form-btn">SIŲSTI </button></form></div>
            <div class="clearfix"></div>
        </div>
        <div>
            <div class="modal fade" role="dialog" tabindex="-1" id="modal1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Contact Information</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                        <div class="modal-body">
                            <form action="javascript:void(0);" method="get" id="contactForm"><input class="form-control" type="hidden" name="Introduction" value="This email was sent from www.awebsite.com"><input class="form-control" type="hidden" name="subject" value="Awebsite.com Contact Form"><input class="form-control"
                                    type="hidden" name="to" value="email@awebsite.com">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div id="successfail"></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6" id="message">
                                        <h2 class="h4"><i class="fa fa-envelope"></i> Contact Us<small><small class="required-input">&nbsp;(*required)</small></small>
                                        </h2>
                                        <div class="form-group"><label for="from-name">Name</label><span class="required-input">*</span>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user-o"></i></span></div><input class="form-control" type="text" name="name" required="" placeholder="Full Name" id="from-name"></div>
                                        </div>
                                        <div class="form-group"><label for="from-email">Email</label><span class="required-input">*</span>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope-o"></i></span></div><input class="form-control" type="text" name="email" required="" placeholder="Email Address" id="from-email"></div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                                <div class="form-group"><label for="from-phone">Phone</label><span class="required-input">*</span>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone"></i></span></div><input class="form-control" type="text" name="phone" required="" placeholder="Primary Phone" id="from-phone"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                                <div class="form-group"><label for="from-calltime">Best Time to Call</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></div><select class="form-control" name="call time" id="from-calltime"><optgroup label="Best Time to Call"><option value="Morning" selected="">Morning</option><option value="Afternoon">Afternoon</option><option value="Evening">Evening</option></optgroup></select></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group"><label for="from-comments">Comments</label><textarea class="form-control" rows="5" name="comments" placeholder="Enter Comments" id="from-comments"></textarea></div>
                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col"><button class="btn btn-primary btn-block" type="reset"><i class="fa fa-undo"></i> Reset</button></div>
                                                <div class="col"><button class="btn btn-primary btn-block" type="submit">Submit <i class="fa fa-chevron-circle-right"></i></button></div>
                                            </div>
                                        </div>
                                        <hr class="d-flex d-md-none">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <h2 class="h4"><i class="fa fa-location-arrow"></i> Locate Us</h2>
                                        <div class="form-row">
                                            <div class="col-12">
                                                <div class="static-map"><a href="https://www.google.com/maps/place/Daytona+International+Speedway/@29.1815062,-81.0744275,15z/data=!4m13!1m7!3m6!1s0x88e6d935da1cced3:0xa6b3e1bc0f2fc83a!2s1801+W+International+Speedway+Blvd,+Daytona+Beach,+FL+32114!3b1!8m2!3d29.187028!4d-81.0703076!3m4!1s0x88e6d949a4cb8593:0x1387c6c0b5c8cc97!8m2!3d29.1851681!4d-81.0705292"
                                                        target="_blank" rel="noopener"> <img class="img-fluid" src="http://maps.googleapis.com/maps/api/staticmap?autoscale=2&amp;size=600x210&amp;maptype=roadmap&amp;format=png&amp;visual_refresh=true&amp;markers=size:mid%7Ccolor:0xff0000%7Clabel:%7C582+1801+W+International+Speedway+Blvd+Daytona+Beach+FL+32114&amp;zoom=12" alt="Google Map of Daytona International Speedway"></a></div>
                                            </div>
                                            <div class="col-sm-6 col-md-12 col-lg-6">
                                                <h2 class="h4"><i class="fa fa-user"></i> Our Info</h2>
                                                <div><span><strong>Name</strong></span></div>
                                                <div><span>email@awebsite.com</span></div>
                                                <div><span>www.awebsite.com</span></div>
                                                <hr class="d-sm-none d-md-block d-lg-none">
                                            </div>
                                            <div class="col-sm-6 col-md-12 col-lg-6">
                                                <h2 class="h4"><i class="fa fa-location-arrow"></i> Our Address</h2>
                                                <div><span><strong>Office Name</strong></span></div>
                                                <div><span>55 Icannot Dr</span></div>
                                                <div><span>Daytone Beach, FL 85150</span></div>
                                                <div><abbr data-toggle="tooltip" data-placement="top" title="Office Phone: 555-867-5309">O:</abbr> 555-867-5309</div>
                                                <hr class="d-sm-none">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><a href="#0" class="cd-top js-cd-top cd-top--fade-out cd-top--show" style="background-image: url(&quot;/assets/home/img/cd-top-arrow.svg&quot;);background-color: rgb(20,133,238);">Top</a>
	<?= $this->element('mainfoot') ?>
	<script src="/assets/home/js/jquery.min.js"></script>
    <script src="/assets/home/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/home/js/Bold-BS4-Animated-Back-To-Top.js"></script>
    <script src="https://use.fontawesome.com/1744f3f671.js"></script>
</body>
</html>