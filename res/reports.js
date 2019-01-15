



$(document).ready(function(){
    attachClickHandlers();

    var h = window.location.hash.substring(1);
    var hashes = h ? h.split(',') : [];

    $.each(hashes, function(i, hash){
        setTimeout(function () {
            expand($('.expandable.key-' + hash).eq(0));
        }, i * 50);
    });
});

function attachClickHandlers () {
    $('.expandable').each(function(){

        var expandable = $(this);
        var header = expandable.find('.header');
        var content = expandable.find('.content');
        var key = expandable.data('key');
        header.off().on('click', function(){
            if (expandable.hasClass('expanded')) {
                content.slideUp('fast');
                expandable.removeClass('expanded');

                var h = window.location.hash.substring(1);
                var hashes = h ? h.split(',') : [];

                var hash = expandable.data('keyabbr') || '';
                if (hashes.indexOf(hash) != -1) {
                    hashes.splice(hashes.indexOf(hash), 1);
                }

                var children = expandable.find('.expandable.expanded');
                children.each(function(){
                  hash = $(this).attr('data-keyabbr');
                  if (hashes.indexOf(hash) != -1) {
                     hashes.splice(hashes.indexOf(hash), 1);
                  }
                });

                window.location.hash = hashes.join(',');

            } else {
                expand(expandable);

            }
        });

    });
}

function expand (expandable) {
    var header = expandable.find('.header');
    var content = expandable.find('.content');
    var key = expandable.data('key');
    $.ajax({
        url: 'data/' + key + '.html',
        dataType: 'html',
        success: function(data){
            content.html(data);
            attachClickHandlers();

            expandable.addClass('expanded');
            content.slideDown('fast');

            var hash = expandable.data('keyabbr') || '';
            var h = window.location.hash.substring(1);
            var hashes = h ? h.split(',') : [];
            if (hashes.indexOf(hash) == -1 && hash.length) {
                hashes.push(hash);
            }
            window.location.hash = hashes.join(',');

            // if content has exactly one child, expand further
            var children = content.find('.expandable');
            if (children.length === 1) {
              expand(children.eq(0));
            }
        }

    });
}
