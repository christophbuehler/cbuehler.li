window.onload = function() {
    document.querySelector('#logo').dispatchEvent(new Event('show'));
    setTimeout(function() {
        document.querySelector('.intro').classList.add('show');
    }, 400);
    var posts = document.getElementsByClassName('post');
    var activeEl;
    for (var i=0; i<posts.length; i++) {
        (function(index) {
            var post = posts[index];
            setTimeout(function() {
                post.classList.add('show');
            }, index * 100 + 800);
            post.addEventListener('touchstart', function(ev) {
                if (activeEl) return;
                document.body.classList.add('detail');
                this.classList.add('active');
                activeEl = this;
                ev.stopPropagation();
                ev.preventDefault();
            });
        })(i);
    }
    setTimeout(function() {
        document.querySelector('footer').classList.add('show');
    }, 1200);
    document.body.addEventListener('touchstart', function() {
        if (!activeEl) return;
        this.classList.remove('detail');
        activeEl.classList.remove('active');
        activeEl = undefined;
    });
};