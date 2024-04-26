<div class="movies-cards m-5">
    <div class="movies">
        <?php
        $movies = $data['movies'];
        foreach ($movies as $index => $movie) {
            $genres = explode(',', $movie->genres);
            $genres = implode(", ", $genres);
            ?>
            <div class="card text-bg-dark" style="max-width: 540px; width: 400px">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?php echo $movie->poster ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $movie->title ?></h5>
                            <p class="card-text"><?php echo substr($movie->releaseDate, 0, 4) ?></p>
                            <p class="card-text"><?php echo $genres ?></p>
                            <button type="button" class="btn btn-light">
                                <a class="text-dark" href='<?php echo $movie->trailerLink ?>' target='_blank'>WATCH
                                    TRAILER</a>
                            </button>
                            <button type="button" class="btn btn-light">
                                <a class="text-dark" href="movie/findOne/<?php echo $movie->imdb_id ?>">INFO</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
