<div class="tweet-nav mb-3">
    <!-- TODO: usersのIDと tweetsのIDを送信 -->
    <form action="" method="POST" id="like-form-<?= $tweet['id'] ?>" class="like-form">
        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
        <input type="hidden" name="tweet_id" value="<?= $tweet['id'] ?>">

        <?php if (in_array($tweet['id'], $user_likes)) : ?>
            <button class="btn btn-sm"><img src="../images/svg/heart_active.svg"></button>
            <span class="like-count" id="like-count-<?= $tweet['id'] ?>"><?= @$like_counts[$tweet['id']] ?></span>
        <?php else : ?>
            <button class="btn btn-sm"><img src="../images/svg/heart.svg"></button>
            <span class="like-count" id="like-count-<?= $tweet['id'] ?>"><?= @$like_counts[$tweet['id']] ?></span>
        <?php endif ?>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.like-form').forEach(function (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                // フォームのデータを取得
                var formData = new FormData(form);

                // 非同期でいいねを更新
                fetch('path/to/your/like/endpoint', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // 成功時にいいね数を更新
                    document.getElementById('like-count-' + data.tweet_id).textContent = data.like_count;
                })
                .catch(error => console.error('Error:', error));
            });
        });
    });
</script>
