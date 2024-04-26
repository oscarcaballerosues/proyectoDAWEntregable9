<div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
    <div class="carousel-inner">
        <?php
        foreach ($data['movies'] as $index => $movie):
            $url = $movie->backdrops[0]->link;
            $active = ($index == 0) ? 'active' : '';
            ?>
            <div class="carousel-item  <?php echo $active ?>">
                <div class="backdrop"> 
                    <img src="<?php echo $url ?>" class="d-block w-100 img-fluid" alt="...">
                    <div class="gradient"></div>
                </div>
                <div class="poster">
                    <img src="<?php echo $movie->poster ?>" alt="...">
                </div>
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="text-light">
                        <?php echo $movie->title ?>
                    </h1>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>