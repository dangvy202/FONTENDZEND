
<?php
    echo $this->arrParam['book_id'];
?>
<form class="ps-form--review" id="comment_frm_abc" action="index.php?module=client&controller=comment&action=comment" method="POST">
    <h4>Submit Your Review</h4>
    <p>Your email address will not be published. Required fields are marked<sup>*</sup></p>
    <div class="form-group form-group__rating">
        <label>Your rating of this product</label>
        <select class="ps-rating" data-read-only="false" id="form[rate]" name="form[start]">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    <div class="form-group">
        <input type="hidden" value="<?php echo $this->arrParam['book_id'] ?>" id="form[id_product]" name="form[id_product]">
        <input type="hidden" value="<?php echo time(); ?>" id="form[token]" name="form[token]">
        <textarea class="form-control" id="form[message]" name="form[comment]" rows="6" placeholder="Write your review here"></textarea>
    </div>
    <div class="form-group submit">
        <button class="ps-btn" type="submit" id="btn-review-product">Submit Review</button>
    </div>
</form>