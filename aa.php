<script>$(function () {
  $('.like').click(function () { likeFunction(this); });
  $('.dislike').click(function () { dislikeFunction(this);});
});


function likeFunction(caller) {
  var postId = caller.parentElement.getAttribute('postid');
  $.ajax({
      type: "POST",
      url: "rate.php",
      data: 'Action=LIKE&PostID=' + postId,
      success: function () {}
  });
}
function dislikeFunction(caller) {
  var postId = caller.parentElement.getAttribute('postid');
  $.ajax({
      type: "POST",
      url: "rate.php",
      data: 'Action=DISLIKE&PostID=' + postId,
      success: function () {}
  });
}</script>
<div class="post" postid="10">
    <input type="button" class='like' value="LikeButton" /> </input>
    <input type="button" class='dislike' value="DislikeButton"> </input>
</div>