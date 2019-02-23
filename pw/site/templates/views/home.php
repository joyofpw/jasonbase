<?php namespace ProcessWire ?>

<?php echo wireRenderFile("views/includes/header", $params) ?>

<header>
    <section id="heading" class="hero is-fullheight is-default is-bold">
            <div class="hero-head">
                <!-- Place hero head here -->
            </div>
            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="columns is-vcentered">
                        <div class="column is-5">
                                <span style="font-size:10em"
                                >🏤 </span>
                        </div>
                        <div class="column is-6 is-offset-1">
                            <h2 class="title is-2">
                                🏤 Jasonbase
                            </h2>
                            <h4 class="subtitle is-4">
                                Your Json Hosting Headquarter
                            </h4>
                            <br>
                            <p class="has-text-centered">
                                <a href="https://jasonelle.com" class="button is-medium is-primary is-outlined">
                                    Jasonelle
                                </a>
                                <a href="https://github.com/jasonelle/jasonbase" class="button is-medium is-info is-outlined">
                                    Github
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero-foot">
                <!-- Place hero footer here -->
            </div>
    </section>
</header>

<main class="content">
    <form action="<?php echo $upload->url ?>" method="post">

        <input type="hidden" id="_post_token" name="<?php echo $csrf->name ?>" value="<?php echo $csrf->value ?>">

        <div class="columns is-vcentered">
            <div class="column is-offset-1 is-6">
                <h3 class="title is-3">Upload your Json</h3>
                <p>Copy and Paste your Json code here, and press <strong>Upload</strong>.</p>
                <p>This is a service for testing purposes and easy sharing of json files.</p>
                <p>For a production environment please use a proper server like <a href="https://neocities.org/">Neocities.org</a>.</p>
                <p>
                    Output is always <strong>json</strong>. 
                </p>
                <p>
                    Input can be <strong>hjson</strong> or <strong>json</strong>.
                </p>
                <br>
            </div>
        </div>
        <div class="columns">
            <div class="column is-1"></div>
            <div class="column">
                <textarea style="background-color:#fffff3;" id="json" name="content" class="textarea" rows="10" required></textarea>
            </div>
            <div class="column is-1"></div>
        </div>

        <div class="columns">
            <div class="column is-6"></div>
            <div class="column is-offset-4">
                <button class="button is-large is-primary" type="submit">Upload</button>
            </div>
        </div>
    </form>
</main>

<?php echo wireRenderFile("views/includes/footer", $params); ?>