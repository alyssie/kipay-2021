<?php /* Template Name: Blank Page */ ?>
<?php 
get_header();
?>
<div id="blank-page">
    <section class="container">
        <div class="row">
            <div class="col-12">
                <div class="content p-5">
                    <h1 class="t-xl lh-2 bold"><?php echo the_title(); ?></h1>
                    <p><?php echo the_content(); ?></p>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
get_footer(); 
?>