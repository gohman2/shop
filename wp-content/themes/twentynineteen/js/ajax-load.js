jQuery(function ($) {
    /*load post*/
    var ajaxIsActive = false;
    $('body').on('click', '.load_btn', function(){
        if (ajaxIsActive) return;
        var postTotal = $(this).attr('data-post-total');
        var postOffset = $(this).attr('data-post-offset');
        var postPerpage = $(this).attr('data-post-perpage');
        var postSort = $(this).attr('data-post-sort');
        var postNot = $(this).attr('data-post-not');

        $.ajax({
            type: "POST",
            dataType: "json",
            url: js_vars.ajax_url,
            beforeSend: function () {
                ajaxIsActive = true;
            },
            data: {
                action: 'loader_posts',
                postTotal: postTotal,
                postOffset: postOffset,
                postPerpage: postPerpage,
                postSort: postSort,
                postNot: postNot,
                nonce: js_vars.nonce

            },
            complete: function (response) {
                data = response.responseJSON;
                $("#all_product").append(data.content);
                postOffset = parseInt(postOffset) + +postPerpage;
                $(".load_btn").attr('data-post-offset', postOffset);
                if ( postOffset >= data.postTotal ) {
                    $('.load_btn').hide();
                }
                ajaxIsActive = false;
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.error('Ajax request failed', jqXHR, textStatus, errorThrown);
            }
        });
    });
})







