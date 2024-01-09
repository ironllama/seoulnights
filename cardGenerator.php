<style>
    * {
        margin: 0;
        padding: 0;
    }

    .card-body {
        width: 10vw;
        height: 25vh;
        border: 3px solid black;
        border-radius: 5px;
        box-shadow: 5px 5px 5px rgba(0, 0, 0, .5);
        margin: 5px;

        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .card-image {
        margin: 5px;
        background: red; /* img here */
        height: 50%;
        width: 90%;
        border-radius: 5px;
    }

    .card-text {
        height: 50%;
        width: 100%;
        margin: 5px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        gap: 1em;
    }

    .card-title {
        font-weight: bolder;
        text-decoration: underline;
    }
</style>

<div class="card-body"> <!-- when generating, we need to pull in card info and maybe assign db id to the card id, so that when clicked, the db can know what ints to use to adjust current values -->
    <div class="card-image"></div>
    <div class="card-text">
        <span class="card-title">Slap</span>
        <span class="card-action-text">deal 5 damage</span>
    </div>
</div>