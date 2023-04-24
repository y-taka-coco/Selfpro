$(function(){
        
        var page = 2;
        $(".more").on("click",function(){
                mugenajax();
        });

        //ajaxでデータを取得
        function mugenajax(){
                
                $.ajax({
                        type: "POST",
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                        url: "/admin_top?page="+page,
                        //dataType:"json"
                    })
                    // Ajaxリクエストが成功した場合
                    .done(function(data) {
                        page += 1;
                        
                        var obj =Object.keys(data['maps']['data']);
                        //console.log(Object.keys(obj).length);
                        var objco = Object.keys(obj).length;
                        for(var i=0; i<objco; i++){
                                $("#post-list").append(
                                        `<tr>
                                                <th scope="col"><a href="http://127.0.0.1:8000/maps/${data['maps']['data'][i]['id']}/edit">${data['maps']['data'][i]['id']} </a></th>
                                                <th>${data['maps']['data'][i]['shopname']}</th>
                                                <th>${data['maps']['data'][i]['address']}</th>
                                        </tr>`
                                );
                                //console.log(data['maps']['data'][i]);
                        }
                        //console.log(data.maps);
                        var all = JSON.parse(data['maps']['total']);
                        //console.log(all);
                        var now = JSON.parse(data['maps']['to']);
                        //console.log(now);
                        if (all == now){
                                $(".more").hide();
                        }

                    })
                    // Ajaxリクエストが失敗した場合
                    .fail(function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log(errorThrown);
                        })
                        loading_flg = false;
                }
});

//var loading_flg = false;
        
        // スクロールされた時に実行
        // $(window).on("scroll", function () {
        
        // if (!loading_flg){
        //         // スクロール位置
        //     var document_h = $(document).height();       
        //     var window_h = $(window).height() + $(window).scrollTop();    
        //     var scroll_pos = (document_h - window_h) / document_h ;   

        //     console.log(document_h);
        //     console.log(window_h);
        //     console.log(scroll_pos);
                
        //     // 画面最下部にスクロールされている場合
        //     if (scroll_pos < 1) {
        //         loading_flg = true;
        //         // ajaxコンテンツ追加処理
        //         mugenajax()
        //     }
        // }   
        // });




        // var documentHeight= $(document).height();
        // var scroll = $(window).scrollTop();
        // var height = $(window).height();
        // // console.log(documentHeight);
        // // console.log(scroll);
        // // console.log(height);
        // var page = 2;
        // // console.log(document.body.clientHeight);

        // // スクロールが発生した時のイベント
        // $(window).on("scroll",function() {
        // // pageBottom = [bodyの高さ] - [windowの高さ]
        // var pageBottom = document.body.clientHeight - window.innerHeight;
        // // スクロール量を取得
        // var currentPos = window.pageYOffset;
        
        // // console.log(pageBottom);
        // // console.log(currentPos);
        
        // スクロール量が最下部の位置を過ぎたか判定
        // if (pageBottom+300 <= currentPos) {
        //     // スクロールが画面末端に到達している時
            
        
        // }

    
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
    
