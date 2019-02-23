<?php namespace ProcessWire ?>

<?php echo wireRenderFile("views/includes/header", $params) ?>

<header>
    <div class="columns has-text-centered">
        <div class="column">
            <br>
            <h1 class="title is-1">🏤 Jasonbase</h1>
        </div>
    </div>

    <div class="block"></div>
</header>

<main class="content">
    <form action="<?php echo $upload->url ?>" method="post">

        <input type="hidden" id="_post_token" name="<?php echo $csrf->name ?>" value="<?php echo $csrf->value ?>">
        <input type="hidden" name="token" value="<?php echo $parent->token ?>">
        <input type="hidden" name="edit" value="1">

        <div class="columns is-vcentered">
            <div class="column is-offset-1 is-6">
                <h3 class="title is-3">Edit your Json</h3>
                <p>Copy and Paste your Json code here, and press <strong>Save</strong>.</p>
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

            <div class="column content">
                <h3 class="title is-3">Links</h3>
                <p style="color:red">Take care of this links or you will loose them forever.</p>
                    <ul style="list-style: none;">
                        <li>
                            <strong>Public Url</strong>
                        </li>

                        <li>
                            <input class="input" style="width:60%" type="text" value="<?php echo $parent->httpUrl ?>" readonly>
                        </li>
                        
                        <li>&nbsp;</li>

                        <li>
                            <strong>Private Url (Do Not Share)</strong>
                        </li>
                        
                        <li>
                            <input class="input" style="width:60%" type="text" value="<?php echo $page->httpUrl . $parent->token ?>" readonly>
                        </li>

                    </ul>
                <p>&nbsp;</p>
                <p>
                    <a href="<?php echo $paths->root ?>" class="button is-medium is-primary is-outlined">
                        Upload another
                    </a>
                    <a href="<?php echo $parent->url ?>" target="_blank" class="button is-medium is-info is-outlined">
                        View JSON
                    </a>

                    <a href="<?php echo $parent->url ?>pretty" target="_blank" class="button is-medium is-default is-outlined">
                        View Pretty
                    </a>
                </p>
            </div>
        </div>
        <div class="columns">
            <div class="column is-1"></div>
            <div class="column">
                <textarea 
                    style="background-color:#fffff3;" 
                    id="json" 
                    name="content" 
                    class="textarea" 
                    rows="10"><?php echo $parent->body ?></textarea>
            </div>
            <div class="column is-1"></div>
        </div>

        <div class="columns">
            <div class="column is-6"></div>
            <div class="column is-offset-4">
                <button class="button is-large is-primary" type="submit">Save</button>
            </div>
        </div>
    </form>
</main>

<?php echo wireRenderFile("views/includes/footer", $params); ?>