function success(response){
    $("#test").append(JSON.stringify(response));
}

$(document).ready(function(){
    var article_id = $("#article_id").text();
    var article_views = $("#article_views").text();
    //var ids = '<?= $currentTopicsArticlesIds; ?>';
    //var dataPost = {"jsonrpc": "2.0", "method": "getTopArticles", "params": [article_id, ids], "id": 1};
    $.ajax({
        type: "POST",
        url: '/src/components/client.php',
        data: {article_id},
        success:function callAjax(data){
            $.ajax({
                crossDomain: true,
                type: "POST",
                dataType: "json",
                url: 'http://topgenerator.ll:8888/index.php',
                data: data,
                processData: false,
                contentType: "application/json; charset=UTF-8",
                success: success
            });
        }
        
    });
//    $.ajax({
//        crossDomain: true,
//        type: "POST",
//        dataType: "json",
//        url: 'http://topgenerator.ll:8888/index.php',
//        data: JSON.stringify(dataPost),
//        processData: false,
//        contentType: "application/json; charset=UTF-8",
//        success: success
//    });
});

