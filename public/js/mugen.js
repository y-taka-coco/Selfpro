$(function(){

        $(".pagination").hide();
        var page = 2;
        var kizyun = 500;
        $(window).on("scroll",function () {
                if($(window).scrollTop() >= kizyun){
                        mugenajax();
                        kizyun = kizyun + 500;
                }
        });

        //月選択で値を渡す
        var month = $('#sentaku').val();
        console.log(month);
        $('#pull').on("change",function(){
                $('#select').trigger('submit');
                var month =$(this).val();
        });
        //日付の非表示
        if(month == '02'){
                $('#nzyukyu').hide();
                $('#sanzyu').hide();
                $('#sanzyuuiti').hide();
        }else if (month == '04'||month =='06'||month == '09'||month == '11'){
                $('#sanzyuuiti').hide();
        }

        //ajaxでデータを取得
        function mugenajax(){
                
                $.ajax({
                        type: "POST",
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                        url: "/admin_top?page="+page,
                    })
                    // Ajaxリクエストが成功した場合
                    .done(function(data) {
                        page += 1;
                        
                        var obj =Object.keys(data['maps']['data']);
                        var objco = Object.keys(obj).length;
                        for(var i=0; i<objco; i++){
                                $("#post-list").append(
                                        `<tr>
                                                <th scope="col">${data['maps']['data'][i]['id']}</th>
                                                <th>${data['maps']['data'][i]['shopname']}</th>
                                                <th>${data['maps']['data'][i]['address']}</th>
                                                <th scope="col"><a href="http://127.0.0.1:8000/maps/${data['maps']['data'][i]['id']}/edit" class="badge badge-pill badge-success"><h3>編集</h3></a></th>
                                        </tr>`
                                );
                        }

                    })
                    // Ajaxリクエストが失敗した場合
                    .fail(function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log(errorThrown);
                        })
                        loading_flg = false;
                }
});


        //備忘録
        //ボタンクリックで表示
        // $(".more").on("click",function(){
        //         mugenajax();
        // });
        // $(".more").hide();
        //var suryo =$(window).scrollTop();
        // console.log(suryo);
        // var all = JSON.parse(data['maps']['total']);
        // var now = JSON.parse(data['maps']['to']);
        // if (all == now){
        //         $(".more").hide();
        // }

