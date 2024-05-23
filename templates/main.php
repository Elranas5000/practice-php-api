<main>
    <section>
        <img src="<?=$poster_url?>" width="300" alt="movie image" style="border-radius: 16px">
    </section>

    <hgroup>
        <h3><?=$title?> - <?=$until_message?></h3>
        <p>Release date: <?=$release_date?></p>
        <link>Next movie is: <?=$following_production["title"]?></link>
    </hgroup>
</main>