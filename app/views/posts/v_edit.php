<?php require APPROOT . '/views/inc/header.php'; ?>
<!-- TOP NAVIGATION -->
<?php require APPROOT . '/views/inc/components/topnavbar.php'; ?>

<h1>Posts edit</h1>

<div class="post-container">
    <center>
        <h2>Edit the post</h2>
    </center>

    <form action="<?php echo URLROOT; ?>/Posts/edit/<?php echo $data['post_id']; ?>" method="post">
        <input type="hidden" name="post_id" value="<?php echo $data['post_id']; ?>">
        <input type="text" name="title" id="title" placeholder="Title" value="<?php echo $data['title']; ?>">
        <span class="form-invalid"><?php echo $data['title_err']; ?></span>
        <br>

        <textarea name="body" id="body" placeholder="Content" rows="10" cols="10"><?php echo $data['body']; ?></textarea>
        <span class="form-invalid"><?php echo $data['body_err']; ?></span>
        <br>

        <input type="submit" value="Update" class="post-btn">
    </form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
