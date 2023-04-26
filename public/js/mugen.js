$(function(){

        $(".pagination").hide();
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
                        var all = JSON.parse(data['maps']['total']);
                        var now = JSON.parse(data['maps']['to']);
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

