<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myshop</title>
    <?php include_once(__DIR__. '/layouts/styles.php') ?>
</head>
<body>
    <?php include_once(__DIR__ . '/layouts/partials/header.php'); ?>
    
    <main>
             <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            
            <div class="carousel-inner">
           
                <div class="carousel-item active">
                    <img src="../assets/uploads/slider/slier2.jpg" class="d-block w-100" alt="Slide 1" style="height: 500px; object-fit: cover;">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Example headline.</h1>
                            <p class="opacity-75">Some representative placeholder content for the first slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                
    
                <div class="carousel-item">
                    <img src="../assets/uploads/slider/slier2.jpg" class="d-block w-100" alt="Slide 2" style="height: 500px; object-fit: cover;">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Another example headline.</h1>
                            <p>Some representative placeholder content for the second slide of the carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                        </div>
                    </div>
                </div>
                
  
                <div class="carousel-item">
                    <img src="../assets/uploads/slider/slier2..jpg" class="d-block w-100" alt="Slide 3" style="height: 500px; object-fit: cover;">
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>One more for good measure.</h1>
                            <p>Some representative placeholder content for the third slide of this carousel.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Carousel Controls -->
<button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Marketing messaging and featurettes -->
        <!-- Wrap the rest of the page in another container to center all the content. -->
        <div class="container marketing">
            <div class="row">
                <div class="col-lg-4">
                    <div class = "icon" >
                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                    </div>
                        <title>Purchase</title>
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                    </svg>
                    <h2 class="fw-normal">Purchase</h2>
                    <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                    <p><a class="btn btn-secondary" href="#">View details »</a></p>
                </div><!-- /.col-lg-4 -->
                
                <div class="col-lg-4">
                    <div class = "icon" >
                        <i class="fa fa-archive" aria-hidden="true"></i>
                    </div>
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                    </svg>
                    <h2 class="fw-normal">Heading</h2>
                    <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
                    <p><a class="btn btn-secondary" href="#">View details »</a></p>
                </div><!-- /.col-lg-4 -->
                
                <div class="col-lg-4">
                    <div class = "icon" >
                        <i class="fa fa-line-chart" aria-hidden="true"></i>
                    </div>
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect>
                    </svg>
                    <h2 class="fw-normal">Heading</h2>
                    <p>And lastly this, the third column of representative placeholder content.</p>
                    <p><a class="btn btn-secondary" href="#">View details »</a></p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->

            <!-- START THE FEATURETTES -->
            <hr class="featurette-divider">
            
            <div class="row featurette">
<div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">First featurette heading. <span class="text-body-secondary">It'll blow your mind.</span></h2>
                    <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
                </div>
                <div class="col-md-5">
                    <svg aria-label="Placeholder: 500x500" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" height="500" preserveAspectRatio="xMidYMid slice" role="img" width="500" xmlns="http://www.w3.org/2000/svg">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="var(--bs-secondary-bg)"></rect>
                        <text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text>
                    </svg>
                </div>
            </div>
            
            <hr class="featurette-divider">
            
            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading fw-normal lh-1">Oh yeah, it's that good. <span class="text-body-secondary">See for yourself.</span></h2>
                    <p class="lead">Another featurette? Of course.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <svg aria-label="Placeholder: 500x500" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" height="500" preserveAspectRatio="xMidYMid slice" role="img" width="500" xmlns="http://www.w3.org/2000/svg">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="var(--bs-secondary-bg)"></rect>
                        <text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text>
                    </svg>
                </div>
            </div>
            
            <hr class="featurette-divider">
            
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">And lastly, this one. <span class="text-body-secondary">Checkmate.</span></h2>
                    <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
                </div>
                <div class="col-md-5">
                    <svg aria-label="Placeholder: 500x500" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" height="500" preserveAspectRatio="xMidYMid slice" role="img" width="500" xmlns="http://www.w3.org/2000/svg">
                        <title>Placeholder</title>
<rect width="100%" height="100%" fill="var(--bs-secondary-bg)"></rect>
                        <text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text>
                    </svg>
                </div>
            </div>
            
            <hr class="featurette-divider">
            <!-- /END THE FEATURETTES -->
        </div><!-- /.container -->

        <!-- FOOTER -->
        <footer class="container">
            <p class="float-end"><a href="#">Back to top</a></p>
            <p>© 2017–2025 Company, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
        </footer>
        <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
        <?php
        include_once(__DIR__ . '/../dbconnect.php');
        $conn = connectDb();
        $sql =" select id , name ,description, price, image_url from products";
        $result = $conn->query($sql);
        $data = [];
        if($result->num_rows>0){
            while($row=$result->fetch_array(MYSQLI_NUM)){
                $data[] = $row;
            }
            $result->free_result();
        }
        $conn->close();
        ?>
        <?php
        foreach($data as $item):
        ?>
        <div class="col">
  <div class="card shadow-sm">
    <a href="pages/details.php?id=<?= $item[0] ?>">
      <img src="../assets/shared/img/<?= $item[4] ?>" alt="<?= $item[1] ?>" class="img-fluid" style="height: 225px; object-fit: cover;">
    </a>
    <div class="card-body">
      <p class="card-text">
        <a href="pages/details.php?id=<?= $item[0] ?>" class="text-decoration-none text-dark"><?= $item[1] ?></a>
      </p>
      <p class="card-text text-danger"><?= number_format($item[3], 0, ',', '.') ?> ₫</p>
      <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
          <a href="pages/details.php?id=<?= $item[0] ?>" class="btn btn-sm btn-outline-secondary">View</a>
          <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
        </div>
        <a href="pages/details.php?id=<?= $item[0] ?>" class="btn btn-sm btn-outline-secondary">Add cart</a>
      </div>
    </div>
  </div>
</div>
        <?php
        endforeach;
        ?>
      </div>
    </div>
    </main>

    <?php include_once(__DIR__ . '/layouts/partials/footer.php'); ?>
    <?php include_once(__DIR__ . '/layouts/scripts.php'); ?>
</body>
</html>