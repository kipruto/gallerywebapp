
<?php
require_once './components/header.php';

?>
<div class='p-4'>

<div class="dropdown show text-right">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Select by Category
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
<h4 class='p-0 m-0 galleryh4'> All Uploaded Images are shown here </h4>

</div>
<div class="my-home-page">
	<section class="container-fluid gallery-posts">
  <?php
            $result = $database->fetchuploads();
            while ($row = mysqli_fetch_assoc($result)) {
                myuploads($row['filename'], $row['artwork_id serial']);
            }
            ?>

 
	</section>
</div>

<?php

require_once './components/footer.php';

?>

