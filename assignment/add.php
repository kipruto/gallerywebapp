
<?php
require_once './components/header.php';

?>

	<section class="container state-h">
    <div class="p-t-30 p-b-30">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">CREATE YOUR POST</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="./php/uploadscript.php" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="name">Title</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="title" placeholder='Enter a short title'>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Category</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="category" placeholder="Category">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Description</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="description" placeholder="Write a short description about the image"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Upload Image</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input class="label--file" type='file' name="file_img">
                                </div>
                                <div class="label--desc">Upload your Image/Picture for your post. Max file size 10 MB</div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button class="btn--radius-2 btn--blue-2" name='submitted' type="submit">SUBMIT</button>
                </div>
                </form>
            </div>
        </div>
    </div>
	</section>


<?php

require_once './components/footer.php';

?>