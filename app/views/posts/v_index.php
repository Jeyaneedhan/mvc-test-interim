<?php require APPROOT . '/views/inc/header.php'; ?>

<!-- TOP NAVIGATION -->
<?php require APPROOT . '/views/inc/components/topnavbar.php'; ?>


<?php flash('post_msg'); ?>

<h1>User → <?php echo htmlspecialchars($_SESSION['user_name']); ?></h1>

<h1>Posts</h1>

<a href="<?php echo URLROOT; ?>/Posts/create"> <button class="post-create-btn">CREATE POST</button></a>

<!-- Loops through each post -->
<?php foreach ($data['posts'] as $post): ?>
    <div class="post-index-container">
        <div class="post-header">
            <div class="post-user-name"><?php echo $post->user_name; ?></div>
            <div class="post-created-at"><?php echo convertedToReadableTimeFormat($post->post_created_at); ?></div>

            <?php if ($post->user_id == $_SESSION['user_id']): ?>
                <div class="post-control-btns">
                    <a href="<?php echo URLROOT; ?>/Posts/edit/<?php echo $post->post_id; ?>"> <button class="post-control-btn1">EDIT </button></a>
                    <a href="<?php echo URLROOT; ?>/Posts/delete/<?php echo $post->post_id; ?>"> <button class="post-control-btn2">DELETE </button> </a>
                </div>
            <?php endif; ?>
        </div>

        <div class="post-body">
            <div class="post-title"><?php echo $post->title; ?></div>
            <div class="post-content"><?php echo $post->body; ?></div>
        </div>

        <div class="post-footer">
            <div class="post-likes">Likes 0</div>
            <div class="post-dislikes">Dislikes 0</div>
        </div>
    </div>
<?php endforeach; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>
