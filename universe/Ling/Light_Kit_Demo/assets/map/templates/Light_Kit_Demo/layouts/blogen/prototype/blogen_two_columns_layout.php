<?php


/**
 * @var $this LightKitPageRenderer
 */

use Ling\Light_Kit\PageRenderer\LightKitPageRenderer;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/plugins/Light_Kit_Demo/blogen/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
          crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Bootstrap Theme</title>
</head>

<body>



<?php $this->printZone("top_zone"); ?>



<!-- POSTS -->
<section id="posts">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php $this->printZone("main_column"); ?>


            </div>
            <div class="col-md-3">
                <?php $this->printZone("sidebar"); ?>
            </div>
        </div>
    </div>
</section>

<?php $this->printZone("bottom_zone"); ?>




<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>


<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>


<script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());
    CKEDITOR.replace('editor1');
</script>
</body>

</html>
