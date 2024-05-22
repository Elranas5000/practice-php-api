<main>
    <section>
        <img src="<?=$data["poster_url"];?>" width="300" alt="movie image" style="border-radius: 16px">
    </section>

    <hgroup>
        <h3><?=$data["title"];?> - <?=$untilMessage?></h3>
        <p>Release date: <?=$data["release_date"]?></p>
        <link>Next movie is: <?=$data["following_production"]["title"]?></link>
    </hgroup>
</main>