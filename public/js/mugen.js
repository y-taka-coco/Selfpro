$(function(){
        // スクロールが発生した時のイベント
        $(window).on("scroll",function() {
        // pageBottom = [bodyの高さ] - [windowの高さ]
        var pageBottom = document.body.clientHeight - window.innerHeight;
        // スクロール量を取得
        var currentPos = window.pageYOffset;
    
        // スクロール量が最下部の位置を過ぎたか判定
        if (pageBottom <= currentPos) {
            // スクロールが画面末端に到達している時
            $.ajax({
                type: "GET",
                url: "https://~~~~",
                dataType : "json",
            })
            // Ajaxリクエストが成功した場合
            .done(function(data) {
                // 取得した情報を表示する処理
                window.alert('アラーートだよ');
            })
            // Ajaxリクエストが失敗した場合
            .fail(function(XMLHttpRequest, textStatus, errorThrown) {
                alert(errorThrown);
        })
        
    }
});

    
        // $(window).on("scroll",function() {
        //     var height = $(document).height();
        //     var scroll_top = $(document).scrollTop();
        //     var window_height = $(window).height();
        // if(scroll_top + window_height >= height ) {
        //     var page = $('.pagination .active').next().find('span').html();
        //     $.ajax({
        //     url: '/admin_top?page=' + page,
        //     type: 'get',
        //     dataType: 'json',
        //     success: function(data) {
        //         if(data.html != '') {
        //         $('#post-list').append(data.html);
        //         $('.pagination .active').next().addClass('active');
        //         }
        //     }
        //     });
        // }
        // });

        //window.alert('アラーートだよ');
    
});