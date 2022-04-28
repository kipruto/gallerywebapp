<?php



function myuploads($image, $id )
{
  $element ="<div class='figcap'>
  <a href='./artwork.php?id=$id'>
  <img src='$image' alt='img' />
</a>
<div class='atfooter'>
<div class='hor-dat'> 
<a  href='./artwork.php?id=$id' class='linker'>View Details <i class='fa fa-link'></i> </a>
 </div>
</div>
</div>";
  echo  $element;
}




function singleart($image, $title, $category, $id, $description, $author, $tags )
{
  $element ="<figure class='news_hor'>
  <img src='$image' alt='img' />
  <figcaption>
    <h3><strong>Title: </strong>$title </h3><br>
    <p> 
    <strong>Description:</strong>
    $description</p>
   <p><strong>Author: </strong>$author </p>
    <footer>
    <div class='hor_date'><strong> Category:</strong>   $category</div>
   <p class='text-right'><strong>Tags:</strong> $tags</p>

    </footer>
  </figcaption>
 
  
</figure>";
  echo  $element;
}





function latest4images($image, $id){
    $element ="<div class='figcap'>
    <a href='./artwork.php?id=$id'>
    <img src='$image' alt='img' />
  </a>
  <div class='atfooter'>
  <div class='hor-dat'> 
   </div>
  </div>
  </div>";
    echo  $element;
  }

  function member($member){
    $element = "<a class='dropdown-item class='nav-link' href='./member.php?author=$member'>$member</a>";

    echo $element;
  }