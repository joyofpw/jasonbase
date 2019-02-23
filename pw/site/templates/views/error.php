<?php namespace ProcessWire; ?>
<?php echo wireRenderFile("views/includes/header", $params); ?>

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
                                >⚠️</span>
                        </div>
                        <div class="column is-6 is-offset-1">
                            <h2 class="title is-2">
                            ⚠️ Error
                            </h2>
                            <h4 class="subtitle is-4">
                                Something failed.
                            </h4>
                            <br>
                            <p class="has-text-centered">
                                <a href="<?php echo $paths->root ?>" class="button is-medium is-info is-outlined">
                                    Go Back
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero-foot content has-text-centered" style="margin-bottom:10px">

                <?php if(isset($content)): ?>
                    <div class="columns">
                        <div class="column is-offset-1">
                            <h5 class="title is-5">Content</h5>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-1">
                        </div>
                        <div class="column">
                            <textarea class="textarea"><?php echo $content ?></textarea>
                        </div>
                        <div class="column is-1">
                        </div>
                    </div>
                <?php endif ?>

                    <div class="columns">
                        <div class="column is-offset-1">
                            <h5 class="title is-5">Error Message</h5>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-1">
                        </div>
                        <div class="column">
                            <textarea style="background-color:#FFE0E0;" class="textarea"><?php echo $message ?></textarea>
                        </div>
                        <div class="column is-1">
                        </div>
                    </div>
            </div>
    </section>
</header>

<?php echo wireRenderFile("views/includes/footer", $params); ?>