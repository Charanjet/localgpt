<?php
    include 'header.php';
?>
<!-- intro popup  -->
<div id="intro-modal" class="modal fade">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">
                <img src="./assets/img/intro-avatar-girl.png" class="avatar" alt="Avatar">
                <h4 class="modal-title">Welcome</h4>

            </div>
            <div class="modal-body">
                <form action="/confirmation.php" method="post" id="entry-form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="fname" placeholder="Full Name" required="required">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                    </div>
                    <p class="single-info-box">Please Enter your email to continue</p>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <img src="..." class="rounded me-2" alt="...">
        <strong class="me-auto">Bootstrap</strong>
        <small class="text-muted">11 mins ago</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        Hello, Welcome! to the AI World
    </div>
</div>
<!-- intro popup end -->

<!-- response waiting popup  -->
<div class="modal fade" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="loader"><img src="./assets/img/loader.svg" alt="loader..."></div>
                <div clas="loader-txt">
                    <p>Please wait while we are preparing response in your language. <br><br><small>If you love this, do leave a comment</small></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- response waiting popup end  -->
<!-- comment thanks popup  -->
<!--Model Popup starts-->
<div class="container">
    <div class="row">
        <a class="btn btn-primary success-popup" data-toggle="modal" href="#ignismyModal" style="display: none">open Popup</a>
        <div class="modal fade" id="ignismyModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                    </div>

                    <div class="modal-body">

                        <div class="thank-you-pop">
                            <img src="./assets/img/greentick.gif" alt="">
                            <h1>Thank You!</h1>
                            <p>Your submission is received and we will review your comment soon!</p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--Model Popup ends-->
<!-- comment thanks popup end -->

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-12">
            <!-- welcome message  -->
            <div class="message">
                Hello Welcome, to the new world of AI. This tool is going to help you to use the chatGPT in your own language. Just enter your query in your own language we will give you result in the same language.You can also input your message in your language but need to choose the same first. Your result will be automatically translated to your selected language only.
            </div>
            <!-- input and output  -->
            <div class="main-content">
                <div class="main_section">
                    <div class="container">
                        <div class="chat_container">
                            <div class="col-12 message_section">
                                <div class="row">
                                    <div class="chat_area">
                                        <ul class="list-unstyled">
                                            <li class="left clearfix">
                                                <div class="chat-body1 clearfix">
                                                    <p>Welcome,Start typing your query. We will produce best answer for you. </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div><!--chat_area-->
                                    <form action="/translate.php" class="message_form message_write" method="post" id="chat_form">
                                        <div class="input-group mb-3">
                                            <label class="pr-3 mb-0" for="langs">Choose your language: </label>
                                            <input list="langs-list" id="langs" name="inp-lang">
                                            <datalist id="langs-list">
                                                <?php 
                                                    foreach($langs as $index => $code){
                                                        echo '<option value="$langs[$index]->name" data-value="$langs[$index]->code">$langs[$index]->name</option>';
                                                    }                                                 
                                                ?>
                                            </datalist>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="message" name="message" placeholder="Type here to start Asking/Chat" aria-label="Start Asking/Chat" aria-describedby="gpt-query">
                                            <button type="submit" class="input-group-text" id="gpt-query-btn">Send <i class="fa fa-paper-plane"></i> </button>
                                        </div>
                                    </form>
                                </div>
                            </div> <!--message_section-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h1>Comments</h1>
            <p>If you have something to share please do not hesitate to leave a comment.It will be very helpful</p>
            <!-- Comments section  -->
                <div class="be-comment-block">
                    <form class="form-block" id="comment-form">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group fl_icon">
                                    <div class="icon"><i class="fa fa-user"></i></div>
                                    <input class="form-input" type="text" name="commenter-name" placeholder="Your name" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 fl_icon">
                                <div class="form-group fl_icon">
                                    <div class="icon"><i class="fa fa-envelope-o"></i></div>
                                    <input class="form-input" type="text" name="commenter-email" placeholder="Your email" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-12">
                                <div class="form-group">
                                    <textarea class="form-input" required="" name="commenter-message" placeholder="Your text"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary flex-grow-1 mx-3">Submit</button>
                        </div>
                    </form>
                    <h1 class="comments-title">Comments (3)</h1>
                    <div class="be-comment">
                        <div class="be-img-comment">
                            <a href="blog-detail-2.html">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="be-ava-comment">
                            </a>
                        </div>
                        <div class="be-comment-content">

				<span class="be-comment-name">
					<a href="blog-detail-2.html">Ravi Sah</a>
					</span>
                            <span class="be-comment-time">
					<i class="fa fa-clock-o"></i>
					May 27, 2015 at 3:14am
				</span>

                            <p class="be-comment-text">
                                Pellentesque gravida tristique ultrices.
                                Sed blandit varius mauris, vel volutpat urna hendrerit id.
                                Curabitur rutrum dolor gravida turpis tristique efficitur.
                            </p>
                        </div>
                    </div>
                    <div class="be-comment">
                        <div class="be-img-comment">
                            <a href="blog-detail-2.html">
                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" class="be-ava-comment">
                            </a>
                        </div>
                        <div class="be-comment-content">
			<span class="be-comment-name">
				<a href="blog-detail-2.html">Phoenix, the Creative Studio</a>
			</span>
                            <span class="be-comment-time">
				<i class="fa fa-clock-o"></i>
				May 27, 2015 at 3:14am
			</span>
                            <p class="be-comment-text">
                                Nunc ornare sed dolor sed mattis. In scelerisque dui a arcu mattis, at maximus eros commodo. Cras magna nunc, cursus lobortis luctus at, sollicitudin vel neque. Duis eleifend lorem non ant. Proin ut ornare lectus, vel eleifend est. Fusce hendrerit dui in turpis tristique blandit.
                            </p>
                        </div>
                    </div>
                    <div class="be-comment">
                        <div class="be-img-comment">
                            <a href="blog-detail-2.html">
                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" class="be-ava-comment">
                            </a>
                        </div>
                        <div class="be-comment-content">
			<span class="be-comment-name">
				<a href="blog-detail-2.html">Cüneyt ŞEN</a>
			</span>
                            <span class="be-comment-time">
				<i class="fa fa-clock-o"></i>
				May 27, 2015 at 3:14am
			</span>
                            <p class="be-comment-text">
                                Cras magna nunc, cursus lobortis luctus at, sollicitudin vel neque. Duis eleifend lorem non ant
                            </p>
                        </div>
                    </div>
                </div>
            <!-- save the data in db and show a thanks message  -->
            <!-- username and email and comment and save button  -->

        </div>

    </div>
</div>

<?php
include 'footer.php';
?>