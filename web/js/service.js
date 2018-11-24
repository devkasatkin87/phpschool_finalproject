function success(response){
    var top = JSON.stringify(response);
    $.ajax({
        type: "POST",
        url: '/src/components/topArticles.php',
        data: response,
        success: function (data){
            $("#top10").append(data);
        }
    });
    //$("#test").append(response);
    alert(JSON.stringify(response));
}

$(document).ready(function(){
    var article_id = $("#article_id").text();
    var method = "getTopArticles";
    var top = 10;
    $.ajax({
        type: "POST",
        url: '/src/components/client.php',
        data: {article_id,method,top},
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
});

